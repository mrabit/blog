<?php
/**
 * Created by PhpStorm.
 * User: yuany
 * Date: 2016/9/17 0017
 * Time: 上午 4:21
 */

namespace Admin\Controller;
use Think\Controller;

class PublicController extends Controller
{
    public function top(){
        $this->display();
    }

    public function footer(){
        $this->display();
    }

    public function side(){
        $this->display();
    }

    public function swal_upload(){
        $this->display();
    }
}