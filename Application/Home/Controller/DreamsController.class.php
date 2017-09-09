<?php
/**
*   控制器名：梦想控制器
*   功能说明：梦想的添加、删除、查询
*/
namespace Home\Controller;
use Think\Controller;
class DreamsController extends Controller {
    
    //添加梦想
    public function add(){
        $_POST['posttime'] = time();
        $_POST['uid'] = $_SESSION['users']['id'];
        $_POST['deadline'] = strtotime($_POST['deadline']);
        $titlepic = date('YmdHis').rand(100,999).'.jpg';
        $_POST['dmpic'] = $titlepic;
        $dtitle = $_POST['title'];
        
        // 生成图片标题
        $image = new \Think\Image();
        $image->open('./public/static/img/title.png') -> text("$dtitle",'./public/static/img/microhei.ttc',60,'#FFFFFF',\Think\Image::IMAGE_WATER_CENTER) -> save("./public/static/uploads/".$titlepic);

        //实例化dreams表
        $dreams = M('dreams');
        //创建数据
        $dreams -> create();
        //添加数据
        $res = $dreams -> add();
        //数据添加成功返回true,失败返回error
        if($res){
            echo 'ok';      
        }else{
            echo 'error';
        }
    }

    
    // 动态梦想查询(用于动态页面)
    public function wallsec(){
        
        // 查询当前登录用户关注的人
        $follow = M("follow");
        $followlist = $follow -> field("followed") -> where("followers='{$_SESSION["users"]["id"]}'") -> select();
        foreach ($followlist as $value) {
            $flist[] = $value["followed"];
        }
        $fstr = implode(',', $flist);
        
        // 查询关注的人的动态
        $Momel = D();
        $offset = $_POST['offset'];
        $res = $Momel -> field("users.nickname,users.headpic,dreams.id,dreams.uid,dreams.posttime,dreams.admirenum,dreams.title,dreams.dmdesc,dreams.deadline")
                ->table("ten_dreams dreams,ten_users users")
                ->where("users.id = dreams.uid and users.id in ({$fstr})")
                ->limit($offset,10)
                ->order("dreams.id desc")
                ->select();

        // 查询回复次数
        foreach ($res as &$value) {
            $reply = M("dmcomments");
            $num = $reply -> where("{$value['id']} = ten_dmcomments.did") -> count();
            $value['replynum'] = $num;
        }

        if($res){
            $dreamlist = json_encode($res);
            echo $dreamlist;
        }else{
            echo false;
        }
    }


    // 发现页面梦想查询
    public function findsec(){
        
        // 查询最新梦想
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

        $res = $Momel -> field("users.nickname,users.headpic,dreams.id,dreams.uid,dreams.posttime,dreams.admirenum,dreams.title,dreams.dmdesc,dreams.deadline")
                ->table("ten_dreams dreams,ten_users users")
                ->where("users.id = dreams.uid and dreams.dmdesc like '%{$tagname}%'")
                ->limit($offset,10)
                ->order("dreams.id desc")
                ->select();

        // 查询回复次数
        foreach ($res as &$value) {
            $reply = M("dmcomments");
            $num = $reply -> where("{$value['id']} = ten_dmcomments.did") -> count();
            $value['replynum'] = $num;
        }

        if($res){
            $dreamlist = json_encode($res);
            echo $dreamlist;
        }else{
            echo false;
        }
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
       
        
        // 删除想法下的评论操作   
        
        //将查的结果集作为删除ideacomments的删除条件
        $res = $dreams -> field('id') -> table('ten_dmideas') -> where($where2)->select();

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

        
        //删除照片下的评论操作
        
        //将查的结果集作为删除piccomments的删除条件
        $res3 = $dreams -> field('id') -> table('ten_dmpics') -> where($where2)->select();
        //重组数组
        dump($res3);
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
        echo 'true';
     }	
     
}