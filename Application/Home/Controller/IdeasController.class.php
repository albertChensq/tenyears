<?php
/**
*   控制器名：想法控制器
*   功能说明：想法的发布、查询、修改
*/

namespace Home\Controller;
use Think\Controller;
class IdeasController extends Controller {
    public function index(){
        $this -> display();
    }

   
    // 想法添加
    public function add(){
        $_POST["posttime"] = time();
        $idea = M("dmideas");
        $idea -> create();
        $res = $idea -> add();
        if($res){
            echo "ok";
        }else{
            return;
        }
    }


    // 动态页面想法查询
    public function wallsec(){
        // 查询当前登录用户关注的人
        $follow = M("follow");
        $followlist = $follow -> field("followed") -> where("followers='{$_SESSION["users"]["id"]}'") -> select();
        foreach ($followlist as $value) {
            $flist[] = $value["followed"];
        }
        $fstr = implode(',', $flist);
        $offset = $_POST['offset'];

        // 查询关注的人的动态
        $Momel = D();
        $res = $Momel -> field("users.nickname,users.headpic,ideas.id,ideas.uid,ideas.posttime,ideas.admirenum,ideas.content,dreams.title")
                ->table("ten_dmideas ideas,ten_users users,ten_dreams dreams")
                ->where("users.id = ideas.uid and ideas.did = dreams.id and users.id in ({$fstr})")
                ->limit($offset,10)
                ->order("ideas.id desc")
                ->select();

        // 查询回复次数
        foreach ($res as &$value) {
            $reply = M("ideacomments");
            $num = $reply -> where("{$value['id']} = ten_ideacomments.iid") -> count();
            $value['replynum'] = $num;
        }

        if($res){
            $dreamlist = json_encode($res);
            echo $dreamlist;
        }else{
            echo false;
        }
    }


    // 发现页面想法查询
    public function findsec(){

        // 查询最新想法
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

        $res = $Momel -> field("users.nickname,users.headpic,ideas.id,ideas.uid,ideas.posttime,ideas.admirenum,ideas.content,dreams.title")
                ->table("ten_dmideas ideas,ten_users users,ten_dreams dreams")
                ->where("users.id = ideas.uid and ideas.did = dreams.id and ideas.content like '%{$tagname}%'")
                ->limit($offset,10)
                ->order("ideas.id desc")
                ->select();

        // 查询回复次数
        foreach ($res as &$value) {
            $reply = M("ideacomments");
            $num = $reply -> where("{$value['id']} = ten_ideacomments.iid") -> count();
            $value['replynum'] = $num;
        }

        if($res){
            $dreamlist = json_encode($res);
            echo $dreamlist;
        }else{
            echo false;
        }
    }



    // 想法删除
    public function del(){
        $id = $_POST['id'];
        // 删除想法的评论
        $ideacomments = M("ideacomments");
        $ideacomments -> where("iid='{$id}'") -> delete();
        
        $idea = M("dmideas");
        $res = $idea -> where("id='{$id}'") -> delete();
        if($res){
            echo "ok";
        }else{
            return;
        }
    }

}