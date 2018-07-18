<?php
/**
 * Created by PhpStorm.
 * User: 15499
 * Date: 2018/3/23
 * Time: 15:18
 */

namespace app\index\controller;


use think\Controller;
use think\Db;
use think\Session;

class Mills extends Controller
{
    //矿机市场
    public function index()
    {
        //查询所有矿机
        $allMills = Db::name('mills')
            ->alias('m')
            ->join('think_mills_cate mc','m.cate_id=mc.id')
            ->field('m.*,mc.name cate_name')
            ->select();
        foreach ($allMills as &$v)
        {
            $v['photo'] = 'http://www.eintcoin.com'.DS.'uploads'.DS.'images'.DS.$v['photo'];
        }
        exit(json_encode($allMills));
    }

    //购买矿机
    public function buy()
    {
        $request = request();
        if ($request->isGet())
        {
            $mills_id = input('id');
            $this->assign('mills_id',$mills_id);
            return $this->fetch();
        }elseif ($request->isPost())
        {
            $mills_id = input('mills_id');
                //查询矿机价格
                $mills  = Db::name('mills')->where('id',$mills_id)->find();
                $person = Db::name('member')->where('id',Session::get('user.id'))->field('money')->find();
                if ($person['money']<$mills['price'])
                {
                    exit(json_encode(3));
                }else
                {
                    //购买数据入库
                    $data['user_id'] = Session::get('user.id');
                    $data['mills_id'] = $mills_id;
                    $data['create_time'] = time();
                    $data['end_time'] = time()+$mills['date']*3600*24;
                    $data['status'] = 1;//运行
                    $res = Db::name('person_mills')->insertGetId($data);
                    if ($res)
                    {
                        //减少账户余额
                        $result = Db::name('member')->where('id',Session::get('user.id'))->update(['money'=>$person['money']-$mills['price']]);
                        if ($result)
                        {
                            //代理模式增加币值
                            $parent_id = Db::name('member')->where('id',Session::get('user.id'))->find()['parent_id'];
                            if (!empty($parent_id))
                            {
                                $this->add_coin(Session::get('user.id'),$mills_id);
                            }
                            exit(json_encode(1));
                        }else
                        {
                            exit(json_encode(2));
                        }
                    }else
                    {
                        exit(json_encode(2));
                    }

                }
        }

    }

    //我的矿机
    public function my_mills()
    {
        //查询我的矿机
        $myMills = Db::name('member')
                ->alias('m')
                ->join('person_mills pm','m.id=pm.user_id','LEFT')
                ->join('mills ms','pm.mills_id=ms.id','LEFT')
            ->join('mills_cate mc','ms.cate_id=mc.id','LEFT')
            ->where('m.id',Session::get('user.id'))
            ->field('ms.title,pm.end_time,pm.status,pm.create_time,mc.name')
            ->select();
        for ($i=0;$i<count($myMills);$i++)
        {
            $myMills[$i]['days_remaining'] = floor(($myMills[$i]['end_time']-time())/(3600*24));
            if ($myMills[$i]['days_remaining'] == 0 && $myMills[$i]['status'] == 1)
            {
                $myMills[$i]['days_remaining'] = '少于一天';
            }elseif ($myMills[$i]['days_remaining'] < 0)
            {
                $myMills[$i]['days_remaining'] = '失效';
            }
        }
        exit(json_encode($myMills)) ;
    }

    //代理模式，增加相应的币数
    public function add_coin($id,$mills_id)
    {
        //查找代理模式
        $agent = Db::name('agent_coin')->where('id',1)->find();
        //未设置代理模式
        if (!$agent)
        {
            return true;
        }
        //根据对应的等级，增加币值
        $level = $agent['level'];
        $coin  = $agent['mills_coin'];
        $arr_coin = explode('_',$coin);
        if (count($arr_coin) != $level)
        {
            //写入错误日志
            Db::name('error_log')->insert(['error_address'=>'index/mills/add_coin','error_message'=>'代理模式等级与矿机购买赠币格式不匹配','create_time'=>time()]);
            return true;
        }
        //增加币值
        $member_id = $id;
        $mills_price = Db::name('mills')->where('id',$mills_id)->find()['price'];
        for ($i=0;$i<(count($arr_coin)-1);$i++)
        {
            //查询父级id
            $member_id = Db::name('member')->where('id',$member_id)->find()['parent_id'];
            //增加币值
            $member_coin = Db::name('member')->where('id',$member_id)->find()['money'];
            $add_coin = $member_coin+($coin[$i]/100)*$mills_price;
            $result = Db::name('member')->where('id',$member_id)->update(['money'=>$add_coin]);
            if ($result === false)
            {
                //写入错误日志
                Db::name('error_log')->insert(['error_address'=>'index/mills/add_coin','error_message'=>$i.'级增加币值失败','error_content'=>$result,'create_time'=>time()]);
                return true;
            }
        }
        return true;

    }

}
