<?php
namespace app\api\controller;
use think\Controller;
use think\Db;
use think\Request;
//获取淘宝客商品详情
class Getdetail extends Controller {
	public function index() {
		$id = Request::instance()->post('gid') ? Request::instance()->post('gid') : "560677120721";
		$json = $this->file_get_contents_curl("https://hws.alicdn.com/cache/mtop.wdetail.getItemDescx/4.1/?data=%7B%22item_num_id%22%3A%22{$id}%22%7D");
$data = json_decode($json, 1);
if ($data['data']['pages']) {
	$content = "";
	foreach ($data['data']['pages'] as $p) {
		$content .= $p;
	}
	$content = str_replace("<img>", "<img src=", $content);
	$content = str_replace("</img>", ">", $content);
	$content = str_replace("txt", "p", $content);
}
$arr['detail'] = $content;
return $arr;
	}
	//百川高级接口获取商品详情
	public function bc() {
		include EXTEND_PATH . 'riritao/TopSdk.php';
		$appkey = "23582365";
		$secret = "b9de6714a30272f3dc486cd8c62f34ad";
		$iid = Request::instance()->post('gid') ? Request::instance()->post('gid') : "560677120721";
		$c = new \TopClient;
		$c->appkey = $appkey;
		$c->secretKey = $secret;
		$req = new \ItemDetailGetRequest;
		// $req->setParams("areaId");
		$req->setItemId($iid);
		$req->setFields("item,price,delivery,skuBase,skuCore,trade,feature,props,debug");
		$resp = $c->execute($req);
		return $resp;
	}
	// curl获取
	function file_get_contents_curl($url) {
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // 跳过证书检查
	// curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, true); // 从证书中检查SSL加密算法是否存在
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
	$dxycontent = curl_exec($ch);
	return $dxycontent;
}
}
