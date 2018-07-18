<?php
/**
 * Created by PhpStorm.
 * User: 15499
 * Date: 2018/4/8
 * Time: 19:34
 */

namespace app\index\controller;


use think\Controller;
use think\Db;
use think\Session;

class Test extends Controller
{
    public function test()
    {
//        var_dump(Session::get('user'));
        $limit_number = Db::name('mills_limit')->where('id',1)->find();
        var_dump($limit_number);
    }

    public function test2()
    {
        return $this->fetch();
    }

    public function want_buy_coin()
    {
        return $this->fetch();
    }

}