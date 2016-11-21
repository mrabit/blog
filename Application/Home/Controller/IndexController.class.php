<?php
namespace Home\Controller;
use Home\Entity\Article;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
        $param = I("param.");
        $this->assign("blog_title","首页");
        $this->assign("get",json_encode($param));
        $this-> display();
    }

    public function lists(){
        $param = I("param.");
        $article = new Article();
        $result = $article->get_article($param);
        $this->assign("article_list",$result["result"]);
//        dump($result["result"]);
        $this->display();
    }

    public function details(){
        $id = I("param.id");
        $article = new Article();
        $result = $article->get_article_by_id($id);
        $this->assign("article",$result["result"]);
//        dump($result);
        $this->assign("blog_title",$result["result"]["title"]);
        $this->display();
    }

    public function get_article_totalPage(){
        $param = I("param.");
        $article = new Article();
        $result = $article->get_article_count($param);
        if($result["code"] == "OK"){
            $result["result"] = ceil($result["result"]/$param["pageSize"]);
        }
        $this->ajaxReturn($result);
    }

}