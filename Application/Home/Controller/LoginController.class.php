<?php
/**
*	控制器名：登录注册控制器
*	功能说明：登录、注册、退出
*/

namespace Home\Controller;
use Think\Controller;
class LoginController extends Controller{
	
	//用户登录
	public function login () {
		$email = $_POST['email'];
		$userpwd = md5($_POST['userpwd']);
		//实例化user表
		$users = M('users');
		//查询数据库,判断邮箱及密码是否正确
		$map['email'] = $email;
		$map['userpwd'] = $userpwd;
		$res = $users -> where($map) -> select();
		//返回查询结果，邮箱及密码正确则返回ture,不正确则返回false
		if($res){
			$_SESSION['users'] = $res['0'];
			if($_POST['autologin']){
				setcookie('email',$email,time()+3600*24*7,'/');
				setcookie('userpwd',$userpwd,time()+3600*24*7,'/');
			}
			echo 'true';
		}else{
			echo 'false';
		}
	}


	//用户注册
	public function reg () {
		$email = $_POST['email'];  
		$_POST['userpwd'] = md5($_POST['userpwd']);
		$_POST['nickname'] = substr($email,0,strpos($email,'@'));
		//手工创建一个POST的值
		$_POST['regtime'] = time();
		//实例化users表
		$users = M('users');
		//创建数据
		$users -> create();
		//增加数据
		$res = $users -> add();

		if($res){
			// 将注册用户分配默认分组
			$where['uid'] = $res;
			$where['group_id'] = 2;
			$group = M("auth_group_access");
			if($group -> add($where)){
				$res = $users ->  where("email = '{$email}'") -> select();
		    	$_SESSION['users'] = $res['0'];
				echo $_SESSION['users']['id'];
			}else{
				echo 'error';
			}
		}else{
			echo 'error';
		}
	}



	//退出登录
	function logout () {
		if(!empty($_COOKIE['email']) or !empty($_COOKIE['userpwd'])){
			setcookie('email',null,-3600,'/');
			setcookie('userpwd',null,-3600,'/');
		}


		//2,清除session
		$_SESSION['users'] = null;

		//3,清除sessionid cookie
		if(!empty($_COOKIE[session_name()])){
			setcookie(session_name(),null,-3600,'/');
		}
		session_destroy();
		echo 'ok';
	}


	//验证邮箱是否被注册
	public function unique(){
		$email = $_POST['email'];
		//实例化user表
		$users = M('users');
		//查询email是否被注册过
		$res = $users -> where("email='{$email}'") -> find();
		//返回查询结果，如果email不可用则返回exist,如果不存在，则返回no exist
		if($res){
			echo 'true';
		}else{
			echo 'false';
		}
	}
}