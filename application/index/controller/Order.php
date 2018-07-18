<?php
namespace app\index\controller;


use app\index\model\OrderModel;
use think\Controller;
use think\Db;
use think\Session;

class Order extends Controller
{

    public function _initialize()
    {
        $person = Db::name('member')->where('id',Session::get('user.id'))->find();
        if (!isset($person['person_info_id']))
        {
           return $this->error('请您先实名认证哦','user/certification');
        }
    }

    //货币购买
    public function buy()
    {
        $request = request();
        if ($request->isGet())
        {
            //查询卖币订单
            $model = new OrderModel();
            $sellOrder = $model->getSellOrder([]);
            $this->assign('sellOrder',$sellOrder);
            return $this->fetch();
        }
    }

    //货币出售
    public function sell()
    {
        return $this->fetch();
    }

    //我要卖币
    public function my_sell()
    {
        $model           = new OrderModel();
        $request = request();
        if ($request->isGet())
        {
            //错误回显
            if (Session::has('dataMessage'))
            {
                $this->assign('data',Session::get('data'));
                $this->assign('dataMessage',Session::get('dataMessage'));
            }
            return $this->fetch();
        }elseif ($request->isPost())
        {
            $data = input();
            //验证数据
//            $validate = validate('CheckOrder');
//            $result = $validate->batch(true)->check();
//            if (!$result)
//            {
//                $this->redirect('my_sell',[],302,[
//                    'data'      => $data,
//                    'dataMessage'   => $validate->getError()
//                ]);
//            }

            //查询账户是否有币
            $user_money = $model->getMoney(Session::get('user.id'));
            if ($user_money['money']<$data['number'])
            {
                return $this->error('账户余额不足');
            }
            //数据入库
            $data['user_id'] = Session::get('user.id');
            $data['type']    = 1;//卖单
            $result          = $model->insertSell($data);
            if ($result)
            {
                return $this->success('卖单已提交');
            }else
            {
                return $this->error('订单提交失败');
            }
        }

    }

    //我要买币
    public function my_buy()
    {
        $model = new OrderModel();
        $request = request();
        if ($request->isGet())
        {
            //获取订单和用户详情
            $orderData = $model->getOneOrder(input('id'));
            $this->assign('orderData',$orderData);
            return $this->fetch();
        }
    }

    //我要买币详情
    public function my_buy_detail()
    {
        $model = new OrderModel();
        $request = request();
        if ($request->isGet())
        {
            $id = input('id');
            //错误回显
            if (Session::has('fileMessage'))
            {
                $this->assign('fileMessage',Session::get('fileMessage'));
                $id = Session::get('data.id');
            }
            //获取订单和用户详情
            $orderDataDetail = $model->getOneOrderDetail($id);
            $this->assign('orderDataDetail',$orderDataDetail);
            return $this->fetch();
        }elseif ($request->isPost())
        {
            $data = input();
            //验证是否上传截图
            $file = $request->file('pay_img');
            $info = $file->validate(['size'=>10048576,'ext'=>'jpg,png,gif'])->move(ROOT_PATH . 'public' . DS . 'uploads'.DS.'pay_img');
            if ($info)
            {
                $data['pay_img'] = $info->getSaveName();
            }else
            {
                return $this->redirect('my_buy_detail',[],302,[
                    'data' => $data,
                    'fileMessage' =>$file->getError()
                ]);
            }

            //订单信息修改
            $id = input('id');
            $data['buy_id'] = Session::get('user.id');
            $data['status'] = 2;//交易中
            $result = $model->editOrderStatus($id,$data);
            if ($result)
            {
                //订单状态修改成功
                return $this->success('订单提交成功，等待卖方确认！','buy');
            }else
            {
                //订单状态修改失败
               @unlink(ROOT_PATH.'public' . DS . 'uploads' . DS . 'pay_img' . DS . $data['pay_img']);
                return $this->error('订单提交失败，请重试！','buy');
            }

        }
    }

    //我要卖币详情
    public function my_sell_detail()
    {
        $model = new OrderModel();
    }

    //输入交易密码
    public function password()
    {
        $request = request();
        if ($request->isGet())
        {
            return $this->fetch();
        }elseif ($request->isPost())
        {
            $data = input();
            //验证数据
            $validate = validate('CheckOrder');
            $result = $validate->batch(true)->scene('password')->check($data);
            if (!$result)
            {
                return ['type'=>0,'message'=>$validate->getError()];
            }

            //检测交易密码
            $model = new OrderModel();
            $password = $model->getPassword(Session::get('user.id'));//查询交易密码
            if ($password != md5($data['password']))
            {
                return ['type'=>2,'message'=>false];
            }else
            {
                return ['type'=>3,'message'=>true];
            }
        }
    }

    //查询我的所有已购订单
    public function getMyBuyOrder()
    {
        $model = new OrderModel();
        $data  = $model->getMyBuyOrder(Session::get('user.id'));
        return json_encode($data);
    }

    //查询我的所有已购订单
    public function getMySellOrder()
    {
        $model = new OrderModel();
        $data  = $model->getMySellOrder(Session::get('user.id'));
        return json_encode($data);
    }

}