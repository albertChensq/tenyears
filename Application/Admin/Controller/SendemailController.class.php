<?php
namespace Admin\Controller;
use Admin\Controller\AdminController;
class SendemailController extends AdminController{

	// NOTICE分页搜索查询
	public function index(){

		//实例化对象
		$sendemails = M('sendemails');

		//get方法获取搜索关键字
		$keywords = $_GET['keywords'];

		//设置搜索查询的where条件
		$where['content'] = array('like',"%{$keywords}%");

		// 判断当where条件为空时全部搜索
		if(empty($where['content'])){
			$count = $sendemails -> count();
			$page = new \Think\Page($count,10);
			$data = $sendemails -> limit($page -> firstRow.','.$page -> listRows)-> order('id desc') -> select();
		}else{

		// 当where不为空时条件搜索
			$count = $sendemails -> where($where) -> count();
			$page = new \Think\Page($count,10);
			$data = $sendemails -> where($where) -> limit($page -> firstRow.','.$page -> listRows) -> order('id desc') -> select();
		}

		// 分页显示输出
		$show = $page-> show();

		// 赋值数据集
		$this -> assign('sendemails', $data);
		// 赋值分页显示输出
		$this -> assign('page', $show);
		$this -> display();
	}

	// NOTICE删除
	public function del(){
		 
		//获取梦想ID      
		$id = $_POST['id'];
		$sendemails = M('sendemails');
		$where['id'] = $id;
		
		//删除公告
		$res = $sendemails -> where($where) -> delete();

		// 判断$res 给ajax一个返回值
		if ($res) {
			echo 'ok';
		}else{
			echo 'nimei';
		}
	}
}
