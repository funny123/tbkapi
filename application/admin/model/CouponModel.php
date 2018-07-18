<?php

namespace app\admin\model;

use think\Model;
use think\Db;
class CouponModel extends Model {
	protected $name = 'xls';
	protected $autoWriteTimestamp = true; // 开启自动写入时间戳

	/**
	 * 根据xls获取优惠券列表信息
	 */
	public function getCouponByXls($map, $Nowpage, $limits) {
		return $this->field('think_xls.*')
			->where($map)->page($Nowpage, $limits)->order('id desc')->select();
	}

	/**
	 * 根据搜索条件获取所有的用户数量
	 * @param $where
	 */
	public function getAllCount($map) {
		return $this->where($map)->count();
	}
	/**
	 * [删除优惠券]
	 * @param  [type] $id [description]
	 * @return [type]     [description]
	 */
	public function delCoupon($id)
	{
			try{
					$map['closed']=1;
					$this->save($map, ['id' => $id]);
					return ['code' => 1, 'data' => '', 'msg' => '删除成功'];
			}catch( PDOException $e){
					return ['code' => 0, 'data' => '', 'msg' => $e->getMessage()];
			}
	}
}
