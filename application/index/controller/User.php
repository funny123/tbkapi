<?php
/**
 * Created by PhpStorm.
 * User: 15499
 * Date: 2018/3/21
 * Time: 16:48
 */

namespace app\index\controller;


use app\index\model\UserModel;
use think\console\command\make\Model;
use think\Controller;
use think\Session;

class User extends Controller
{
    //个人首页
    public function index()
    {
        return $this->fetch();
    }
    //用户信息
    public function info()
    {
        //查询用户信息
        return $this->fetch();
    }
    //修改用户信息
    public function edit_info()
    {
        $request = request();

        if ($request->isGet())
        {
            //展示用户修改信息
            //回显错误信息
            if (Session::has('message'))
            {
                $this->assign('data',Session::get('data'));
                $this->assign('message',Session::get('message'));
            }
            return $this->fetch();
        }else if($request->isPost())
        {
            //修改用户提交的信息
            $data       = input();
            //验证用户信息
            $validate   = validate('CheckUser');
            $result     = $validate->batch(true)->scene('edit_info')->check($data);
            if (!$result)
            {
                return $this->redirect('edit_info',[],302,[
                    'data'      =>  $data,
                    'message'   =>  $validate->getError()
                ]);
            }
            //数据入库
            $model = new UserModel();
            $result = $model->editOneUser(Session::get('user.id'),$data);
            if ($result || $result !==false)
            {
                //修改session记录
                Session::set('user',$model->getOneUser(Session::get('user.id')));
                return $this->success('信息修改成功！');
            }else
            {
                return $this->error('信息修改失败');
            }

        }
    }
    //实名认证
    public function certification()
    {
        $request = request();
        if ($request->isGet())
        {
            //展示实名认证页面
            //判断是否已经提交实名认证信息
            $model  = new UserModel();
            $result = $model->getStatusCertification(Session::get('user.id'));
            if ($result['status'] === 1)
            {
                return $this->display('您的实名认证信息，已经提交，请等待审核！');
            }elseif ($result['status'] === 2)
            {
                return $this->display('您的实名认证信息，已经审核通过！');
            }
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
                return $this->redirect('certification',[],302,[
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
                return $this->redirect('certification',[],302,[
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
                return $this->redirect('certification',[],302,[
                    'data'      => $data,
                    'message'   =>$validate->getError()
                ]);
            }

            //数据正确，数据入库
            $model               = new UserModel();
            $data['status']      = 1;//提交审核
            $data['create_time'] = time();
            $data['update_time'] = time();
            $data['transaction_password'] = md5($data['transaction_password']);
            $personId = $model->addPersonInfo($data);
            //数据插入失败
            if (!$personId)
            {
//                //删除图片
//                unlink(ROOT_PATH . 'public' . DS . 'uploads'. DS .'person_img' .DS.$data['person_img']);
                return $this->error('实名认证信息提交失败，请重试');
            }
            //修改个人信息字段
            $result = $model->editOneUser(Session::get('user.id'),['person_info_id'=>$personId]);
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
}