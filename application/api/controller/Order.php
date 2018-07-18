<?php
/**
 * Created by PhpStorm.
 * User: 15499
 * Date: 2018/4/9
 * Time: 10:22
 */

namespace app\api\controller;


use think\Controller;
use think\Db;
use think\Session;

class Order extends Controller
{
    //获取所有交易信息
    public function getAllOrder()
    {
        $buy_res = Db::name('order')
            ->alias('o')
            ->join('member m','o.buy_id=m.id','LEFT')
            ->where('o.type',2)
            ->where('o.status',1)
            ->field('m.account,m.id,o.price,o.number,o.price*number total,o.type,o.status')
            ->select();
        $sell_res = Db::name('order')
            ->alias('o')
            ->join('member m','m.id=o.sell_id','LEFT')
            ->where('o.type',1)
            ->where('o.status',1)
            ->field('m.account,m.id,o.price,o.number,o.price*number total,o.type,o.status')
            ->select();
        $res = array_merge($buy_res,$sell_res);
        foreach ($res as &$v)
        {
            if ($v['type'] == 1)
            {
                $v['type'] = '卖';
            }elseif ($v['type'] == 2)
            {
                $v['type'] = '买';
            }
        }
        shuffle($res);
        exit(json_encode($res)) ;
    }

    //判断用户是否有余额购买当前账单
    public function buy_coin_balance()
    {
        $request = request();
        if ($request->isPost())
        {
            $data = input();
            if (isset($data['order_id']))
            {
                //查询账户余额
                $memberRes = Db::name('member')->where('id',Session::get('user.id'))->field('money')->find();
                //查询订单详情
                $orderRes  = Db::name('order')->where('id',$data['order_id'])->find();
                if ($memberRes['money']<$orderRes['number'])
                {
                    exit(json_encode(['code'=>3,'msg'=>'余额不足'])) ;
                }
                exit(json_encode(['code'=>1,'msg'=>'余额充足'])) ;
            }else
            {
                exit(json_encode(['code'=>2,'msg'=>'参数错误'])) ;
            }
        }
    }

    //确认支付
    public function buy_coin()
    {
        $request = request();
        if ($request->isPost())
        {
            $data = input();
            if (isset($data['order_id']))
            {
                //修改订单状态
                $data['buy_id'] = Session::get('user.id');
                $data['status'] = 2;
                $res = Db::name('order')->where('id',$data['order_id'])->strict(false)->update($data);
                if ($res)
                {
                    exit(json_encode(['code'=>1,'msg'=>'成功！'])) ;
                }else
                {
                    exit(json_encode(['code'=>3,'msg'=>'失败！'])) ;
                }
            }else
            {
                exit(json_encode(['code'=>2,'msg'=>'参数错误'])) ;
            }
        }
    }

    //展示卖家信息
    public function sell_info()
    {
        $request = request();
        if ($request->isPost())
        {
            $data = input();
            if (isset($data['order_id']))
            {
                $sell_id    = Db::name('order')->where('id',$data['order_id'])->field('sell_id')->find();

                $memberData = Db::name('member')->alias('m')->join('person_info pi','m.person_info_id=pi.id','LEFT')->where('m.id',$sell_id['sell_id'])->field('m.account,m.mobile,pi.name,pi.bank_id,m.qq,m.wechat')->find();
                exit(json_encode(['code'=>1,'data'=>$memberData])) ;
            }else
            {
                exit(json_encode(['code'=>2,'msg'=>'参数错误'])) ;
            }
        }

    }

    //卖币
    public function sell_coin()
    {
        $request = request();
        if ($request->isPost())
        {

            $data = input();
            if (isset($data['price'])&isset($data['number'])&$data['number']>0)
            {
                $res = Db::name('member')->where('id',Session::get('user.id'))->field('money,id')->find();
                //判断当前账户余额
                if ($res['money']<$data['number'])
                {
                    exit(json_encode(['code'=>3,'msg'=>'当前账户余额不足！']));
                }

                //数据入库
                $data['sell_id']       = Session::get('user.id');
                $data['create_time']   = time();
                $data['update_time']   = time();
                $data['type']          = 1;         //卖单
                $data['status']        = 1;         //已订单已经提交
                $sellRes = Db::name('order')->strict(false)->insertGetId($data);

                if ($sellRes)
                {
                    //冻结卖单
                    $freezeData['order_id']    = $sellRes;
                    $freezeData['user_id']     = Session::get('user.id');
                    $freezeData['money']       = $data['number'];
                    $freezeData['create_time'] = time();
                    $freezeRes = Db::name('freeze_coin')->insertGetId($freezeData);
                    if ($freezeRes)
                    {
                        //扣减账户
                        $nowMoney = $res['money']-$data['number'];
                        $nowRes = Db::name('member')->where('id',Session::get('user.id'))->update(['money'=>$nowMoney]);
                        if ($nowRes!==false)
                        {
                            exit(json_encode(['code'=>1,'msg'=>'订单提交成功！'])) ;
                        }else
                        {
                            //删除冻结卖单、订单
                            @Db::name('sell_freeze')->where('id',$freezeRes)->delete();
                            @Db::name('order')->where('id',$sellRes)->delete();
                            exit(json_encode(['code'=>6,'msg'=>'账户余额扣减失败'])) ;
                        }

                    }else
                    {
                        //删除已经提交的订单
                        @Db::name('order')->where('id',$sellRes)->delete();
                        exit(json_encode(['code'=>5,'msg'=>'账户冻结失败']));
                    }
                }else
                {
                    exit(json_encode(['code'=>4,'msg'=>'订单提交失败'])) ;
                }
            }else
            {
                exit(json_encode(['code'=>2,'msg'=>'参数错误'])) ;
            }
        }
    }
    //pc端支付截图上传@马
    public function uploadPayImgPc()
    {
        $request = request();
        if ($request->file('payImg'))
        {
            $payImg = $request->file('payImg');
            //截图验证
            $info   = $payImg->validate(['size'=>1048576,'ext'=>'jpg,png,gif'])->move(ROOT_PATH.DS.'uploads'.DS.'payImg');
            if ($info)
            {
                $data['pay_img'] = $info->getSaveName();
            }else
            {
                // exit(json_encode(['code'=>3,'msg'=>$payImg->getError()])) ;
                echo $payImg->getError();
            }
            $data['buy_id']      = Session::get('user.id');
            $data['create_time'] = time();
            $data['update_time'] = time();
            $res = Db::name('pay_img')->insert($data);
            if ($res)
            {
                // exit(json_encode(['code'=>1,'msg'=>'上传成功！'])) ;
                echo "上传成功!";
            }else
            {
                //删除图片
                @unlink(ROOT_PATH.DS.'uploads'.DS.'payImg'.$data['pay_img']);
                // exit(json_encode(['code'=>4,'msg'=>'上传失败']));
                echo "上传失败";
            }
        }else
        {
            // exit(json_encode(['code'=>2,'msg'=>'参数错误'])) ;
            echo "参数错误";
        }
    }
    //支付截图上传
    public function uploadPayImg()
    {
        $request = request();
        if ($request->file('payImg'))
        {
            $payImg = $request->file('payImg');
            //截图验证
            $info   = $payImg->validate(['size'=>1048576,'ext'=>'jpg,png,gif'])->move(ROOT_PATH.'uploads'.DS.'payImg');
            if ($info)
            {
                $data['pay_img'] = $info->getSaveName();
            }else
            {
                exit(json_encode(['code'=>3,'msg'=>$payImg->getError()])) ;
            }
            $data['buy_id']      = Session::get('user.id');
            $data['create_time'] = time();
            $data['update_time'] = time();
            $res = Db::name('pay_img')->insert($data);
            if ($res)
            {
                exit(json_encode(['code'=>1,'msg'=>'上传成功！'])) ;
            }else
            {
                //删除图片
                @unlink(ROOT_PATH.DS.'uploads'.DS.'payImg'.$data['pay_img']);
                exit(json_encode(['code'=>4,'msg'=>'上传失败']));
            }
        }else
        {
            exit(json_encode(['code'=>2,'msg'=>'参数错误'])) ;
        }
    }

    //卖家确认收款
    public function confirm_money()
    {
        $request = request();
        if ($request->isPost())
        {
            $data = input();
            if (isset($data['order_id']))
            {
                $res = Db::name('order')->where('id',$data['order_id'])->update(['status'=>3]);
                if ($res !== false)
                {
                    //冻结货币转入买家账户
                    $coin     = Db::name('freeze_coin')->where('order_id',$data['order_id'])->field('money')->find();
                    $buy_id   = Db::name('order')->where('id',$data['order_id'])->field('buy_id')->find();
                    $buy_coin = Db::name('member')->where('id',$buy_id['buy_id'])->field('money')->find();
                    $res = Db::name('member')->where('id',$buy_id['buy_id'])->update(['money'=>$buy_coin['money']+$coin['money']]);
                    if ($res)
                    {
                        //删除冻结数据
                        $freezeRes = Db::name('freeze_coin')->where('order_id',$data['order_id'])->delete();
                        if ($freezeRes)
                        {
                            exit(json_encode(['code'=>1,'msg'=>'确认成功'])) ;
                        }else
                        {
                            exit(json_encode(['code'=>5,'msg'=>'失败'])) ;
                        }

                    }else
                    {
                        exit(json_encode(['code'=>4,'msg'=>'转入失败'])) ;
                    }

                }else
                {
                    exit(json_encode(['code'=>3,'msg'=>'确认失败'])) ;
                }

            }else
            {
                exit(json_encode(['code'=>2,'msg'=>'参数错误'])) ;
            }

        }
    }

    //卖给他币
    public function sell_member_coin()
    {
        $request = request();
        if ($request->isPost())
        {
            $data = input();
            if (isset($data['order_id']))
            {
                //修改订单状态
                $data['sell_id']     = Session::get('user.id');
                $data['update_time'] = time();
                $data['status']      = 2;
                $res = Db::name('order')->strict(false)->where('id',$data['order_id'])->update($data);
                if ($res)
                {
                    exit(json_encode(['code'=>1,'msg'=>'订单提交成功'])) ;
                }else
                {
                    exit(json_encode(['code'=>3,'msg'=>'订单提交失败'])) ;
                }

            }else
            {
                exit(json_encode(['code'=>2,'msg'=>'参数错误'])) ;
            }
        }

    }

    //买家信息
    public function buy_info()
    {
        $request = request();
        if($request->isPost())
        {
            $data = input();
            if (isset($data['order_id']))
            {
                $order = Db::name('order')->where('id',$data['order_id'])->field('buy_id')->find();
                $info  = Db::name('member')->alias('m')->join('person_info pi','m.person_info_id=pi.id','LEFT')->where('m.id',$order['buy_id'])->field('m.account,pi.name,m.mobile,m.qq,m.wechat,pi.bank_id')->find();
                exit(json_encode(['code'=>1,'data'=>$info])) ;
            }else
            {
                exit(json_encode(['code'=>2,'msg'=>'参数错误'])) ;
            }
        }
    }

    //我要买币
    public function member_buy_coin()
    {
        $request = request();
        if ($request->isPost())
        {
            $data = input();
            if (isset($data['price'])&isset($data['number']))
            {
                if (isset($data['/api/order/member_buy_coin']))
                {
                    unset($data['/api/order/member_buy_coin']);
                }

                //订单生成
                $data['buy_id']      = Session::get('user.id');
                $data['type']        = 2;                             //买单
                $data['status']      = 1;                             //提交订单
                $data['create_time'] = time();
                $data['update_time'] = time();

                $res = Db::name('order')->insert($data);
                if ($res)
                {
                    exit(json_encode(['code'=>1,'msg'=>'订单提交成功！'])) ;
                }else
                {
                    exit(json_encode(['code'=>3,'msg'=>'订单提交失败'])) ;
                }
            }else
            {
                exit(json_encode(['code'=>2,'msg'=>'参数错误！'])) ;
            }
        }
    }

    //查询所有买币订单
    public function get_all_buy_order()
    {
        $request = request();
        if ($request->isGet())
        {
            $orders = Db::name('order')->where('status',1)->where('type',2)->field('id  order_id,buy_id,number,price,create_time')->select();
            foreach ($orders as &$v)
            {
                $v['create_time'] = date('Y-m-d H:i:s',$v['create_time']);
                $v['total']       = $v['price']*$v['number'];
            }
            exit(json_encode($orders)) ;
        }
    }

    //查询所有卖币订单
    public function get_all_sell_order()
    {
        $request = request();
        if ($request->isGet())
        {
            $orders = Db::name('order')->where('status',1)->where('type',1)->field('id order_id,sell_id,create_time,price,number')->select();
            foreach ($orders as &$v)
            {
                $v['create_time'] = date('Y-m-d H:i:s',$v['create_time']);
                $v['total']       = $v['price']*$v['number'];
            }
            exit(json_encode($orders)) ;
        }
    }

    //查询我的订单
    public function get_my_order()
    {
        $request = request();
        if ($request->isPost())
        {
            $data = input();
            if (isset($data['type']))
            {
                if ($data['type'] == 'ing')
                {
                    $buy_order  = Db::name('order')->where('buy_id',Session::get('user.id'))->where('status',2)->select();
                    $sell_order = Db::name('order')->where('sell_id',Session::get('user.id'))->where('status',2)->select();
                    $all_order  = array_merge($buy_order,$sell_order);
                    exit(json_encode(['code'=>1,'data'=>$all_order])) ;
                }elseif ($data['type'] == 'buy')
                {
                    $buy_order  = Db::name('order')->where('buy_id',Session::get('user.id'))->where('status',3)->select();
                    exit(json_encode(['code'=>1,'data'=>$buy_order])) ;
                }elseif ($data['type'] == 'sell')
                {
                    $sell_order = Db::name('order')->where('sell_id',Session::get('user.id'))->where('status',3)->select();
                    exit(json_encode(['code'=>1,'data'=>$sell_order])) ;
                }

            }else
            {
                exit(json_encode(['code'=>2,'msg'=>'参数错误！'])) ;
            }
        }
    }

    //查询当前订单
    public function get_one_order_info()
    {
        $request = request();
        if ($request->isPost())
        {
            $data = input();
            if (isset($data['order_id']))
            {
                $order = Db::name('order')->where('id',$data['order_id'])->find();
                if ($order)
                {
                    exit(json_encode(['code'=>1,$order]));
                }else
                {
                    exit(json_encode(['code'=>3,'msg'=>'订单不存在！']));
                }
            }else
            {
                exit(json_encode(['code'=>2,'msg'=>'参数错误']));
            }
        }
    }


}
