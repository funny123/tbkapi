<?php

namespace app\index\model;


use think\Db;
use think\Model;

class OrderModel extends Model
{
    protected $name='order';
    protected $autoWriteTimestamp = true;

    //卖单入库
    public function insertSell($data)
    {
        return $this->allowField(true)->save($data);
    }

    //查询交易密码
    public function getPassword($id)
    {
        return Db::name('member')->alias('m')->join('person_info as pi','m.person_id=pi.id')->where('m.id',$id)->field('pi.transaction_password password')->find();
    }

    //获取用户账户
    public function getMoney($id)
    {
        return Db::name('member')->where('id',$id)->field('money')->find();
    }

    //查询所有卖单
    public function getSellOrder($map)
    {
        return Db::name('order')->alias('o')->join('member m','o.user_id=m.id')->where('o.type',1)->where($map)->field('o.*,m.account')->select();
    }

    //查询单个订单信息
    public function getOneOrder($id)
    {
        return Db::name('order')->alias('o')->join('member m','o.user_id=m.id',"LEFT")->where('o.id',$id)->field('o.*,m.account,m.mobile,m.qq,m.wechat')->find();
    }

    //查询单个订单详情
    public function getOneOrderDetail($id)
    {
        return Db::name('order')->alias('o')->join('member m','o.user_id=m.id',"LEFT")->join('person_info pi','m.person_info_id=pi.id')->where('o.id',$id)->field('o.*,m.account,m.mobile,m.qq,m.wechat,pi.bank_id')->find();
    }

    //修改订单状态(已经购买)
    public function editOrderStatus($id,$data)
    {
        return Db::name('order')->where('id',$id)->update($data);
    }

    //查询我的所有已购订单
    public function getMyBuyOrder($id)
    {
        return Db::name('member')->alias('m')->join('order o','m.id=order.buy_id')->where('m.id',$id)->where('type',2)->field('o.*')->select();
    }

    //查询我的所有已卖订单
    public function getMySellOrder($id)
    {
        return Db::name('member')->alias('m')->join('order o','m.id=order.sell_id')->where('m.id',$id)->where('type',1)->field('o.*')->select();
    }
}