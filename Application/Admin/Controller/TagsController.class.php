<?php
/**
 * Created by PhpStorm.
 * User: yuany
 * Date: 2016/9/25 0025
 * Time: 1:40
 */

namespace Admin\Controller;
use Admin\Entity\Tags;
use Think\Controller;
use Admin\Entity\Article_tags;

class TagsController extends Controller
{
    public function _initialize(){
        $result = Is_login();
        if(empty($result)){
            $this->redirect("admin/login/index");
        }else{
            $this->assign("userInfo",$result);
        }
    }

    public function index(){
        $article = new Article_tags();
        $tags_arr = $article->get_tags_and_count();
        if($tags_arr["code"] == "OK"){
            $this->assign("tags_arr",$tags_arr["result"]);
        }
        $this->display();
    }


    public function delete_tags(){
        $param = I("post.");
        $tags = new Tags();
        $result = $tags->delete_tags_by_id($param["id"]);
        $this->ajaxReturn($result);
    }

}