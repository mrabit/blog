<?php
/**
 * Created by PhpStorm.
 * User: yuany
 * Date: 2016/9/13 0013
 * Time: 下午 22:22
 */

namespace Home\Controller;
use Think\Controller;

class UploadController extends Controller
{
    public function index(){
        $this->assign("blog_title","文件上传");
        $this->display();
    }
    public function upload(){
        $this->assign("blog_title","文件上传");
        $this->display();
    }
    public function editor(){
        $this->assign("blog_title","富文本编辑器");
        $this->display();
    }
    public function tagsinput(){
        $this->assign("blog_title","tagsinput");
        $this->display();
    }

    public function  getUpLoad(){
        $image = I("post.image");
        $this->ajaxReturn(base64_upload($image));
    }
}