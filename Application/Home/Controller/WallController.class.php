<?php
/**
*   动态页面主控制器
*   功能说明：显示相关静态信息、右侧滚动信息列表、
*/

namespace Home\Controller;
use Home\Controller\HomeController;
class WallController extends HomeController {
    public function index(){
    	$id = $_SESSION['users']['id'];

    	// 查询用户所有的梦想列表
    	$dream = M("dreams");
    	$dream_list = $dream -> field("id,title") -> where("uid='{$id}'") -> select();
    	$this -> assign("dream_list",$dream_list);

        // 右侧滚动信息列表
        $notice = M("notice");
        $motto = $notice -> field("content") -> select();
        $this -> assign("motto",$motto);

    	// 查询用户关注的人数，与被关注的次数
    	$follow = M("follow");
        $follownum = $follow -> where("followers='{$id}'") -> count();
        $followednum = $follow -> where("followed='{$id}'") -> count();
        $this -> assign("follow_num",$follownum[0]);
        $this -> assign("followed_num",$followednum[0]);

        $this -> display();
    }
}