<?php
// 梦想评论
namespace Admin\Controller;
use Admin\Controller\AdminController;
class DmcommentsController extends AdminController{

	  // 照片分页搜索查询
    public function index(){

        $content = $_GET['content'];
        $dmcomments = M('dmcomments');
        $where['content'] = array('like',"%{$content}%");
        if(empty($where['content'])){
            $count = $dmcomments -> count();
            $page = new \Think\Page($count,10);
            $data = $dmcomments -> limit($page -> firstRow.','.$page -> listRows) -> select();
        }else{
            $count = $dmcomments->where($where)->count();
            $page = new \Think\Page($count,10);
            $data = $dmcomments -> where($where) -> limit($page -> firstRow.','.$page -> listRows) -> select();
        }
            $show = $page-> show();
            $this -> assign('dmcomments', $data);
            $this -> assign('page', $show);
            $this -> display();
    }

    public function del(){
       
        //获取梦想ID      
        $id = $_POST['id'];
        $where['id'] = $id;
        $dmcomments = M('dmcomments');

        //删除梦想评论
        $res = $dmcomments -> where($where) -> delete();
        if ($res) {
            echo 'ok';
        }else{
            echo 'nimei';
        }
    }
  }
