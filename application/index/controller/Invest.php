<?php
namespace app\index\controller;

use think\Controller;

class Invest extends Controller
{
    public function index()
    {

        return $this->fetch();

    }
	
	public function test() {
		return view('test');	
	}
}
