<?php
// 梦想想法控制器
namespace Admin\Controller;
use Admin\Controller\AdminController;
class DmideasController extends AdminController{

	  // 想法分页搜索查询
    public function index(){

        $content = $_GET['content'];
        $dmideas = M('dmideas');
        $where['content'] = array('like',"%{$content}%");
        if(empty($where['content'])){
            $count = $dmideas -> count();
            $page = new \Think\Page($count,10);
            $data = $dmideas -> limit($page -> firstRow.','.$page -> listRows) -> select();
        }else{
            $count = $dmideas-> where($where)->count();
            $page = new \Think\Page($count,10);
            $data = $dmideas -> where($where) -> limit($page -> firstRow.','.$page -> listRows) -> select();
        }
        $show = $page-> show();
        $this -> assign('dmideas', $data);
        $this -> assign('page', $show);
        $this -> display();
    }

    // 想法删除操作
    public function del(){
      
        //获取想法ID      
        $id = $_POST['id'];
        $where['iid'] = $id;
        $where1['id'] = $id;
        $dmideas = M();

        //先删除想法下的评论
        $res = $dmideas -> table('ten_ideacomments') -> where($where) -> delete();

        //然后删除想法
        $res1 = $dmideas -> table('ten_dmideas') -> where($where1) -> delete();
        if($res && $res1){
            echo 'ok';
        }else{
            echo 'nimei';
        }
    }
}
