<?php
/**
 * Created by PhpStorm.
 * User: 15499
 * Date: 2018/3/21
 * Time: 11:06
 */

namespace app\index\controller;


use app\api\controller\Sendsms;
use app\index\model\LoginModel;
use think\Controller;
use think\Db;
use think\Session;

class Login extends Controller
{
    //用户注册
    public function register()
    {
        $request = request();
        if ($request->isGet())
        {
            return $this->fetch();
        }else if($request->isPost())
        {
            $data = input();
            //数据验证
//            $validate = validate('CheckUser');
//            $result = $validate->batch(true)->scene('register')->check($data);
//            if (!$result)
//            {
//                return $this->redirect('register',[],302,[
//                    'data'    =>    $data,
//                    'message' =>    $validate->getError()
//                ]);
//            }
//            //判断短信验证码
//            if (Session::get('SMS')!=$data['code'])
//            {
//                return json_encode(['code'=>2,'message'=>'短信验证码错误']);
//            }
            if (isset($data['/Index/login/register']))
            {
                unset($data['/Index/login/register']);
            }
            //数据入库
            $data['closed']     = 0;//1删除,0正常
            $data['status']     = 1;//用户状态
            $data['group_id']   = 1;
            $data['password']   = md5(md5($data['password']).config('auth_key'));
            $data['create_time']= time();
            $data['update_time']= time();
            $result = Db::name('member')->insertGetId($data);
            if ($result)
            {
                if (!empty($data['parent_id']))
                {
                    //增加币值
                    $this->add_coin($result);
                }
                $res['code'] = 1;
                exit(json_encode($res));
            }else
            {
              $res['code'] = 2;
              exit(json_encode($res));
            }
        }
    }

    //短信验证码验证
    public function smsCode()
    {
        $request = request();
        if ($request->isPost())
        {
            $code      = input('code');
            //未发送验证码
            if (!Session::has('SMS'))
            {
                return 2;
            }
            if ($code == Session::get('SMS'))
            {
                return 1;
            }else
            {
                return 2;
            }

        }
    }

    //用户登录
    public function login()
    {
        $request = request();
        if ($request->isGet())
        {

            return $this->fetch();
        }else if ($request->isPost())
        {
            $data       = input();
//            $validate   = validate('CheckUser');
//            $result     = $validate->scene('login')->batch(true)->check($data);
//            if (!$result)
//            {
//                return $this->redirect('login',[],302,[
//                    'data'      =>  $data,
//                    'message'   =>  $validate->getError()
//                ]);
//            }
            //手机号码、密码验证
            $member = Db::name('member')->where('mobile',$data['mobile'])->find();
            if ($member)
            {
                if ($member['status'] == 0)
                {
                    exit(json_encode(4));
                }
                //查到用户手机号码、验证密码
                if (md5(md5($data['password']).config('auth_key')) !=$member['password'])
                {
                    exit(json_encode(2)) ;
                }
                //账号账号和密码正确
                Session::set('user',$member);
                exit(json_encode(1)) ;
            }else
            {
                //未查到用户手机号码，不存在
                exit(json_encode(3)) ;
            }
        }
    }

    //用户退出登录
    public function loginOut()
    {
        Session::delete('user');
        return $this->success('退出成功！','index/index/index');
    }

    //代理模式，增加相应的币数
    public function add_coin($id)
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
        $coin  = $agent['register_coin'];
        $arr_coin = explode('_',$coin);
        if (count($arr_coin) != $level)
        {
            //写入错误日志
            Db::name('error_log')->insert(['error_address'=>'index/login/add_coin','error_message'=>'代理模式等级与注册赠币格式不匹配','create_time'=>time()]);
            return true;
        }
        $member_id = $id;
        //增加币值
        for ($i=0;$i<(count($arr_coin)-1);$i++)
        {
            //查询父级id
            $member_id = Db::name('member')->where('id',$member_id)->find()['parent_id'];
            //增加币值
            $member_coin = Db::name('member')->where('id',$member_id)->find()['money'];
            $add_coin = $member_coin+$coin[$i];
            $result = Db::name('member')->where('id',$member_id)->update(['money'=>$add_coin]);
            if ($result === false)
            {
                //写入错误日志
                Db::name('error_log')->insert(['error_address'=>'index/login/add_coin','error_message'=>$i.'增加币值失败','error_content'=>$result,'create_time'=>time()]);
                return true;
            }
        }
        return true;

    }
}
