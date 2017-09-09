<?php
namespace Admin\Controller;
use Admin\Controller\AdminController;
class EmailController extends AdminController{

	// 系统信息分页搜索查询
    public function index(){

		//实例化对象
		$messages = M('messages');

		//get方法获取搜索关键字
		$keywords=$_GET['keywords'];

		//设置搜索查询的where条件
		$where['content'] = array('like',"%{$keywords}%");

		// 判断当where条件为空时全部搜索
		if(empty($where['content'])){
			$count = $messages ->count();
			$page = new \Think\Page($count,10);
			$data = $messages -> limit($page -> firstRow.','.$page -> listRows)-> order('id desc') -> select();
      	}else{

			// 当where不为空时条件搜索
			$count = $messages -> where($where) -> count();
			$page = new \Think\Page($count,10);
			$data = $messages -> where($where) -> limit($page -> firstRow.','.$page -> listRows) -> order('id desc') -> select();
      	}

		// 分页显示输出
		$show = $page-> show();

		// 赋值数据集
		$this -> assign('messages', $data);

		// 赋值分页显示输出
		$this -> assign('page', $show);
		$this -> display();
    }

    // 系统信息删除
    public function del(){
       
      //获取梦想ID      
      $id = $_POST['id'];
      $messages = M('messages');
      $where['id'] = $id;
      
      //删除公告
      $res = $messages -> where($where) -> delete();

      // 判断$res 给ajax一个返回值
        if ($res) {
          echo 'ok';
        }else{
          echo 'nimei';
        }
     }

    // 系统信息 添加页面显示
    public function add(){
      
     	$this -> display();
    }

    // 系统信息 添加方法
    public function insert(){

		// 实例化对象
		$data['posttime'] = time();
		$data['content'] = $_POST['content'];
		$messages = M('messages');
		$res = $messages -> add($data);

		// 判断是否添加成功
		if($res){
        	$this->success('添加成功','/tenyears/admin.php/admin/email',0);
   		}else{
        	$this->success('添加失败','/tenyears/admin.php/admin/messages/add',0);
      	} 
    }
}
