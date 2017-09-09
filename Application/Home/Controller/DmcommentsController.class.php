<?php
/**
*   控制器名：梦想评论控制器
*   功能说明：梦想评论的添加、查询、删除
*/
namespace Home\Controller;
use Think\Controller;
class DmcommentsController extends Controller {

    //添加梦想评论
    public function add() {

    	//获取梦想ID
    	$_POST['did'] = $_POST['id'];
    	unset($_POST['id']);
        // 获取发布时间
        $_POST['posttime'] = time();
        // 获取发布评论的用户id
        $_POST['uid'] = $_SESSION['users']['id'];
        //实例化dmcomments表
        $dmcomments = M('dmcomments');
        //根据表单提交的POST数据创建数据对象
        $dmcomments -> create();
        //添加数据到数据库
        $res = $dmcomments -> add();
        //数据添加成功返回true,失败返回false
        if($res){
           
            $dmcomments = D();
            $res = $dmcomments -> field('users.headpic,users.nickname,dmcomments.id,dmcomments.content,dmcomments.uid,dmcomments.posttime') 
            -> table('ten_dmcomments dmcomments,ten_users users')
            -> where("dmcomments.uid = users.id" )
            -> order('dmcomments.id desc')
            -> limit(1)
            -> select();
            $comments = json_encode($res);
            echo $comments; 
        }
    }


    //梦想评论查询
    public function sec() {
        //获取梦想id
        $did = $_POST['id'];
        $dmcomments = D();
        $res = $dmcomments -> field('users.headpic, users.nickname, dmcomments.id, dmcomments.content, dmcomments.uid, dmcomments.posttime ') 
            -> table('ten_dmcomments dmcomments,ten_users users')
            -> where("dmcomments.did = '{$did}' && dmcomments.uid = users.id" )
            -> order('dmcomments.id desc')
            -> select();
        $comments = json_encode($res);
        echo $comments;
    }


    //梦想评论删除
    public function del() {
        //获取当前评论的id
        $id = $_POST['id'];
        //实例化dmcomments对象
        $dmcomments = M('dmcomments');
        $where['id'] = $id;
        // 删除评论
        $res = $dmcomments -> where($where) ->delete();
        if($res){
            echo 'true';
        }
    }
}