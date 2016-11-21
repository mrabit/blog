<?php
/**
 * Created by PhpStorm.
 * User: yuany
 * Date: 2016/10/29 0029
 * Time: 18:06
 */

namespace Model;
vendor('qiniu_sdk.autoload');
use Qiniu\Auth;
use Think\Model;
use Qiniu\Storage\BucketManager;

class Qiniu extends Model
{
    private $auth;
    private $setting;
    private $driverConfig;
    private $bucket;
    private $accessKey;
    private $secretKey;
    public $domain;
    public function __construct()
    {
        $this->setting = C("UPLOAD_SITEIMG_QINIU");
        $this->driverConfig = $this->setting["driverConfig"];
        $this->bucket = $this->driverConfig["bucket"];
        $this->accessKey = $this->driverConfig["accessKey"];
        $this->secretKey = $this->driverConfig["secretKey"];
        $this->domain = $this->driverConfig["domain"];
        $this->auth = new Auth($this->accessKey,$this->secretKey);
    }

    public function fetch_file_by_url($url,$name){
        if(!$name) $name = uniqid(date("Y-m-d.")).pathinfo(parse_url($url)["path"])["basename"];
        $encodedURL = $this->base64_urlSafeEncode($url);
        $encodedEntryURI = $this->base64_urlSafeEncode($this->bucket.":".$name);
        $url = '/fetch/' . $encodedURL . '/to/' . $encodedEntryURI;
        $sign = hash_hmac('sha1', $url . "\n", $this->secretKey, true);
        $token = $this->accessKey . ':' . $this->base64_urlSafeEncode($sign);
        $header = array('Host: iovip.qbox.me', 'Content-Type:application/x-www-form-urlencoded', 'Authorization: QBox ' . $token);
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, trim('http://iovip.qbox.me' . $url, '\n'));
        curl_setopt($curl, CURLOPT_HTTPHEADER, $header);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, "");
        $result = json_decode(curl_exec($curl), true);
        $result["code"] = curl_getinfo($curl,CURLINFO_HTTP_CODE);
        curl_close($curl);
        $return_mess = array(
            "code" => "OK",
            "messgae" => "正常",
            "result" => $result
        );
        if($result == null || $result == "" || $result["error"]){
            $return_mess["code"] = "KO";
            $return_mess["messgae"] = "上传失败";
        }
        return $return_mess;
    }

    public function upload_img_by_base64($base64_string){
        $remote_server = "http://upload.qiniu.com/putb64/-1";
        $upToken = $this->auth->uploadToken($this->bucket);
        $EncodedKey = $this->base64_urlSafeEncode(uniqid(date("Y-m-d.")).".jpg");
        $remote_server = $remote_server."/key/".$EncodedKey;
//            str_replace(array('+', '/'), array('-', '_'), base64_encode(uniqid().".jpg"))
        $headers = array();
        $headers[] = 'Content-Type:image/jpg';
        $headers[] = 'Authorization:UpToken '.$upToken;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,$remote_server);
        curl_setopt($ch, CURLOPT_HTTPHEADER ,$headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $base64_string);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
        curl_setopt($ch, CURLOPT_TIMEOUT, 30);
        $result = json_decode(curl_exec($ch),true);
        curl_close($ch);
        $return_mess = array(
            "code" => "OK",
            "messgae" => "正常",
            "result" => $result
        );
        if($result == null || $result == "" || $result["error"]){
            $return_mess["code"] = "KO";
            $return_mess["messgae"] = "上传失败";
        }
        return $return_mess;
    }

    function rename_file($oldname,$newname){
        if(!$oldname) return false;
        $bucketMgr = new BucketManager($this->auth);
        return $bucketMgr->rename($this->bucket,$oldname,$newname);
    }

    function base64_urlSafeEncode($url){
        $url = str_replace(array('+', '/'), array('-', '_'), base64_encode($url));
        return $url;
    }
}