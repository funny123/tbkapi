<?php
/**
 * Created by PhpStorm.
 * User: 15499
 * Date: 2018/3/26
 * Time: 10:00
 */

namespace app\index\validate;


use think\Validate;

class CheckOrder extends Validate
{

    protected $rule = [
        'password'  =>  'require|number|length:6'
    ];

    protected $field = [
        'password'  =>  '交易密码'
    ];

    protected $scene = [
        'password'  => ['password']
    ];
}