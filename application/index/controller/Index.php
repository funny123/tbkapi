<?php
namespace app\index\controller;

use think\Controller;

class Index extends Controller {
	public function index() {

		// return $this->fetch();
		return 'hello';

	}

	public function test() {
		return view('test');
	}
}
