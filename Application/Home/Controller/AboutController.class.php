<?php
/*
*	控制器名：关于控制器
*	功能说明：控制显示关于页面信息
*/
namespace Home\Controller;
use Think\Controller;
class AboutController extends Controller {
    public function index(){

        $this -> display();
    }

}