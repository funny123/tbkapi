<?php
/**
 * Created by PhpStorm.
 * User: 15499
 * Date: 2018/3/31
 * Time: 17:42
 */

namespace app\index\controller;


use app\index\model\LoginModel;
use app\index\model\UserModel;
use think\Controller;
use think\Db;
use think\Session;

class Info extends Controller
{

    //个人信息
    public function info()
    {
        return $this->fetch();
    }

    //实名认证
    public function renzhengform()
    {
        $request = request();
        if ($request->isGet())
        {
            //展示实名认证页面
            //判断是否已经提交实名认证信息
//            $model  = new UserModel();
//            $result = $model->getStatusCertification(Session::get('user.id'));
//            if ($result['status'] === 1)
//            {
//                return $this->display('您的实名认证信息，已经提交，请等待审核！');
//            }elseif ($result['status'] === 2)
//            {
//                return $this->display('您的实名认证信息，已经审核通过！');
//            }
            //判断是否有实名认证图片未上传的错误信息
            if (Session::has('imgMessage'))
            {
                $this->assign('imgMessage',Session::get('imgMessage'));
                $this->assign('data',Session::get('data'));
            }
            //判断是否有字段验证错误信息
            if (Session::has('message'))
            {
                $this->assign('message',Session::get('message'));
                $this->assign('data',Session::get('data'));
            }
            return $this->fetch();

        }elseif ($request->isPost())
        {
            //处理post提交的实名认证
            //判断身份证是否存在上传
            $data = input();
            if (!$request->file('person_img'))
            {
                return $this->redirect('renzhengform',[],302,[
                    'data'          =>  $data,
                    'imgMessage'    =>  '身份证图片没有上传！'
                ]);
            }
            //处理上传图片
            $img    = $request->file('person_img');
            $info   = $img->validate(['size'=>1048576,'ext'=>'jpg,png,gif'])->move(ROOT_PATH . 'public' . DS . 'uploads'. DS .'person_img');
            if ($info)
            {
                //上传成功后，获取信息
                $data['person_img'] = $info->getSaveName();
            }else
            {
                return $this->redirect('renzhengform',[],302,[
                    'data'          =>  $data,
                    'imgMessage'    =>  $img->getError()
                ]);
            }

            //验证上传数据
            $validate = validate('CheckCertification');
            $result   = $validate->batch(true)->check($data);
            if (!$result)
            {
                //删除图片
//                unlink(ROOT_PATH . 'public' . DS . 'uploads'. DS .'person_img' .DS.$data['person_img']);
                return $this->redirect('renzhengform',[],302,[
                    'data'      => $data,
                    'message'   =>$validate->getError()
                ]);
            }


            //数据正确，数据入库
            $data['status']      = 1;//提交审核
            $data['create_time'] = time();
            $data['update_time'] = time();
            $data['transaction_password'] = md5($data['transaction_password']);
            $personId = Db::name('person_info')
                ->strict(false)
                ->insertGetId($data);
            //数据插入失败
            if (!$personId)
            {
                //删除图片
                unlink(ROOT_PATH . 'public' . DS . 'uploads'. DS .'person_img' .DS.$data['person_img']);
                return $this->error('实名认证信息提交失败，请重试');
            }
            //修改个人信息字段
            $result = Db::name('member')->where('id',Session::get('user.id'))->update(['person_info_id'=>$personId]);
            if ($result !== false)
            {
                return $this->success('实名认证信息提交成功！请等待管理员审核');
            }else
            {
                unlink(ROOT_PATH . 'public' . DS . 'uploads'. DS .'person_img' .DS.$data['person_img']);
                return $this->error('实名认证信息提交失败，请重试！');
            }
        }
    }

    //收款方式
    public function shoukuan()
    {

        $pay = Db::name('pay_way')->where('member_id',Session::get('user.id'))->find();
        $this->assign('pay',$pay);
        return $this->fetch();
    }

    //重置登录密码
    public function loginpw()
    {
        $request = request();
        if ($request->isPost())
        {
            $data         = input();
            $oldPassword  = Db::name('member')->where('id',Session::get('user.id'))->find()['password'];
            //原密码错误
            if (md5(md5($data['oldPassword']).config('auth_key')) != $oldPassword)
            {
                return 2;
            }
            //修改密码
            $res = Db::name('member')->where('id',Session::get('user.id'))->update(['password'=>md5(md5($data['newPassword']).config('auth_key'))]);
            if ($res)
            {
                return 1;
            }else
            {
                return 3;
            }
        }
        return $this->fetch();
    }

    //重置交易密码
    public function jiaoyipw()
    {
        $request = request();
        if ($request->isPost())
        {
            $data         = input();
            $person_info_id  = Db::name('member')->where('id',Session::get('user.id'))->find()['person_info_id'];
            $transaction_password = Db::name('person_info')->where('id',$person_info_id)->find()['transaction_password'];
            //原密码错误
            if (md5($data['oldPassword']) != $transaction_password)
            {
                return 2;
            }
            //修改密码
            $res = Db::name('person_info')->where('id',$person_info_id)->update(['transaction_password'=>md5($data['newPassword'])]);
            if ($res)
            {
                return 1;
            }else
            {
                return 3;
            }
        }
        return $this->fetch();
    }

    //购买订单
    public function ordering()
    {
        return $this->fetch();
    }
    public function order1()
    {
        return $this->fetch();
    }

    //卖出订单
    public function order2()
    {
        return $this->fetch();
    }

    //资金管理
    public function my_money()
    {
        return $this->fetch();
    }
    public function money()
    {
        return $this->fetch();
    }

    //团队收益
    public function in_come()
    {
        return $this->fetch();
    }

    //我的团队
    public function team()
    {
        return $this->fetch();
    }

    //我的邀请码
    public function invite()
    {
        return $this->fetch();
    }

    //矿机
    public function kj()
    {
        return $this->fetch();
    }

    //矿机商城@马
    public function kj_mall()
    {
        return $this->fetch();
    }
    //交易中心@马
    public function jy_center()
    {
        return $this->fetch();
    }
    //团队收益@马
    public function team_income()
    {
        return $this->fetch();
    }
    //我的矿机@马
    public function my_kj()
    {
        return $this->fetch();
    }
    //我的战队@马
    public function my_team()
    {
        return $this->fetch();
    }
    //排行榜@马
    public function pai()
    {
        return $this->fetch();
    }
    //客服中心@马
    public function kf_center()
    {
        return $this->fetch();
    }
    //确认@马
    public function mai_review()
    {
        return $this->fetch();
    }
    //联系@马
    public function mai_lianxi()
    {
        return $this->fetch();
    }
    //修改支付方式
    public function edit_pay()
    {
        $data = input();
        $request = request();
        if ($request->isAjax())
        {
            //修改支付宝支付状态
            if ($data['pay_name'] == 'aliPay')
            {
                //查询支付状态
                $id= Session::get('user.id');
                $res = Db::name('pay_way')->where('member_id',$id)->find();
                //未添加支付方式
                if (!$res['aliPay_img'])
                {
                    return json_encode(['code'=>0]);
                }
                return $data['pay_status'];
            }
            //修改支付宝支付状态
            if ($data['pay_name'] == 'wechatPay')
            {
                //查询支付状态
                $id= Session::get('user.id');
                $res = Db::name('pay_way')->where('member_id',$id)->find();
                //未添加支付方式
                if (!$res['wechatPay_img'])
                {
                    return json_encode(['code'=>0]);
                }
            }
        }

    }
    //上传付款二维码
    public function pay_img()
    {
        $data                       = input();
        $request                    = request();
        $uploadData['member_id']    = Session::get('user.id');//用户id
        $uploadData['create_time']  = time();
        $uploadData['update_time']  = time();
        //支付宝二维码
        if ($data['type'] == 'aliPay')
        {
            $aliPay_img = $request->file('aliPay_img');
            if (!$aliPay_img)
            {
                return $this->error('二维码图片未上传！');
            }

            //验证图片
            $info = $aliPay_img->validate(['size'=>1048576,'ext'=>'jpg,png,gif'])->move(ROOT_PATH . 'public' . DS . 'uploads'. DS .'aliPay_img');
            if ($info)
            {
                //上传成功后，获取信息
                $uploadData['aliPay_img'] = $info->getSaveName();
            }else
            {
                return $this->error($aliPay_img->getError());
            }
            $uploadData['aliPay_status'] = 0;//未开启支付宝支付
            $res = Db::name('pay_way')->insert($uploadData);
            if ($res)
            {
                return $this->success('二维码上传成功','shoukuan');
            }else
            {
                //删除上传的图片
                @unlink(ROOT_PATH . 'public' . DS . 'uploads'. DS .'aliPay_img'.DS.$uploadData['aliPay_img']);
                return $this->error('图片上传失败，请重试！','shoukuan');
            }
        }elseif ($data['type'] == 'wechatPay')
        {
            $wechatPay_img = $request->file('wechatPay_img');
            if (!$wechatPay_img)
            {
                return $this->error('二维码图片未上传！');
            }

            //验证图片
            $info = $wechatPay_img->validate(['size'=>1048576,'ext'=>'jpg,png,gif'])->move(ROOT_PATH . 'public' . DS . 'uploads'. DS .'wechatPay_img');
            if ($info)
            {
                //上传成功后，获取信息
                $uploadData['wechatPay_img'] = $info->getSaveName();
            }else
            {
                return $this->error($wechat_img->getError());
            }
            $uploadData['wechatPay_status'] = 0;//未开启支付宝支付
            $res = Db::name('pay_way')->insert($uploadData);
            if ($res)
            {
                return $this->success('二维码上传成功','shoukuan');
            }else
            {
                //删除上传的图片
                @unlink(ROOT_PATH . 'public' . DS . 'uploads'. DS .'aliPay_img'.DS.$uploadData['wechatPay_img']);
                return $this->error('图片上传失败，请重试！','shoukuan');
            }
        }
    }

    //交易密码输入
    public function transaction_password()
    {
        $request  = request();
        if ($request->isPost())
        {
            $data = input();
            $password = Db::name('member')
                ->alias('m')
                ->join('person_info pi','m.person_info_id=pi.id','LEFT')
                ->where('m.id',Session::get('user.id'))
                ->field('pi.transaction_password')
                ->find()['transaction_password'];
            if (md5($data['password']) != $password)
            {
                exit(json_encode(2));
            }else
            {
                exit(json_encode(1));
            }
        }
    }

    //查询个人账户余额
    public function person_money()
    {
        $money = Db::name('member')->where('id',Session::get('user.id'))->field('money')->find();
        exit(json_encode($money)) ;
    }

    //邀请码
    public function getInvite()
    {
        $my_invite = 'htttp://www.eintcoin.com/index/login/register?code='.Session::get('user.id');
        exit(json_encode(['inviteCode'=>$my_invite])) ;
    }

}
