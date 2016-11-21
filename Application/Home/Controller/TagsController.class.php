<?php
/**
 * Created by PhpStorm.
 * User: yuany
 * Date: 2016/9/29 0029
 * Time: 19:43
 */

namespace Home\Controller;
use Home\Entity\Article_tags;
use Think\Controller;

class TagsController extends Controller
{
    public function index(){
        $article = new Article_tags();
        $tags_arr = $article->get_tags_and_count();
        if($tags_arr["code"] == "OK"){
            $this->assign("tags_arr",$tags_arr["result"]);
        }
        $this->assign("blog_title","标签");
        $this->display();
    }
}