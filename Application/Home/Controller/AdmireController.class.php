<?php
/**
*	控制器名：点赞控制器
*   功能说明：本控制器用于处理网站各个
*             页面的点赞与取消点赞功能
*/
namespace Home\Controller;
use Think\Controller;
class AdmireController extends Controller {
    public function index(){
        $this -> display();
    }

    // 点赞与取消点赞
    public function admire(){

    	// 获取对应表名与主题id
    	$uid = $_SESSION['users']['id'];
    	$id = $_POST['id'];
    	$table = $_POST['table'];
    	$admire = M("$table");

    	// 查询已经点过赞的用户id列表
    	$admirelist = $admire -> field("admire") -> where("id='{$id}'") -> find();
    	$admirestr = $admirelist['admire'];

    	// 将用户id列表组成数组
    	$admirearr = explode(',', $admirestr);

    	// 确定当前用户是否已经赞过
    	if(in_array($uid, $admirearr)){

    		// 已赞，删除该用户id，并更新赞数减1
    		$key = array_search($uid, $admirearr);
    		unset($admirearr[$key]);

    		// 重新统计赞数，组装新字符串
    		$admirestr = join(',',$admirearr);

    		// 更新数据库
    		$admire -> where("id='{$id}'") -> setField("admire","$admirestr");
    		$admire -> where("id='{$id}'") -> setDec("admirenum");

            // 输出给ajax，确定本次请求取消点赞
    		echo "del";

    	}else{
    		// 未赞，添加该用户，并更新赞数加1
    		array_push($admirearr, $uid);

            // 重新组装为字符串
    		$admirestr = join(',',$admirearr);

    		// 更新数据库
    		$admire -> where("id='{$id}'") -> setField("admire","$admirestr");
    		$admire -> where("id='{$id}'") -> setInc("admirenum");

            // 输出给ajax，确定本次请求点赞
    		echo "add";
    	}


    }

}