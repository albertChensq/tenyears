<?php
namespace Admin\Controller;
use Admin\Controller\AdminController;
class NoticeController extends AdminController{

	// NOTICE分页搜索查询
	public function index(){

		//实例化对象
		$notice = M('notice');

		//get方法获取搜索关键字
		$keywords=$_GET['keywords'];

		//设置搜索查询的where条件
		$where['content'] = array('like',"%{$keywords}%");

		// 判断当where条件为空时全部搜索
		if(empty($where['content'])){
			$count = $notice ->count();
			$page = new \Think\Page($count,10);
			$data = $notice -> limit($page -> firstRow.','.$page -> listRows)-> order('id desc') -> select();
		}else{

		// 当where不为空时条件搜索
			$count = $notice -> where($where) -> count();
			$page = new \Think\Page($count,10);
			$data = $notice -> where($where) -> limit($page -> firstRow.','.$page -> listRows) -> order('id desc') -> select();
		}

		// 分页显示输出
		$show = $page-> show();

		// 赋值数据集
		$this -> assign('notice', $data);

		// 赋值分页显示输出
		$this -> assign('page', $show);
		$this -> display();
	}

	// NOTICE删除
	public function del(){
		 
		//获取梦想ID      
		$id = $_POST['id'];
		$notice = M('notice');
		$where['id'] = $id;
		
		//删除公告
		$res = $notice -> where($where) -> delete();

		// 判断$res 给ajax一个返回值
		if ($res) {
			echo 'ok';
		}else{
			echo 'nimei';
		}
	}

	// NOTICE 添加页面显示
	public function add(){
		
		$this -> display();
	}

	// NOTICE 添加方法
	public function insert(){

		// 实例化对象
		$data['content'] = $_POST['content'];
		$notice = M('notice');
		$res = $notice -> add($data);

		// 判断是否添加成功
		if($res){
			$this->success('添加成功','/tenyears/admin.php/admin/notice',0);
		}else{
			$this->success('添加失败','/tenyears/admin.php/admin/notice/add',0);
		} 
	}
}
