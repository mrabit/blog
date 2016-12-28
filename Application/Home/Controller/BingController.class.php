<?php
/**
 * Created by PhpStorm.
 * User: yuany
 * Date: 2016/10/8 0008
 * Time: 23:03
 */

namespace Home\Controller;
use Home\Entity\Bing;
use Model\Qiniu;
use Think\Controller;
header('Access-Control-Allow-Origin: *');

class BingController extends Controller
{
    public function index(){
        $this->assign("blog_title","Bing每日美图");
        $this->display();
    }

    public function add_img($d = '0',$flog = '0',$field = ""){
        $img_time = "";
        if($flog == '1' && $d == '-1'){
            $img_time = "0 days";
        }else{
            $img_time = "-".$d." days";
        }
        $img_time = date('Y-m-d', strtotime($img_time));
        $bing = new Bing();
        //查找数据库是否存在该日期图片
        $result = $bing->get_img_by_time($img_time,$field);
        //数据库存在,输出
//        if($result["code"] == "OK"){
//            return $result;
//        }
        //获取bing该日图片
        $data["idx"] = $d;
        $data["format"] = "js";
        $data["n"] = "1";
        $http_text = get_http_content("http://cn.bing.com/HPImageArchive.aspx",$data,"GET",array("Content-type: text/html; charset=utf-8",'CLIENT-IP:125.71.135.221','X-FORWARDED-FOR:125.71.135.221'));
        //获取bing该日图片失败,输出错误信息(ps:错误信息和查询数据库未找到一样)
        if($http_text == "null"){
            return $result;
        }
        //获取bing该日图片成功,解析
        $http_json = json_decode($http_text,true);
        //获取该日图片url
        $img_real_url = $http_json["images"][0]["url"];
        $img_real_url = strpos($img_real_url,"http://")?$img_real_url:"http://s.cn.bing.net".$img_real_url;
        //获取该日图片简介
        $img_title = $http_json["images"][0]["copyright"];
        //保存该图片到本地
        $qiniu = new Qiniu();
        $img_url_1920 = $qiniu->fetch_file_by_url($img_real_url,"1920.".$img_time.".jpg");

        $img_url_1920 = $qiniu->domain."/".$img_url_1920["result"]["key"];

        $img_url_480 = $qiniu->fetch_file_by_url(str_replace("1920x1080","480x640",$img_real_url),"480.".$img_time.".jpg");

        $img_url_480 = $qiniu->domain."/".$img_url_480["result"]["key"];

        //保存bing该日图片失败,输出错误信息(ps:错误信息和查询数据库未找到一样)
        if($img_url_1920 == null || $img_url_480 == null){
            return $result;
        }
        //保存成功,存入数据库
        $map["img_real_url"] = $img_real_url;
        $map["img_url"] = $img_url_1920;
        $map["img_url_480"] = $img_url_480;
        $map["img_time"] = $img_time;
        $map["img_title"] = $img_title;
        $result = $bing->add_imgInfo($map);
        if($result["code"] == "OK"){
            $result["result"] = $map;
        }
        return $result;
    }

    public function add_imginfo($d = '0',$flog = '0'){
        $result = $this->add_img($d,$flog);
        dump($result);
    }

    public function get_img_totalPage($pageSize = 3){
        $bing = new Bing();
        $result = $bing->get_img_count();
        if($result["code"] == "OK"){
            $result["result"] = ceil($result["result"]/$pageSize);
        }
        $this->ajaxReturn($result);
    }

    public function lists(){
        $param = I("param.");
//        dump($param);
        $bing = new Bing();
        $result = $bing->get_img_lists($param);
        $this->assign("img_lists",$result["result"]);
//        dump($result);
        $this->display();
    }

    public function bing(){
        $bing = new Bing();
        $result = $bing->get_img_by_time(date("Y-m-d"));
        redirect($result["result"]["img_url"]);
    }

    public function get_lists(){
        $param = I("param.");
        $bing = new Bing();
        $result = $bing->get_img_lists($param);
        $this->ajaxReturn($result);
    }

    public function get_smallImg_by_time($d = '0'){
        $img_time = date('Y-m-d', strtotime('-'.$d." day"));
        $bing = new Bing();
        $result = $this->add_img($d,0,"id,img_time,img_url_480,img_title,img_real_url");
        if($result["result"]["img_url_480"] != null){
            $this->ajaxReturn($result);
        }
        $img_url = str_replace("1920x1080","480x640",$result["result"]["img_real_url"]);
        $img_url = get_image_by_url($img_url,"480.".$img_time.".jpg");
        $result = $bing->update_imgUrl_by_time($img_url,$img_time);
        if($result["code"] == "OK"){
            $result = $this->add_img($d,0,"id,img_time,img_url_480,img_title");
        }
        $this->ajaxReturn($result);
    }

    public function get_smallImg_lists(){
        $param = I("param.");
        $param["field"] = "id,img_time,img_url_480,img_title";
        $bing = new Bing();
        $result = $bing->get_img_lists($param);
        $this->ajaxReturn($result);
    }

    public function get_imgInfo_by_time($time){
        $img_time = "";
        if(is_numeric($time)){
            $img_time = date('Y-m-d', strtotime('-'.$time." day"));
        }else{
            $img_time = date('Y-m-d', strtotime($time));
        }
        $bing = new Bing();
        //查找数据库是否存在该日期图片
        $result = $bing->get_img_by_time($img_time,"id,img_time,img_url_480,img_title,img_real_url");
        $this->ajaxReturn($result);
    }

}