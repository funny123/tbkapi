<?php
/**
 * Created by PhpStorm.
 * User: 15499
 * Date: 2018/4/4
 * Time: 10:32
 */

namespace app\api\controller;


use think\Controller;
use think\Db;
use think\Session;

class Member extends Controller
{
    //获得我的币值
    public function getMyCoin()
    {
        $type = input('type');
        if ($type == 'all')
        {
            $money = Db::name('member')
                ->where('id',Session::get('user.id'))
                ->field('money')
                ->find()['money'];
            if (!$money)
            {
                exit(json_encode(['code'=>2]));
            }else
            {
                $freeze_coin = Db::name('freeze_coin')->where('user_id',Session::get('user.id'))->field('money')->find()['money'];
                if ($freeze_coin)
                {
                    exit(json_encode(['code'=>1,'all_coin'=>$money+$freeze_coin])) ;
                }else
                {
                    exit(json_encode(['code'=>1,'all_coin'=>$money])) ;
                }
            }
        }elseif ($type='freeze')
        {
            $freeze_coin = Db::name('freeze_coin')->where('user_id',Session::get('user.id'))->field('money')->find()['money'];
            if ($freeze_coin)
            {
                exit(json_encode(['code'=>1,'freeze_coin'=>$freeze_coin])) ;
            }else
            {
                exit(json_encode(['code'=>2,'freeze_coin'=>0])) ;
            }
        }
    }
}