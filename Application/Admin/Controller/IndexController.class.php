<?php
namespace Admin\Controller;
use Admin\Controller\AdminController;
class IndexController extends AdminController {

	// 后台首页控制器
    public function index(){

        $this-> assign('nickname',$_SESSION['users']['nickname']);
        $this-> display();
    }
}

            