<?php
// 用户管理
namespace Admin\Controller;
use Admin\Controller\AdminController;
class UserController extends AdminController{

	// 用户管理分页搜索查询
    public function index(){

        $users = M('users');
        $where['email'] = $_GET['email'];
        if(empty($where['email'])){
            $count = $users ->count();
            $page = new \Think\Page($count,10,$where);
            $data = $users -> limit($page-> firstRow.','.$page->listRows) -> select();
        }else{
            $count = $users->where($where)->count();
            $page = new \Think\Page($count,10,$where);
            $data = $users -> where($where)-> limit($page-> firstRow.','.$page -> listRows) ->select();
        }
        $show = $page-> show();
        $this -> assign('users', $data);
        $this -> assign('page', $show);
        $this-> display();
    }

    //用户添加页面
    public function add(){

    	$this -> display();
    }

    //用户添加处理
    public function insert(){

        $_POST['userpwd'] = md5($_POST['userpwd']);
        $users = M('users');
        $res = $users -> data($_POST)-> add();
        if($res){
            $where['uid'] = $res;
            if($_POST['level'] == "0"){
                $where['group_id'] = 2;
            }else{
                $where['group_id'] = 1;
            }
            $group = M("auth_group_access");
            if($group -> add($where)){
                $this -> success('添加用户成功','/tenyears/admin.php/admin/user');
            }else{
                $this -> error("添加失败");
            }
        }else{
            $this -> error("添加失败");
        }
  }
     public function mod(){

        $id = $_GET['id'];
        $users = M('users');
        $res = $users -> where("id='{$id}'")->find();
        $this-> assign('users',$res);

      //性别判断 
        if($res['sex']==1){
            $this -> assign('man','selected');
        }else{
            $this -> assign('woman','selected');
        }

        //等级判断
        if($res['level']==1){
            $this -> assign('admin','selected');
        }else{
            $this -> assign('normal','selected');
        }
    
      //禁止用户判断
        if($res['isallow']==0){
            $this -> assign('allow','selected');
        }else{
            $this -> assign('notallow','selected');
        }
        $this -> display();
    }

    // 用户信息修改
    public function update(){

        if(!empty($_FILES)){
            //图片上传设置
            $config = array(   
                'maxSize'    =>    3145728, 
                'rootPath'   =>    'Public',
                'savePath'   =>    '/static/uploads/',  
                'saveName'   =>    array('uniqid',''), 
                'exts'       =>    array('jpg', 'gif', 'png', 'jpeg'),  
                'autoSub'    =>    false,   
                'subName'    =>    array('date','Ymd'),
            );
            $upload = new \Think\Upload($config);// 实例化上传类
            $images = $upload->uploadOne($_FILES['headpic']);
            //判断是否有图
            if($images){
              
                // $images['savename']就是图片的名字
                $_POST['headpic'] = $images['savename'];
            }
            else{
                $this->error($upload->getError());//获取失败信息
            }
        }
        $users = M('users');
        $res = $users -> where("id='{$_POST['id']}'") -> save($_POST);
        if($res){
            $this->success('修改成功');
        }else{
            $this->error('修改失败');
        }
     
    }

    // 用户删除
    public function del(){

        $id = $_POST['id'];
        $users = M('users');
        $res = $users->where("id='{$id}'")->delete();
        if($res){
            echo 'ok';
        }else{
            echo 'nimei';
        }
    }
}