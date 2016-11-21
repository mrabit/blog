<?php
/**
 * Created by PhpStorm.
 * User: yuany
 * Date: 2016/9/13 0013
 * Time: 下午 21:53
 */

namespace Home\Controller;
use Think\Controller;

class PublicController extends Controller
{
    public function top(){
        $this->display();
    }

    public function side(){
        $this->display();
    }

    public function footer(){
        $this->display();
    }
}