<?php
namespace Admin\Controller;
use Admin\Controller\AdminController;
class PiccommentsController extends AdminController{

	// 照片分页搜索查询
    public function index(){

		$content = $_GET['content'];
		$piccomments = M('piccomments');
		$where['content'] = array('like',"%{$content}%");
		if(empty($where['content'])){
	        $count = $piccomments -> count();
	        $page = new \Think\Page($count,3);
	        $data = $piccomments -> limit($page -> firstRow.','.$page -> listRows) -> order('id asc') -> select();
      	}else{
	        $count = $piccomments -> where($where) -> count();
	        $page = new \Think\Page($count,3);
	        $data = $piccomments -> where($where) -> limit($page -> firstRow.','.$page -> listRows) -> order('id asc') -> select();
      	}
		$show = $page-> show();
		$this -> assign('piccomments', $data);
		$this -> assign('page', $show);
		$this -> display();
    }

    public function del(){
       
		//获取梦想ID      
		$id = $_POST['id'];
		$where['id'] = $id;
		$piccomments = M('piccomments');

		//删除梦想评论
		$res = $piccomments -> where($where)->delete();
        if ($res) {
          	echo 'ok';
        }else{
          	echo 'nimei';
        }
    }
}
