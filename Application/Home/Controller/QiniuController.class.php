<?php
/**
 * Created by PhpStorm.
 * User: yuany
 * Date: 2016/10/29 0029
 * Time: 11:43
 */

namespace Home\Controller;
use Home\Entity\Bing;
use Think\Controller;
vendor('qiniu_sdk.autoload');
use Qiniu\Auth;
use Model\Qiniu;
use Think\Upload;
use Qiniu\Storage\BucketManager;

class QiniuController extends Controller
{
    public function index(){
        $this->display();
    }

    public function upload_file(){
        $setting = C('UPLOAD_SITEIMG_QINIU');
        $config = $setting["config"];
        $driver = $setting["driver"];
        $driverConfig = $setting["driverConfig"];

        dump($this->upload($_FILES,$config,$driver,$driverConfig));
    }

    public function upload($files, $config, $driver = 'Qiniu', $driverConfig = null){
        /* 上传文件 */
        $Upload = new Upload($config, $driver, $driverConfig);
        $info  = $Upload->upload($files);
        if($info){ //文件上传成功，记录文件信息
            return $info; //文件上传成功
        } else {
            return $Upload->getError();
        }
    }

    public function qiniuFetch($url = "http://blog.mrabit.com/Uploads/bing/480.2016-11-01.jpg",$name = null){
//        $file = parse_url($url);
//        $basename = pathinfo(parse_url($url)["path"])["basename"];
//        dump($basename);
//        $name = $name != null?$name:uniqid(date("Y-m-d-")).".jpg";
        $name = $name != null?$name:pathinfo(parse_url($url)["path"])["basename"];
        $qiniu = new Qiniu();
        $result = $qiniu->fetch_file_by_url($url,$name);
        $this->ajaxReturn($result);
    }

    function qiniu_base64($post_string) {

        $qiniu = new Qiniu();
        $result = $qiniu->upload_img_by_base64($post_string);
        $this->ajaxReturn($result);

    }

}