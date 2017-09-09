<?php
/**
*   控制器名：图片评论控制器
*   功能说明：图片评论添加、查询、删除
*/
namespace Home\Controller;
use Think\Controller;
class PiccommentsController extends Controller {

    //添加图片评论
    public function add() {

        // 获取图片评论ID
        $_POST['pid'] = $_POST['id'];
        // 释放$_POST['id'] 用create 创建数据 把不需要字段给销毁
        unset($_POST['id']);
        //获取发布时间
        $_POST['posttime'] = time();
        //获取发布评论的用户ID
        $_POST['uid'] = $_SESSION['users']['id'];
        //实例化piccomments表
        $piccomments = M('piccomments');
        //创建数据
        $piccomments -> create();
        //添加数据
        $res = $piccomments -> add();
        //数据添加成功返回true,失败返回false
        if($res){
            $piccomments = D();
            $res = $piccomments -> field("users.headpic, users.nickname, piccomments.id, piccomments.content, piccomments.uid, piccomments.posttime")
            -> table('ten_piccomments piccomments, ten_users users')
            -> where("piccomments.uid = users.id")
            -> order("piccomments.id desc")
            -> limit(1)
            -> select();

            // 转成json对象传给js
            $comments = json_encode($res);
            echo $comments;   
        }
    }


    //图片评论查询
    public function sec() {

        //获取图片ID
        $pid = $_POST['id'];
        //联表查询，查询出
        $piccomments = D();
        $res = $piccomments -> field("users.headpic, users.nickname, piccomments.id, piccomments.content, piccomments.uid, piccomments.posttime")
        -> table('ten_piccomments piccomments, ten_users users')
        -> where("piccomments.pid = '{$pid}' && piccomments.uid = users.id")
        -> select();

        // 转成json对象传给ajax处理
        $comments = json_encode($res);
        echo $comments;
    }


    //图片评论删除
    public function del() {
       
        // 获取图片评论ID 
        $id = $_POST['id'];
        $where['id'] = $id;
        $piccomments = M('piccomments');
        $res = $piccomments -> where($where) -> delete();
        if($res){
            echo 'true';
        }
    }

}
   
