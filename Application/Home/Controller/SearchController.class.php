<?php
/**
*	控制器名：搜索控制器
*	功能说明：搜索梦想与用户
*/
namespace Home\Controller;
use Think\Controller;
class SearchController extends Controller {
    public function index(){
    	$keyword = $_POST["keyword"];
    	
    	// 分配关键字到网页供搜索用户使用
    	$this -> assign("keyword",$keyword);

    	// 查询当前登录用户关注的人(隐藏)
        $follow = M("follow");
        $followlist = $follow -> field("followed") -> where("followers='{$_SESSION["users"]["id"]}'") -> select();
        foreach ($followlist as $value) {
            $flist[] = $value["followed"];
        }
        $fliststr = implode(',', $flist);
        $this -> assign("followlist",$fliststr);
        $this -> display();
    }


    // 搜索梦想
    public function searchdream(){
      	$keyword = $_POST["keyword"];
      	if(empty($keyword)){
      		return;
      	}
    	$Momel = D();
    	$where["dmdesc"] = array("like","%{$keyword}%");
		$where["_string"] = "users.id = dreams.uid";
		$res = $Momel -> field("users.nickname,users.headpic,dreams.id,dreams.uid,dreams.title,dreams.dmdesc,dreams.deadline")
					  ->table("ten_dreams dreams,ten_users users")
					  ->where($where)
					  ->order("dreams.id desc")
					  ->select();
		if($res){
			$dreamlist = json_encode($res);
			echo $dreamlist;
		}else{
			echo false;
		}
    }


    // 搜索用户
    public function searchuser(){
    	$keyword = $_POST["keyword"];
    	if(empty($keyword)){
    		return;
    	}
    	$where["nickname"] = array("like","%{$keyword}%");
    	$users = M("users");
    	$res = $users -> where($where) -> select();
    	if($res){
    		$userlist = json_encode($res);
    		echo $userlist;  		
    	}else{
    		echo "false";
    	}
    }

}