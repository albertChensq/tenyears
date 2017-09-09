<?php
/*
*	控制器名：站内信的主控制器
*	功能说明：私信、公共消息的相关处理
*/
namespace Home\Controller;
use Think\Controller;
class EmailController extends Controller {
    public function index(){
        //获取用户ID
        $suid = $ruid = $_SESSION['users']['id'];
        $email = D();

        // 查询发信箱
        $res = $email -> field('users.nickname,users.headpic,sendemails.ruid,sendemails.content,sendemails.posttime,sendemails.id')
                -> table('ten_users users,ten_sendemails sendemails')
                -> where("sendemails.suid = '{$suid}' and sendemails.ruid = users.id ")
                -> order('sendemails.id desc')
                -> select();
        $this -> assign('sendemails',$res);

        // 查询收信箱
        $res1 = $email -> field('users.nickname,users.headpic,revemails.suid,revemails.content,revemails.id,revemails.posttime,revemails.status')
                -> table('ten_users users,ten_revemails revemails')
                -> where("revemails.ruid = '{$suid}' and revemails.suid = users.id")
                -> order('revemails.status=0,revemails.id desc')
                ->select();
        $this -> assign('revemails',$res1);
        $res2 = $email -> field('headpic') -> table('ten_users') ->where("id = '{$suid}'") -> select();
        $this -> assign('headpic',$res2[0]['headpic']);

        // 查询公共信箱
        $res3 = $email -> field('content,posttime') 
        			   -> table('ten_revemails') 
        			   -> where("ruid='{$ruid}'")
        			   -> select();
        foreach ($res3 as  $value) {
        	$data[] = $value['content'];
        	// $data1[] = $value['posttime'];
        }
       	$where['content'] = array('not in',$data);
       	// $where['posttime'] = array('not in',$data1);
        $res4 = $email -> field('content,posttime')
        			   -> table('ten_messages')
        			   -> where($where)
        			   -> select();
        $this->assign('messages',$res4);
        $this -> display();
    }


    // 查询收信昵称是否存在
    public function check(){
        $uid = $_SESSION['users']['id'];
        $nickname = $_POST['nickname'];
        $check = M("users");
        $where['nickname'] = $nickname;
        $res = $check ->field('id') -> where($where) ->select();
        if($res[0]['id'] == $uid ){
            echo 'no';
        }
        if(empty($res)){
            echo 'false';
        }
    }


    // 发送站内信
    public function sendadd(){
        $suid = $_SESSION['users']['id'];
        //用户昵称
        $nickname = $_POST['nickname'];
         // 实例化数据对象
        $email = D();
       
        $where['nickname'] = $nickname;
        $res = $email -> field('id') -> where($where) -> table('ten_users') -> select();
        if(empty($res)){
            echo 'false';
        }else{
            $ruid = $res[0]['id'];
        } 

        $data['posttime'] = time();
        $data['ruid'] = $ruid;
        $data['suid'] = $suid;
        $data['content'] = $_POST['sendcontent'];
        $res = $email -> table('ten_sendemails') -> add($data);
        $res1 = $email -> table('ten_revemails') -> add($data);
        if($res && $res1){
            echo 'true';
        }
    }


    // 收信箱 回复
    public function revadd(){
        // 收信箱收信用户id
        $suid = $_SESSION['users']['id'];
        $ruid = $_POST['id'];
        $email = D();
        $data['posttime'] = time();
        $data['ruid'] = $ruid;
        $data['suid'] = $suid;
        $data['content'] = $_POST['revcontent'];
        $res = $email -> table('ten_sendemails') -> add($data);
        $res1 = $email -> table('ten_revemails') -> add($data);
        if($res && $res1){
            echo 'true';
        }
    }


    // 更改收信箱信息状态标记为已读
    public function modstatus(){
        $id = $_POST['id'];
        $email = M("revemails");
        $where['id'] = $id;
        $email -> status = 1;
        $email -> where($where) -> save();
    }


    // 发件箱信息删除
    public function senddel(){
        // 获取回复id
        $id = $_POST['id'];
        $email = M("sendemails");
        $where['id'] = $id;
        $res = $email -> where($where) -> delete();
        if($res){
            echo 'true';
        }

    }


    // 收信箱信息删除
    public function revdel(){
		// 获取回复id
		$id = $_POST['id'];
		$email = M("revemails");
		$where['id'] = $id;
		$res = $email -> where($where) -> delete();
		if($res){
		    echo 'true';
		}
    }


    // 将系统信息插入到收件箱
    public function messageadd(){
    	// 收信箱收信用户id
    	$ruid = $_SESSION['users']['id'];
    	// 获取系统信息内容
   		$content = $_POST['content']; 	
   		$revemails = M("revemails");
   		$posttime = time();
   		// uid为1是管理员
   		$data['suid'] = 1;
   		$data['content'] = $content;
   		$data['ruid'] = $ruid;
   		$data['posttime'] = $posttime;
   		$res = $revemails -> add($data);
   		if($res){
   			echo 'true';
   		}
    }
}