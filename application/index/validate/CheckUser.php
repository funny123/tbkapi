<?php
/**
 * Created by PhpStorm.
 * User: 15499
 * Date: 2018/3/21
 * Time: 14:31
 */

namespace app\index\validate;


use think\Validate;

class CheckUser extends Validate
{
    //验证规则
    protected $rule = [
        'account'           =>  'require|alphaNum|length:6,24',
        'parent_id'         =>  'number',
        'mobile'            =>  'require|number|length:11',
        'password'          =>  'require|alphaNum|length:6,24',
        'qq'                =>  'number',
        'wechat'            =>  'alphaNum'
    ];

    //验证字段
    protected $field = [
        'account'           =>  '账号',
        'parent_id'         =>  '上级代码',
        'mobile'            =>  '手机号码',
        'mobile_captcha'    =>  '手机验证码',
        'password'          =>  '密码',
        'confirm_password'  =>  '确认密码',
        'captcha'           =>  '验证码',
        'qq'                =>  'QQ账号',
        'wechat'            =>  '微信号'
    ];

    //验证场景
    protected $scene = [
        'register'  =>  ['account','parent_id','mobile','password','qq','wechat'],
        'login'     =>  ['account','password','captcha'],
        'edit_info' =>  ['qq','wechat']
    ];
}