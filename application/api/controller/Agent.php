<?php
/**
 * Created by PhpStorm.
 * User: 15499
 * Date: 2018/4/2
 * Time: 21:32
 */

namespace app\api\controller;


use app\api\model\AgentModel;
use think\Controller;
use think\Db;
use think\Session;

class Agent extends Controller
{
    //查找下级代理
    public function getAgentInfo()
    {
        $model = new AgentModel();
        $res = $model->getTree(212070,'money');
        $res = json_encode($res);
        echo $res;
    }

    //查询每级代理的币值总金额
    public function getAgentCoin()
    {
        $model = new AgentModel();
        echo '<pre>';
        $res = $model->getCoinTotal(212070);
        var_dump($res);
    }

    //查询当前下级代理
    public function getMemberAgent()
    {
        $model = new AgentModel();
        $res   = $model->getTree(Session::get('user.id'),'money');
        exit(json_encode($res));
    }
}