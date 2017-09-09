<?php
namespace Admin\Controller;
use Admin\Controller\AdminController;
class WebController extends AdminController{

	// 后台首页
	public function index(){

		//查询会员数
    	$users = M('users');
    	$usercount = $users -> count();
    	$this -> assign('usercount',$usercount);

    	//查询梦想数
    	$dreams = M('dreams');
    	$dreamscount = $dreams -> count();
    	$this -> assign('dreamscount',$dreamscount);

    	//查询p想法数
    	$dmideas = M('dmideas');
    	$dmideascount = $dmideas -> count();
    	$this -> assign('dmideascount',$dmideascount);

    	//照片数
    	$dmpics = M('dmpics');
    	$dmpicscount = $dmpics -> count();
    	$this -> assign('dmpicscount',$dmpicscount);
    	$this -> display();


	}
    
	//网站配置页面
    public function webconf(){

    	//实例化web对象
    	$web = M('web');

    	// 查询web数据表
    	$res = $web -> where("id=1") -> find();

    	//把模版变量赋值
    	$this -> assign('web',$res);
    	if ($res['isopen'] == 1 ) {
    		$this -> assign('open','selected');
    	} else {
    		$this -> assign('close','selected');
    	}
        $this->display();
    }

 	//网站配置修改
 	public function update(){

        $users = M('web');
        $res = $users-> where("id=1") -> save($_POST);
        if($res){
            $this->success('修改成功',U('Web/webconf'),0);
        }else{
            $this->error('修改失败',U('Web/webconf'),0);
        }
     
    }	
}