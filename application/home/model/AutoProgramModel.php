<?php
/**
 * Created by PhpStorm.
 * User: 15499
 * Date: 2018/3/28
 * Time: 11:35
 */

namespace app\home\model;


use think\Db;
use think\Model;

class AutoProgramModel extends Model
{
    //查询所有用户
    public function getAllMemberId()
    {
        return Db::name('member')
            ->field('id')
            ->select();
    }

    //查询该用户下的所有矿机
    public function getMemberMills($member_id)
    {
        return Db::name('person_mills')
            ->alias('pm')
            ->join('mills m','pm.mills_id=m.id','LEFT')
            ->where('pm.user_id',$member_id)
            ->field('m.create_coin,m.status,m.id mills_id,m.create_time,m.date')
            ->select();
    }

}