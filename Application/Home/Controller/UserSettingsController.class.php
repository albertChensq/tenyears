<?php
/**
*   控制器名：用户信息修改控制器
*   功能说明：个人信息修改、密码重置
*/

namespace Home\Controller;
use Think\Controller;
// use Home\Controller\HomeController;
class UserSettingsController extends Controller {
    // 查询显示个人设置页面信息
    public function index(){
    	//session获得用户信息
    	if(empty($_SESSION['users']['email'])){
			$this->redirect('Index/index');
		}

 		$array['nickname'] = $_SESSION['users']['nickname'];
        $array['headpic'] = $_SESSION['users']['headpic'];
        $array['age'] = $_SESSION['users']['age'];
        $array['sex'] = $_SESSION['users']['sex'];
        $array['current_desc'] = $_SESSION['users']['current_desc'];
        $array['future_desc'] = $_SESSION['users']['future_desc'];
        $array['address'] = $_SESSION['users']['address'];
        $array['id'] = $_SESSION['users']['id'];
        $this -> assign($array); 
 		$this -> display();
    }


    // 个人信息修改
    public function infomod(){
    	//实例化users表
    	$users = M('users');
    	//接收更新的数据
    	if(empty($_POST['headpic'])){
    		unset($_POST['headpic']);
    	}
    	$users -> create();
    	$id = $_SESSION['users']['id'];

    	//更改数据
    	$res = $users -> where("id='{$id}'") -> save();
    	if($res){
    		$ress = $users -> where("id='{$id}'") -> select();
    		$_SESSION['users'] = $ress['0'];
    		$this->redirect('UserSettings/index');
    	}else{
    		$this->redirect('UserSettings/index');
    	}
    }


    // 密码修改
    public function pwdmod(){
    	$upwd = md5($_POST['userpwd']);
    	$users = M('users');
    	$id = $_SESSION['users']['id'];
    	$userpwd = $_SESSION['users']['userpwd'];
    	if($upwd == $userpwd){
    		$userpwd = md5($_POST['newpwd']);
    		$where['id'] = $id;
    		$res = $users -> where($where) -> setField('userpwd',$userpwd);
    		if($res){
    			$_SESSION['users']['userpwd'] = $userpwd;
    			echo 'true';
    		}else{
    			echo 'false';
    		}

    	}else{
    		echo 'error';
    	}
    }
   

    // 头像上传
    public function upload(){
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
            $images = $upload-> upload();
            //判断是否有图
            if($images){
                $info = $images['Filedata']['savename'];
               echo $info;
            }
            else{
                $this-> error($upload -> getError());//获取失败信息
            }
        }
    }


    // 重置密码邮箱与昵称验证
    public function checkreset(){
        // 如果邮箱与昵称正确，写session
        $where['email'] = $_POST['email'];
        $where['nickname'] = $_POST['nickname'];
        $user = M("users");
        $res = $user -> where($where) -> find();
        if($res){
            $_SESSION['users']['id'] = $res['id'];
            echo "true";
        }else{
            echo "false";
        }

    }


    // 重置密码操作
    public function resetpwd(){
        $id = $_SESSION['users']['id'];
        $data['userpwd'] = md5($_POST['userpwd']);
        $user = M("users");
        $res = $user -> where("id='{$id}'") -> save($data);
        if($res){
            session(null);
            echo "true";
        }else{
            echo "false";
        }
    }
}

    