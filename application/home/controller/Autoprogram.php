<?php
/**
 * Created by PhpStorm.
 * User: 15499
 * Date: 2018/3/28
 * Time: 11:32
 */

namespace app\home\controller;
use app\api\controller\Sendsms;
use app\home\model\AutoProgramModel;
use think\Controller;
use think\Db;

class Autoprogram extends Controller
{

    //判断密码是否正确
    public function _initialize()
    {
        $type = input('type');
        if ( isset($type) && ($type == 'asdkhadshuadjalasjdj'))
        {
            return $this;
        }else
        {
            return $this->error('地址有误');
        }
    }

    //挖矿程序
    public function mills_create_coin()
    {
        //查询所有用户的id
        $model = new AutoProgramModel();
        $members = $model->getAllMemberId();
        for ($i=0;$i<count($members);$i++)
        {
            //查询改用户下的所有矿机
            $mills=$model->getMemberMills($members[$i]['id']);
            $add_coin=0;
            for ($j=0;$j<count($mills);$j++)
            {
                //失效矿机、没有矿机
                if ( count($mills)==0 ||($mills[$j]['status'] == 0) )
                {
                    continue;
                }
                //增加单台矿机挖矿记录
                $data['member_id']   = $members[$i]['id'];//用户id
                $data['mills_id']    = $mills[$j]['mills_id'];//矿机id
                $data['coin_day']    = $mills[$j]['create_coin'];//矿机日挖矿能力
                $data['create_time'] = time();
                $result = Db::name('create_coin_day')
                    ->insert($data);
                //插入每日挖矿记录失败
                if (!$result)
                {
                    //写入错误日志
                    Db::name('error_log')->insert(['error_message'=>'插入挖矿记录失败！','error_address'=>'home/app/controller/autoprogtam/mills_create_coin','error_content'=>$result,'create_time'=>time()]);
                    continue;
                }
                //增加用户币值
                $add_coin +=$data['coin_day'];
            }
            //增加用户相应币值
            $coin = Db::name('member')->where('id',$members[$i]['id'])->field('money')->find()['money'];
            $res  = Db::name('member')->where('id',$members[$i]['id'])->update(['money'=>($coin+$add_coin)]);
            if ($res === false)
            {
                //写入错误日志
                Db::name('error_log')->insert(['error_address'=>'app/home/controller/autoprogram/mills_create_coin','error_message'=>'用户挖矿所得币增加失败！','create_time'=>time()]);
                continue;
            }else
            {
                return ;
            }
        }
    }

    //设置矿机失效
    public function set_mills_status()
    {
        //查询所有客户购买矿机记录
        $info = Db::name('person_mills')->select();
        //遍历购买的矿机
        for ($i=0;$i<count($info);$i++)
        {
            if (time()>$info[$i]['end_time'] && ($info[$i]['status'] == 1))
            {
                $res = Db::name('person_mills')->where('id',$info[$i]['id'])->update(['status'=>0]);
                if ($res === false)
                {
                    //写入错误日志
                    Db::name('error_log')->insert(['error_address'=>'app/home/controller/autoprogram/set_mills_status','error_message'=>'矿机状态修改失败！']);
                }else
                {
                    return ;
                }
            }
        }
    }

    //币值自动增加
    public function set_coin_day_price()
    {
        //查询表中第一条记录
        $data = Db::name('day_price')->limit(1)->find();

        $dataCount =Db::name('day_price')->count('id');
        if ($dataCount ==1)
        {
            //发送提示短信
            $sms = new Sendsms();
            $sms->note();
        }

        //若没有数据，保持当前的币值
        if (!$data)
        {
            //获取之前的币值
            $dataHis = Db::name('money')->where('id',1)->find();
            $dataHis['history_price'] = $data['price'];
            $dataHis['history_date']  = time();
            $dataHis['create_time']   = time();
            $dataHis['update_time']   = time();
            //数据进入与币值历史数据表
            $history_res = Db::name('money_history')->insert($dataHis);
            if ($history_res)
            {
                return;
            }else
            {
                //写入错误日志
                Db::name('error_log')->insert(['error_address'=>'app/home/controller/autoprogram/set_coin_day_price','error_message'=>'货币未设置增加值，系统默认使用当前价格']);
                return;
            }

        }

        //修改当前币值
        $result = Db::name('money')->where('id',1)->update(['price'=>$data['price'],'update_time'=>time()]);
        if ($result !==false)
        {
            $dataHis['history_price'] = $data['price'];
            $dataHis['history_date']  = time();
            $dataHis['create_time']   = time();
            $dataHis['update_time']   = time();
            //数据进入与币值历史数据表
            $history_res = Db::name('money_history')->insert($dataHis);
            if ($history_res)
            {
                //删除第一条数据
                $res = Db::name('day_price')->where('id',$data['id'])->delete();
                if ($res == 1)
                {
                    return;
                }else
                {
                    //写入错误日志
                    Db::name('error_log')->insert(['error_address'=>'app/home/controller/autoprogram/set_coin_day_price','error_message'=>'每日增加货币失败']);
                    return;
                }
            }

        }

    }

}