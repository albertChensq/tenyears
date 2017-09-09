<?php

/**
*   控制器名：想法评论控制器
*   功能说明：想法评论添加、查询、删除
*/
namespace Home\Controller;
use Think\Controller;
class IdeacommentsController extends Controller {
			
    //添加想法评论
    public function add(){

        //获取想法id
        $_POST['iid'] = $_POST['id'];
        unset($_POST['id']);
        //获取发布时间
        $_POST['posttime'] = time();
        //获取评论用户id
        $_POST['uid'] = $_SESSION['users']['id'];
        //实例化ideacomments表
        $ideacomments = M('ideacomments');
        //创建数据
        $ideacomments -> create();
        //添加数据
        $res = $ideacomments -> add();
        //数据添加成功返回true,失败返回error
        if($res){

            $ideacomments = D();
            $res = $ideacomments -> field('users.headpic,users.nickname,ideacomments.id,ideacomments.content,ideacomments.uid,ideacomments.posttime') 
            -> table('ten_ideacomments ideacomments,ten_users users')
            -> where("ideacomments.uid = users.id" )
            -> order('ideacomments.id desc')
            -> limit(1)
            -> select();
            $comments = json_encode($res);
            echo $comments; 
        }
    }


    // 评论查询
    public function sec() {

        //获取梦想id
        $iid = $_POST['id'];
        $dmcomments = D();
        $res = $dmcomments -> field('users.headpic, users.nickname, ideacomments.id, ideacomments.content, ideacomments.uid, ideacomments.posttime ') 
            -> table('ten_ideacomments ideacomments,ten_users users')
            -> where("ideacomments.iid = '{$iid}' && ideacomments.uid = users.id" )
            -> order('ideacomments.id desc')
            -> select();
        $comments = json_encode($res);
        echo $comments;
    }


    //删除想法评论
    public function del () {
        // 获取当前评论的id 
    	$id = $_POST['id'];
        $where['id'] = $id;
		//删除想法下面的评论
		$ideacomments = M('ideacomments');
		//删除评论
		$res = $ideacomments -> where($where) -> delete();
		if($res){
			echo "true";
		}
    }
}