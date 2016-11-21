<?php
/**
 * Created by PhpStorm.
 * User: yuany
 * Date: 2016/9/22 0022
 * Time: 21:41
 */

namespace Admin\Controller;
use Admin\Entity\Article;
use Admin\Entity\Tags;
use Think\Controller;

class ArticleController extends Controller
{
    public function _initialize(){
        $result = Is_login();
        if(empty($result)){
            $this->redirect("admin/login/index");
        }else{
            $this->assign("userInfo",$result);
        }
    }

    public function add(){
        $this->assign("blog_title","发布文章");
        $result = $this->get_all_tags();
        $this->assign("select_group",$result["result"]);
        $this->display();
    }

    public function lists(){
        $this->assign("blog_title","文章管理");
        $this->display();
    }

    public function insert_article(){
        $article_arr = I('post.',false);
        $article = new Article();
        $result = $article->insert_article($article_arr);
        $this->ajaxReturn($result);
    }

    public function get_all_tags(){
        $tags = new Tags();
        $result = $tags->get_all_tags();
        return $result;
    }

    public function get_article_details(){
        $param = I("param.");
        $article = new Article();
        $result = $article->get_article_by_id($param["id"]);
        dump($result);
    }

    public function get_article_list(){
        $param = I("param.");
        $article = new Article();
        $result = $article->get_article($param);

        $result["draw"] = $param["draw"] + 1;
        $result["iTotalDisplayRecords"] = $article->get_article_count($param);
        $result["iTotalRecords"] = $result["iTotalDisplayRecords"];
        $this->ajaxReturn($result);
    }

    public function delete_article(){
        $id = I("param.id");
        $article = new Article();
        $result = $article->delete_article_by_id($id);
        $this->ajaxReturn($result);
    }

}