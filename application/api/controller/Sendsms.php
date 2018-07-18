<?php
/**
 * Created by PhpStorm.
 * User: 15499
 * Date: 2018/3/30
 * Time: 9:24
 */

namespace app\api\controller;


use think\Controller;
use think\Db;
use think\Session;

class Sendsms extends Controller
{

    private $SDK = 'SDK-BJR-010-01079';
    private $pwd = '0F9EDAB463821BC5392897A6A98BFED1';

    private function send($mobile,$content)
    {

        $str = file_get_contents('http://sdk.entinfo.cn:8061/webservice.asmx/mdsmssend?sn='.$this->SDK.'&pwd='.$this->pwd.'&mobile='.$mobile.'&content='.$content.'&ext=&stime=&rrid=&msgfmt=');
        if($str)
        {
            $xml = simplexml_load_string($str);
            $arr = json_decode(json_encode($xml),true);
            if ($xml)
            {
                if(intval($arr[0])>0)
                {
                    return true;
                };
                return false;
            }
            return false;
        }
        return false;
    }

    //注册短信
    public function register()
    {
        $mobile = input('mobile');
        $code = rand(100000,999999);//六位验证码
        Session::set('SMS',$code);//设置session
        $content = '【崟特币】欢迎您的注册，您的验证码是'.$code.'。提示：请勿泄露！';
        $res = $this->send($mobile,$content);
        if ($res)
        {
            echo json_encode(['code'=>1]);
        }else
        {
            echo json_encode(['code'=>2]);
        }
    }

    //调整币值提醒
    public function note()
    {
        $mobile = 18913193065;
        $content = '【崟特币】尊敬的管理员，请尽快调整您系统的币值！';
        $res = $this->send($mobile,$content);
        if ($res)
        {
            return true;
        }else
        {
            //错误日志
            Db::name('error_log')->insert(['error_address'=>'api/controller/sendSMS','error_message'=>'管理员通知短信发送失败！']);
            return false;
        }
    }

}