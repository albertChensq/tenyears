<?php
/*
*	控制器名：发现页面的主控制器
*	功能说明：显示标签和梦想家等静态信息
*/
namespace Home\Controller;
use Think\Controller;
class FindController extends Controller {
    public function index(){
    	
    	// 查询所有标签
    	$Tags = M("tags");
    	$taglist = $Tags -> select();
    	$this -> assign("taglist",$taglist);

    	// 查询梦想家用户信息
    	$Dreamer = M("users");
    	$dreamerlist = $Dreamer -> limit(8) -> select();
    	$this -> assign("dreamerlist",$dreamerlist);

        // 查询当前登录用户关注的人
        $follow = M("follow");
        $followlist = $follow -> field("followed") -> where("followers='{$_SESSION["users"]["id"]}'") -> select();
        foreach ($followlist as $value) {
            $flist[] = $value["followed"];
        }

        $this -> assign("followlist",$flist);

        $this -> display();
    }
}