<?php
// 后台登录管理
namespace Admin\Controller;
use Think\Controller;
class LoginController extends Controller {

    public function index(){
             $this -> display();
    }

    // 验证码
   function verify(){
   		ob_clean();
		$config =    array(
		    'fontSize'    =>    40,    // 验证码字体大小
		    'length'      =>    4,     // 验证码位数
		);
		$Verify = new \Think\Verify($config);
		$Verify->entry();
	}

    // 登录处理
    public function prologin(){

    	$email = $_POST['email'];
    	$userpwd = md5($_POST['userpwd']);
    	$vcode = $_POST['vcode'];
        $autologin = $_POST['autologin'];
    	$user = M ('users');
    	$res=$user -> where("email ='{$email}' AND userpwd='{$userpwd}'") -> select();
    	if ($res) {
            $_SESSION['users'] = $res['0'];
            if($autologin == 'true'){
                setcookie('level',$res['0']['level']);
                setcookie('email',$email,time()+3600*24*7,'/');
                setcookie('userpwd',$userpwd,time()+3600*24*7,'/'); 
            }
    	    $json['res'] = 'exist';
    	}else{
    		$json['res'] = 'noexist';
    	}
    	$verify = new \Think\Verify();

    	 //验证码输入错误 返回true    
    	$rescode=$verify->check($vcode);
    	if ($rescode) {
    	 	$json['vcode'] = 'ok';
    	} else {
    	 	$json['vcode'] = 'nook';
    	}
    	 $data = json_encode($json);
    	 echo $data;
    }

    // 退出
    public function logout () {

        if(!empty($_COOKIE['email']) or !empty($_COOKIE['userpwd'])){
            setcookie('email',null,-3600,'/');
            setcookie('userpwd',null,-3600,'/');
        }

        //清除session
        $_SESSION['users'] = null;

        //清除sessionid cookie
        if(!empty($_COOKIE[session_name()])){
            setcookie(session_name(),null,-3600,'/');
        }
        session_destroy();
        $a = __MODULE__;
        header("Location:$a/Login");
    }
}