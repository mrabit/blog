<?php
/**
 * Created by PhpStorm.
 * User: yuany
 * Date: 2016/9/29 0029
 * Time: 22:02
 */

namespace Home\Controller;
use Home\Entity\Article;
use Think\Controller;

class ArchivesController extends Controller
{
    public function index(){
        $article = new Article();
        $result = $article->get_article_by_archives();
//        dump($result);
        $this->assign("article_list",$result["result"]);
        $this->assign("blog_title","归档");
        $this->display();
    }
}