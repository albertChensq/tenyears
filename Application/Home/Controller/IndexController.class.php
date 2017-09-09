<?php
/**
*	控制器名：首页显示控制器
*	功能说明：首页信息显示、分配
*/
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
    	$web = M("web");
    	$res = $web -> select();
    	$this -> assign('web',$res['0']);
        $this -> display();
    }
}