<?php
namespace Admin\Controller;
use Admin\Entity\Article;
use Think\Controller;
class IndexController extends Controller {

    public function _initialize(){
        $result = Is_login();
        if(empty($result)){
            $this->redirect("admin/login/index");
        }else{
            $this->assign("userInfo",$result);
        }
    }

    public function index(){
        $this->display();
    }

    public function get_article_list_by_time(){
        $param = I("param.");
        $article = new Article();
        $result = $article->get_article_by_time($param["time"]);
        $this->ajaxReturn($result);
//        $result =
    }
}