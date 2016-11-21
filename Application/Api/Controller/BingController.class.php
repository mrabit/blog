<?php
/**
 * Created by PhpStorm.
 * User: yuany
 * Date: 2016/10/14 0014
 * Time: 13:52
 */

namespace Api\Controller;
use Home\Entity\Bing;
use Think\Controller;

class BingController extends Controller
{
    public function index(){
        $bing = new Bing();
        $result = $bing->get_img_by_time(date("Y-m-d"));
        dump($result);
    }
}