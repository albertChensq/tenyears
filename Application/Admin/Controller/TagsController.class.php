<?php
namespace Admin\Controller;
use Admin\Controller\AdminController;
class TagsController extends AdminController{

	// NOTICE分页搜索查询
	public function index(){

		//实例化对象
		$tags = M('tags');

		//get方法获取搜索关键字
		$keywords = $_GET['keywords'];

		//设置搜索查询的where条件
		$where['tagname'] = array('like',"%{$keywords}%");

		// 判断当where条件为空时全部搜索
		if(empty($where['tagname'])){
			$count = $tags -> count();
			$page = new \Think\Page($count,10);
			$data = $tags -> limit($page -> firstRow.','.$page -> listRows) -> order('id asc') -> select();
		}else{

		// 当where不为空时条件搜索
			$count = $tags -> where($where) -> count();
			$page = new \Think\Page($count,10);
			$data = $tags -> where($where) -> limit($page -> firstRow.','.$page -> listRows) -> order('id asc') -> select();
		}

		// 分页显示输出
		$show = $page -> show();

		// 赋值数据集
		$this -> assign('tags', $data);

		// 赋值分页显示输出
		$this -> assign('page', $show);
		$this -> display();
	}

	// NOTICE删除
	 public function del(){
		 
		//获取梦想ID      
		$id = $_POST['id'];
		$tags = M('tags');
		$where['id'] = $id;
		
		//删除公告
		$res = $tags -> where($where) -> delete();

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
		$data['tagname'] = $_POST['tagname'];
		$tags = M('tags');
		$res = $tags -> add($data);

		// 判断是否添加成功
		if($res){
			$this -> success('添加成功','/tenyears/admin.php/admin/tags',0);
		}else{
			$this -> success('添加失败','/tenyears/admin.php/admin/tags/add',0);
		} 
	}
}
