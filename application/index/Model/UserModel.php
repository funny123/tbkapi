<?php
/**
 * Created by PhpStorm.
 * User: 15499
 * Date: 2018/3/21
 * Time: 16:55
 */

namespace app\index\model;


use think\Db;
use think\Model;

class UserModel extends Model
{
    protected $name = 'member';

    protected $autoWriteTimestamp = true;
    //获取个人信息
    public function getOneUser($id)
    {
        return $this->where('id',$id)->find();
    }

    //编辑个人信息
    public function editOneUser($id,$data)
    {
        return $this->isUpdate(true)->allowField(true)->save($data,['id'=>$id]);
    }

    //插入实名认证
    public function addPersonInfo($data)
    {
        return Db::name('person_info')
            ->insertGetId($data);
    }
    //查询实名认证状态
    public function getStatusCertification($id)
    {
        return Db::name('member')
            ->alias('m')
            ->join('person_info pi','m.person_info_id = pi.id','LEFT')
            ->where('m.id',$id)
            ->field('pi.status')
            ->find();
    }
}