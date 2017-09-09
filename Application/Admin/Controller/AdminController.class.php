<?php
// 后台权限认证 
namespace Admin\Controller;
use Think\Controller;
class AdminController extends Controller{

	public function _initialize(){

		// 验证登陆,没有登陆则跳转到登陆页面
		if(empty($_SESSION['users']['email'])){
			$this->redirect('Login/index');
		}

		//权限验证
		if(!authCheck(MODULE_NAME."/".CONTROLLER_NAME."/".ACTION_NAME,$_SESSION['users']['id'])){
			$this->redirect('Login/index');
		}

	}
}