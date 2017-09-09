<?php
namespace Admin\Controller;
use Admin\Controller\AdminController;
class DreamsController extends AdminController{

	// 梦想分页搜索查询
    public function index(){

        $dreams = M('dreams');
        $keywords = $_GET['keywords'];
        $where['title'] = array('like',"%{$keywords}%");
        $where['dmdesc'] = array('like',"%{$keywords}%");
        $where['_logic'] = 'or';
        if(empty($where['title']) && empty($where['dmdesc'])){
            $count = $dreams -> count();
            $page = new \Think\Page($count,10);
            $data = $dreams -> limit($page -> firstRow.','.$page -> listRows)->xselect();
        }else{
            $count = $dreams->where($where) -> count();
            $page = new \Think\Page($count,10);
            $data = $dreams -> where($where) -> limit($page -> firstRow.','.$page -> listRows) -> select();
        }
      
        $show = $page-> show();
        $this -> assign('dreams', $data);
        $this -> assign('page', $show);
        $this -> display();
    }

    // 梦想删除操作
    public function del(){

        // 获取梦想id
        $id = $_POST['id'];

        //实例化对象
        $dreams = D();

        //设置where 条件
        $where['id'] = $id;
        $where2['did'] = $id;

        //将查的结果集作为删除ideacomments的删除条件
        $res = $dreams -> field('id') -> table('ten_dmideas') -> where($where2) -> select();

        //将查询的结果集二维数组重新组成一维数组
        foreach ($res as $value) {
            $arr[] = $value['id'];
        }

        // 设置删除想法下的评论的查询条件
        $where1['iid'] = array('in',$arr);

        //先删除想法下的评论
        $res1 = $dreams -> table('ten_ideacomments') -> where($where1) -> delete() ;

        //删除想法
        $res2 = $dreams -> where($where2) -> table('ten_dmideas') -> delete();

        //将查的结果集作为删除piccomments的删除条件
        $res3 = $dreams -> field('id') -> table('ten_dmpics') -> where($where2)->select();

        //重组数组
        foreach ($res3 as $value1) {
            $arr1[] = $value1['id'];
        }

        // 设置删除照片下的评论的查询条件
        $where3['pid'] = array('in',$arr1);

        //先删除照片下的评论
        $res4 = $dreams -> table('ten_piccomments') -> where($where3) -> delete();

        //删除照片
        $res5 = $dreams -> where($where2) -> table('ten_dmpics') -> delete();
        // 删除梦想评论
        $res6 = $dreams -> where($where2) -> table('ten_dmcomments') -> delete();
        // 删除梦想
        $res7 = $dreams -> where($where) -> table('ten_dreams') -> delete();
        if($res && $res1 && $res2 && $res3 && $res4 && $res5 && $res6 && $res7 ){
            echo 'ok';
        }else{
            echo 'nimei';
        }
    }
  }
