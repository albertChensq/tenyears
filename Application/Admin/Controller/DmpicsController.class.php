<?php
// 梦想在照片控制器
namespace Admin\Controller;
use Admin\Controller\AdminController;
class DmpicsController extends AdminController{

	// 照片分页搜索查询
    public function index(){
    	
		$content = $_GET['content'];
		$dmpics = M('dmpics');
		$where['content'] = array('like',"%{$content}%");
		if(empty($where['content'])){
	        $count = $dmpics -> count();
	        $page = new \Think\Page($count,2);
	        $data = $dmpics -> limit($page -> firstRow.','.$page -> listRows)->select();
      	}else{
	        $count = $dmpics-> where($where) -> count();
	        $page = new \Think\Page($count,2);
	        $data = $dmpics -> where($where) -> limit($page -> firstRow.','.$page -> listRows) -> select();
      	}
		$show = $page-> show();
		$this -> assign('dmpics', $data);
		$this -> assign('page', $show);
		$this -> display();
    }

    public function del(){
       
		//获取图片ID      
		$id = $_POST['id'];
		$where['pid'] = $id;
		$where1['id'] = $id;
		$dmpics = M();
		//先删除图片下的评论
      	$res = $dmpics -> table('ten_piccomments') -> where($where) -> delete();
      
      	//然后删除图片
      	$res1 = $dmpics -> table('ten_dmpics') -> where($where1) -> delete();
        if ($res && $res1) {
          echo 'ok';
        }else{
          echo 'nimei';
        }
    }
}
