<?php
/**
 * Created by PhpStorm.
 * User: 15499
 * Date: 2018/3/21
 * Time: 15:34
 */

namespace app\index\model;


use think\Model;

class LoginModel extends Model
{
    protected $name = 'member';
    //开启自动写入时间戳
    protected $autoWriteTimestamp = true;

    //注册用户
    public function insertUser($data)
    {

    }
}