<?php
namespace Admin\Controller;
use Admin\Controller\AdminController;
class IdeacommentsController extends AdminController{

	// 照片分页搜索查询
	public function index(){
		
		$content = $_GET['content'];
		$ideacomments = M('ideacomments');
		$where['content'] = array('like',"%{$content}%");
		if(empty($where['content'])){
			$count = $ideacomments -> count();
			$page = new \Think\Page($count,10);
			$data = $ideacomments -> limit($page -> firstRow.','.$page -> listRows) -> select();
		}else{
			$count = $ideacomments -> where($where) -> count();
			$page = new \Think\Page($count,10);
			$data = $ideacomments -> where($where) -> limit($page -> firstRow.','.$page -> listRows) -> select();
		}
		$show = $page-> show();
		$this -> assign('ideacomments', $data);
		$this -> assign('page', $show);
		$this -> display();
	}

	public function del(){
		 
		//获取梦想ID      
		$id = $_POST['id'];
		$where['id'] = $id;
		$ideacomments = M('ideacomments');

		//删除梦想评论
		$res = $ideacomments -> where($where)->delete();
		if ($res) {
			echo 'ok';
		}else{
			echo 'nimei';
		}
	}
}
