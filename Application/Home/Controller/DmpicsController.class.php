<?php
/**
*   控制器名：图片控制器
*   功能说明：图片的发布、查询、删除
*/

namespace Home\Controller;
use Think\Controller;
class DmpicsController extends Controller {
    public function index(){

        $this -> display();
    }


    // 图片添加，上传图片，获取图片名称及所属梦想id。
    public function add () {
    	 $_POST['posttime'] = time();
        //实例化dmpics表
        $dmpics = M('dmpics');
        //创建数据
        $dmpics -> create();
        //添加数据
        $res = $dmpics -> add();

        // 响应ajax，数据添加成功返回true,失败返回false
        if($res){
            echo 'true';      
        }else{
            echo 'false';
        }
    }


    // 图片上传方法
    public function upload(){
        $config = array(   
                'maxSize'    =>    3145728, 
                'rootPath'   =>    'Public',
                'savePath'   =>    '/static/uploads/',  
                'saveName'   =>    array('uniqid',''), 
                'exts'       =>    array('jpg', 'gif', 'png', 'jpeg'),  
                'autoSub'    =>    false,   
                'subName'    =>    array('date','Ymd'),
            );

        // 实例化上传类
        $upload = new \Think\Upload($config);
        $images = $upload->uploadOne($_FILES['postpic']);

        //判断是否有图
        if($images){      
            $picname = $images['savename'];

            // 调用父级窗口图片预览函数
            echo "<script type='text/javascript'>window.parent.uploadcallback('".$picname."')</script>";
        }
        else{
            //获取失败信息
            $this->error($upload->getError());
        }
    }


    // 取消发布时删除已上传图片
    function cancelpic(){
        $picname = $_POST['picname'];
        $picpath = $_SERVER['DOCUMENT_ROOT']."/tenyears/public/static/uploads/".$picname;
        unlink($picpath);
    }


    // 动态页面图片查询
    public function wallsec(){

        // 查询当前登录用户关注的人
        $follow = M("follow");
        $followlist = $follow -> field("followed") -> where("followers='{$_SESSION["users"]["id"]}'") -> select();
        foreach ($followlist as $value) {
            $flist[] = $value["followed"];
        }
        $fstr = implode(',', $flist);
        $offset = $_POST['offset'];

        // 查询关注的人的图片动态
        $Momel = D();
        $res = $Momel -> field("users.nickname,users.headpic,pics.id,pics.uid,pics.posttime,pics.admirenum,pics.content,pics.pic,dreams.title")
                ->table("ten_dmpics pics,ten_users users,ten_dreams dreams")
                ->where("users.id = pics.uid and pics.did = dreams.id and users.id in ({$fstr})")
                ->limit($offset,10)
                ->order("pics.id desc")
                ->select();

        // 查询回复次数，重组结果集
        foreach ($res as &$value) {
            $reply = M("piccomments");
            $num = $reply -> where("{$value['id']} = ten_piccomments.pid") -> count();
            $value['replynum'] = $num;
        }

        if($res){
            $dreamlist = json_encode($res);

            // 输出json格式结果集供ajax遍历
            echo $dreamlist;
        }else{
            echo false;
        }
    }


    // 发现页面图片查询
    public function findsec(){
        
        // 查询最新图片
        $Momel = D();
        $offset = $_POST['offset'];
        $tagid = $_POST['tagid'];

        // 如果tagid为0，查询所有，否则查出对应tagname
        if($tagid == 0){
            $tagname = '';
        }else{
            $tag = M("tags");
            $res = $tag -> where("id = '{$tagid}'") -> find();
            $tagname = $res['tagname'];
        }

        $res = $Momel -> field("users.nickname,users.headpic,pics.id,pics.uid,pics.posttime,pics.admirenum,pics.content,pics.pic,dreams.title")
                ->table("ten_dmpics pics,ten_users users,ten_dreams dreams")
                ->where("users.id = pics.uid and pics.did = dreams.id and pics.content like '%{$tagname}%'")
                ->limit($offset,10)
                ->order("pics.id desc")
                ->select();

        // 查询回复次数，重组结果集
        foreach ($res as &$value) {
            $reply = M("piccomments");
            $num = $reply -> where("{$value['id']} = ten_piccomments.pid") -> count();
            $value['replynum'] = $num;
        }

        if($res){
            $dreamlist = json_encode($res);

            // 输出json格式结果集供ajax遍历
            echo $dreamlist;
        }else{
            echo false;
        }
    }

    // 图片删除
    public function del(){
    	$id = $_POST['id'];
		//删除图片下面的评论
		$piccomments= M('piccomments');
		//删除评论
		$piccomments -> where("pid = {$id}") -> delete();
		//删除图片
		$dmpics = M('dmpics');
        $picinfo = $dmpics -> field("pic") -> where("id='{$id}'") -> find();
        $picname = $picinfo['pic'];
        // 删除本地照图片
        $picpath = $_SERVER['DOCUMENT_ROOT']."/tenyears/public/static/uploads/".$picname;
        unlink($picpath);

        // 删除记录
		$res = $dmpics -> where("id = {$id}") -> delete();
		if($res){
			echo "true";
		}else{
			echo "false";
		}
        
    }	
}