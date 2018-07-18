<?php
/**
 * Created by PhpStorm.
 * User: 15499
 * Date: 2018/3/22
 * Time: 9:50
 */

namespace app\index\validate;


use think\Validate;

class CheckCertification extends Validate
{

    protected $rule = [
//        'name'                  =>  ['regex'=>'/^[\x4e00-\x9fa5]{2,4}$/U'],
        'person_id'             =>  'require|alphaNum|length:18',
        'transaction_password'  =>  'require|number|length:6',
        'bank_mobile'           =>  'require|number|length:11'
    ];

    protected $field = [
//        'name'                  =>  '姓名',
        'person_id'             =>  '身份证号码',
        'transaction_password'  =>  '交易密码',
        'bank_mobile'           =>  '银行预留手机号码'
    ];
}