<?php
/*
*	控制器名：用户主页面控制器
*	功能说明：显示用户信息和所有相关记录
*/
namespace Home\Controller;
use Think\Controller;
class UserController extends Controller {
    public function index(){
        // 判断请求的页面是本人还是其它用户
    	if(empty($_GET['id'])){
    		$ownerid = $_SESSION['users']['id'];
    	}else{
    		$ownerid = $_GET['id'];
    	}
        
    	// 查询页面所属用户信息
    	$ownerinfo = M("users");
    	$owner = $ownerinfo -> where("id='{$ownerid}'") -> find();
    	$this -> assign("owner",$owner);

    	// 查询该用户梦想个数
    	$dream = M("dreams");
    	$dream_num = $dream -> where("uid='{$ownerid}'") -> count();
    	$this -> assign("dream_num",$dream_num[0]);

    	// 查询该用户想法数
    	$idea = M("dmideas");
    	$idea_num = $idea -> where("uid='{$ownerid}'") -> count();
    	$this -> assign("dmidea_num",$idea_num[0]);

    	// 查询该用户图片数,及所有图片
    	$dmpic = M("dmpics");
    	$dmpic_num = $dmpic -> where("uid='{$ownerid}'") -> count();
    	$this -> assign("dmpic_num",$dmpic_num[0]);
    	
        // 统计赞数
        $admire1 = $dream -> field("admirenum") -> where("uid='{$ownerid}' and admirenum > 0") -> select();
        $admire2 = $idea -> field("admirenum") -> where("uid='{$ownerid}' and admirenum > 0") -> select();
        $admire3 = $dmpic -> field("admirenum") -> where("uid='{$ownerid}' and admirenum > 0") -> select();

        $admire_num = 0;
        foreach ($admire1 as $v1) {
            $admire_num += $v1["admirenum"];
        }
        foreach ($admire2 as $v2) {
            $admire_num += $v2["admirenum"];
        }
        foreach ($admire3 as $v3) {
            $admire_num += $v3["admirenum"];
        }
        $this -> assign("admire_num",$admire_num);

        // 查询梦想id与title
        $dreamlist = $dream -> where("uid='{$ownerid}'") -> order("id desc") -> select();
        $this -> assign("dreamlist",$dreamlist);
        
        // 查询当前登录用户所关注的好友id，(隐藏)
        $follow = M("follow");
        $followlist = $follow -> field("followed") -> where("followers='{$_SESSION["users"]["id"]}'") -> select();
        foreach ($followlist as $value) {
            $flist[] = $value["followed"];
        }
        $this -> assign("followlist",$flist);

        // 查询要展示的梦想
        // did为空默认显示最新梦想
        if(empty($_GET['did'])){
            $curdream = $dream -> where("uid='{$ownerid}'") -> order("id desc") -> limit(1) -> select();
            $curdid = $curdream[0]['id'];
            $this -> assign("curdream",$curdream[0]);
        }else{
            $did = $_GET['did'];
            $curdid = $did;
            $curdream = $dream -> where("id='{$did}'") -> find();
            $this -> assign("curdream",$curdream);
        }
        // 查询当前梦想的所有图片和想法
        $piclist = $dmpic -> where("did='{$curdid}'") -> order("id desc") -> select();
        $this -> assign("piclist",$piclist);
        $moodlist = $idea ->where("did='{$curdid}'") -> order("id desc") -> select();
        // 拼装回复个数
        foreach ($moodlist as &$value) {
            $reply = M("ideacomments");
            $num = $reply -> where("{$value['id']} = ten_ideacomments.iid") -> count();
            $value['replynum'] = $num;
        }
        $this -> assign("moodlist",$moodlist);

 		$this -> display();
    }


    // 加关注
    public function follow(){
        if(empty($_SESSION["users"]["id"])){
            return;
        }

        $_POST["followers"] = $_SESSION["users"]["id"];

        // 不能对自己关注
        if($_POST["followers"] == $_POST["followed"]){
            return;
        }

        $follow = M("follow");
        $res = $follow -> data($_POST) -> add();
    
        if($res){
            echo $res;
        }
    }


    // 取消关注
    public function unfollowed(){
        if(empty($_SESSION["users"]["id"])){
            return;
        }

        $_POST["followers"] = $_SESSION["users"]["id"];

        $follow = M("follow");
        $res = $follow -> where("followers='{$_POST["followers"]}' AND followed='{$_POST["followed"]}'") -> delete();
        if($res){
            echo "ok";
        }
    }
}