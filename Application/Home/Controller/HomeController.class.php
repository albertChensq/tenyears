<?php
/**
*	控制器名：前台基本权限控制器
*	功能说明：验证用户是否登录，执行跳转
*/
namespace Home\Controller;
use Think\Controller;
class HomeController extends Controller{
	public function _initialize(){

		// 验证登陆,没有登陆则跳转到登陆页面
		if(empty($_SESSION['users']['email'])){
			$this->redirect('Index/index');
		}
	}
}