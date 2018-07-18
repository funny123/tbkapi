<?php
/**
 * Created by PhpStorm.
 * User: 15499
 * Date: 2018/3/31
 * Time: 19:18
 */

namespace app\api\controller;


use think\Controller;
use think\Db;
use think\Session;

class Coin extends Controller
{
    //获取当前币价
    public function price()
    {
        $data['price'] = Db::name('money')
            ->find()['price'];
            exit(json_encode($data));
    }

    //获取当前用户矿机专有购买币
    public function getUserMillsCoin()
    {
        $request = request();
        if ($request->isGet())
        {
            $res = Db::name('mills_limit_coin')
                ->where('user_id',Session::get('user.id'))
                ->find();
            if ($res)
            {
                $data['mills_limit_coin'] = $res['limit_coin'];
                exit(json_encode($data));
            }else
            {
                $data['mills_limit_coin'] = 0;
                exit(json_encode($data));
            }
        }

    }

}
