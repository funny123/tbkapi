<?php
namespace app\api\controller;
use think\Controller;
use think\Db;
use think\Request;
//获取淘宝客商品主图和标题
class Getpic extends Controller {
	public function index() {
		include EXTEND_PATH . 'wztaobao/TopSdk.php';
		$appkey = "21781101";
		$secret = "425355d23269cef324dd6da471bbbba0";
		$iid = Request::instance()->post('iid') ? Request::instance()->post('iid') : "560677120721";
		$c = new \TopClient;
		$c->appkey = $appkey;
		$c->secretKey = $secret;
		$req = new \TbkItemInfoGetRequest;
// $req->setFields("num_iid,title,pict_url,small_images,reserve_price,zk_final_price,user_type,provcity,item_url");
$req->setPlatform("1");
$req->setNumIids($iid);
$resp = $c->execute($req);
return $resp;
	}
}
