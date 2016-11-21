<?php
/**
 * Created by PhpStorm.
 * User: yuany
 * Date: 2016/9/17 0017
 * Time: 下午 17:51
 */

namespace Api\Controller;
use Think\Controller;

class WeatherController extends  Controller
{
    public function index(){
        $area = $_GET["area"];
        $ch = curl_init();
        $url = 'http://apis.baidu.com/tianyiweather/basicforecast/weatherapi?area='.$area;
        $header = array(
            "apikey: cf6f8890b0c877ceb9a7411cc1afe7f9",
        );
        // 添加apikey到header
        curl_setopt($ch, CURLOPT_HTTPHEADER  , $header);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        // 执行HTTP请求
        curl_setopt($ch , CURLOPT_URL , $url);
        $res = curl_exec($ch);
        echo ($res);
    }
    
    public function get_weather($area = "101270106"){
//        $area = I("area");
        $ch = curl_init();
        $url = 'http://apis.baidu.com/apistore/weatherservice/cityid?cityid='.$area;
        $header = array(
            'apikey: 2c47fde43fdc68a4d1130ec07cf8d889',
        );
        // 添加apikey到header
        curl_setopt($ch, CURLOPT_HTTPHEADER  , $header);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        // 执行HTTP请求
        curl_setopt($ch , CURLOPT_URL , $url);
        $res = curl_exec($ch);
        echo $res;
    }

}