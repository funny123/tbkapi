<?php

namespace app\admin\controller;
use app\admin\model\CouponModel;
use think\Controller;
use think\Request;
use think\Db;
class Coupon extends Base {
	/**
	 * 显示资源列表
	 *
	 * @return \think\Response
	 */
	public function index() {
		$key = input('key');
		$map['status'] = 1; //0未删除，1已删除
		if ($key && $key !== "") {
			$map['pId|pName|user_type'] = ['like', "%" . $key . "%"];
		}
		$coupon = new CouponModel();
		$Nowpage = input('get.page') ? input('get.page') : 1;
		$limits = config('list_rows'); // 获取总条数
		$count = $coupon->getAllCount($map); //计算总页面
		$allpage = intval(ceil($count / $limits));
		$lists = $coupon->getCouponByXls($map, $Nowpage, $limits);
		// dump($lists);
		$this->assign('Nowpage', $Nowpage); //当前页
		$this->assign('allpage', $allpage); //总页数
		$this->assign('val', $key);
		if (input('get.page')) {
			return json($lists);
		}
		return $this->fetch();
	}

	/**
	 * 显示创建资源表单页.
	 *
	 * @return \think\Response
	 */
	public function create() {
		//
	}

	/**
	 * 保存新建的资源
	 *
	 * @param  \think\Request  $request
	 * @return \think\Response
	 */
	public function save(Request $request) {
		//
	}

	/**
	 * 显示指定的资源
	 *
	 * @param  int  $id
	 * @return \think\Response
	 */
	public function read($id) {
		//
	}

	/**
	 * 显示编辑资源表单页.
	 *
	 * @param  int  $id
	 * @return \think\Response
	 */
	public function edit_coupon() {
		//
	}

	/**
	 * 保存更新的资源
	 *
	 * @param  \think\Request  $request
	 * @param  int  $id
	 * @return \think\Response
	 */
	public function update(Request $request, $id) {
		//
	}

	/**
	 * 删除指定资源
	 *
	 * @param  int  $id
	 * @return \think\Response
	 */
	public function delete($id) {
		//
	}
	/**
	 * 优惠券状态
	 * @author [小马哥] [717900268@qq.com]
	 */
	public function coupon_status() {
		$id = input('param.id');
		$status = Db::name('xls')->where('id', $id)->value('status'); //判断当前状态情况
		if ($status == 1) {
			$flag = Db::name('xls')->where('id', $id)->setField(['status' => 0]);
			return json(['code' => 1, 'data' => $flag['data'], 'msg' => '已禁止']);
		} else {
			$flag = Db::name('xls')->where('id', $id)->setField(['status' => 1]);
			return json(['code' => 0, 'data' => $flag['data'], 'msg' => '已开启']);
		}

	}
	/**
	 * 删除优惠券
	 * @author [小马哥] [717900268@qq.com]
	 */
	public function del_coupon()
	{
			$id = input('param.id');
			// $coupon = new CouponModel();
			// $flag = $coupon->delCoupon($id);
		$flag =	Db::table('think_xls')->where('id',$id)->delete();
		if($flag){
			return json(['code' => 200, 'data' => '删除成功', 'msg' => '删除成功']);
		}
			return json(['code' => 201, 'data' => '删除失败', 'msg' => '删除失败']);
	}
	/**
	 * 导入最新优惠券
	 * @return [type] [description]
	 */
	public function dumpxls(){
    return $this->fetch();
	}
	/**
	 * 处理用户上传文件
	 * @return [type] [description]
	 */
	public function doxls(){
		$path = ROOT_PATH . 'public' . DS . 'files'; //找到当前脚本所在路径
		$reader = PHPExcel_IOFactory::createReader('Excel5');
		$startTime = time();
		$PHPExcel = $reader->load($path . "/tb.xls"); // 载入excel文件
		$sheet = $PHPExcel->getSheet(0); // 读取第一個工作表
		$highestRow = $sheet->getHighestRow(); // 取得总行数
		$highestColumm = $sheet->getHighestColumn(); // 取得总列数
		/** 循环读取每个单元格的数据 */
		Db::query('truncate table think_xls');
		for ($row = 2; $row <= $highestRow; $row++) //行号从1开始
		{
			// for ($column = 'A'; $column <= $highestColumm; $column++) //列数是以A列开始
			// {
			// $dataset[''] = $sheet->getCell($column . $row)->getValue();
			$data['id'] = '';
			$data['pId'] = $sheet->getCell('A' . $row)->getValue();
			$data['pName'] = $sheet->getCell('B' . $row)->getValue();
			$data['pPic'] = $sheet->getCell('C' . $row)->getValue();
			$data['pDes'] = $sheet->getCell('D' . $row)->getValue();
			$data['pCat'] = $sheet->getCell('E' . $row)->getValue();
			$data['tbk_link'] = $sheet->getCell('F' . $row)->getValue();
			$data['pPrice'] = $sheet->getCell('G' . $row)->getValue();
			$data['pSales'] = $sheet->getCell('H' . $row)->getValue();
			$data['rate'] = $sheet->getCell('I' . $row)->getValue();
			$data['charges'] = $sheet->getCell('J' . $row)->getValue();
			$data['wangwang'] = $sheet->getCell('K' . $row)->getValue();
			$data['sell_id'] = $sheet->getCell('L' . $row)->getValue();
			$data['shop_name'] = $sheet->getCell('M' . $row)->getValue();
			$data['user_type'] = $sheet->getCell('N' . $row)->getValue();
			$data['coupon_id'] = $sheet->getCell('O' . $row)->getValue();
			$data['coupon_num'] = $sheet->getCell('P' . $row)->getValue();
			$data['coupon_remain'] = $sheet->getCell('Q' . $row)->getValue();
			$data['coupon_info'] = $sheet->getCell('R' . $row)->getValue();
			$data['coupon_start'] = $sheet->getCell('S' . $row)->getValue();
			$data['coupon_end'] = $sheet->getCell('T' . $row)->getValue();
			$data['coupon_link'] = $sheet->getCell('U' . $row)->getValue();
			$data['coupon_tbk_link'] = $sheet->getCell('V' . $row)->getValue();

			if (Db::table('think_xls')->insert($data)) {
				echo '插入成功';
				echo "<br/>";
			}
			// }
		}
		$endTime = time();
		$time = $endTime - $startTime;
		$count = $highestRow - 1;
		// echo "总共插入" . $count . "条商品数据,花了：" . $time . "秒";
		$result['num'] = $count;
		$result['time'] = $time;
		exit(json_encode($result));

    }


	}
