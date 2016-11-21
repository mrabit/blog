<?php
/**
 * Created by PhpStorm.
 * User: 袁源
 * Date: 2016/9/21 0021
 * Time: 19:49
 */

namespace Admin\Controller;
use Admin\Entity\User;
use Think\Controller;


class LoginController extends Controller
{

    public function _initialize(){
        if(ACTION_NAME == "logout"){
            $this->logout();
            die();
        }
        $result = Is_login();
        if(!empty($result)){
            $this->redirect("admin/index/index");
        }else{
            $this->assign("userInfo",$result);
        }
    }

    public function index(){
        $this->assign("blog_title","登录");
        $result = $this->get_user_header_img();
        if($result["code"] == "OK"){
            $this->assign("header_img","/".$result["result"]["header_img"]);
        }else{
            $this->assign("header_img",C("default_img"));
        }
        $this->display();
    }

    public function get_user_header_img($uname = "yuany"){
        $user = new User();
        //获取头像
        $result = $user->get_head_img_by_uname($uname);
        return $result;
    }

    public function login_by_uname(){
        $uname = I("uname");
        $upwd = I("upwd");
        $user = new User();
        //登录
        $result = $user->login($uname,$upwd);
        //登录失败返回
        if($result["code"] != "OK") $this->ajaxReturn($result);
        //更新状态
        $id = $result["result"]["id"];
        $time = time();
        $update_result = $user->update_login_time_by_id($id,$time);
        //更新状态返回
        if($update_result["code"] != "OK") $this->ajaxReturn($update_result);
        //session存值
        $json["id"] = $id;
        $json["uname"] = $uname;
        $json["last_login_time"] = $result["result"]["last_login_time"];
        $json["user_header_img"] = $result["result"]["user_header_img"];
        session('userInfo',json_encode($json));
        //登录成功返回
        $this->ajaxReturn($result);
    }

    public function logout(){
        session('userInfo',null);
        $this->redirect("index/index");
    }
}