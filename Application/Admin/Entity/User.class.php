<?php
/**
 * Created by PhpStorm.
 * User: yuany
 * Date: 2016/9/21 0021
 * Time: 20:10
 */

namespace Admin\Entity;

class User
{
    private $user;

    public function __construct()
    {
        $this->user = M("user");
    }

    public function get_head_img_by_uname($uname){
        $map["uname"] = $uname;
        $result = $this->user->where($map)->getField("user_header_img");
        $return_mess = mysql_return_mess("查询错误");
        if($result){
            $return_mess["code"] = "OK";
            $return_mess["message"] = "查询成功";
            $return_mess["result"]["header_img"] = $result;
        }
        return $return_mess;
    }

    public function login($uname,$upwd){
        $map["uname"] = $uname;
        $map["upwd"] = md5($upwd);
        $return_mess = mysql_return_mess("密码错误,请重试");
        $result = $this->user->where($map)->find();
        if($result){
            $return_mess["code"] = "OK";
            $return_mess["message"] = "登录成功,请稍候...";
            $return_mess["result"] = $result;
        }
        return $return_mess;
    }

    public function update_login_time_by_id($id,$time = "0"){
        $map["id"] = $id;
        $arr["last_login_time"] = $time;
        $arr["last_login_ip"] = get_client_ip();
        $return_mess = mysql_return_mess("登录失败");
        $result = $this->user->where($map)->save($arr);
        if($result){
            $return_mess["code"] = "OK";
            $return_mess["message"] = "状态更新成功";
        }
        return $return_mess;
//        return $this->user->getLastSql();
    }

    public function register(){
        $map["uname"] = "yuany";

        /***
         * 帐号是否存在
         */
        $return_mess = mysql_return_mess("新增失败");
        if($this->user->where($map)->count() >= 1){
            $return_mess["message"] = "帐号已存在";
            dump($return_mess);
            die();
        }

        /***
         * 插入数据
         */
        $data["uname"] = "yuany";
        $data["upwd"] = md5("admin");
        $data["user_header_img"] = "Public/static/icons/57d9133f0258c.jpg";
        $data["last_login_ip"]  = get_client_ip();
        $data["last_login_time"] = time();
        $result =  $this->user->add($data);
        /***
         * 判断并返回结果
         */
        if($result){
            $data["id"] = $result;
            $return_mess["code"] = "OK";
            $return_mess["message"] = "新增成功";
            $return_mess["result"] = $data;
        }
        return $return_mess;
    }
}