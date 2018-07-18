<?php
/**
 * Created by PhpStorm.
 * User: 15499
 * Date: 2018/3/30
 * Time: 16:46
 */

namespace app\api\controller;


use think\Controller;
use think\Db;

class Gethistorydata extends Controller
{
    public function data()
    {
        $data = Db::name('money_history')->order('create_time desc')->field('history_date time,history_price price')->select();

        $arr = array();
        for ($i=0;$i<count($data)-2;$i++)
        {
            $j = $i+1;
            $arr[$i]['time']    = date('Y/m/d-H',$data[$j]['time']);
            $arr[$i]['open']    = $data[$i]['price'];
            $arr[$i]['close']   = $data[$j]['price'];
            $arr[$i]['max']     = max([$arr[$i]['open'],$arr[$i]['close']]);
            $arr[$i]['min']     = min([$arr[$i]['open'],$arr[$i]['close']]);
            $arr[$i] = array_values($arr[$i]);
        }
        exit(json_encode(array_reverse($arr)));
    }
}
