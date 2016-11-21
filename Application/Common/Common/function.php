<?php
/**
 * Created by PhpStorm.
 * User: yuany
 * Date: 2016/7/15 0015
 * Time: 15:38
 */


function getTitle()
{
    return "一桶浆糊的博客";
}

function getAdminTitle()
{
    return "一桶浆糊的后台管理";
}

function getUserDefaultImg()
{
    return __ROOT__ . "/Public/static/icons/57d9133f0258c.jpg";
}

function iconvStr($content)
{
    return iconv("UTF-8", "utf8mb4", $content) . "1";
}

function dateFormat($time, $format = "m-d H:i")
{
    return date($format, $time);
}

function str2time()
{
    $stamp = strtotime(time());
    return Date('Ynd');
}

/***
 * 查找数据库,返回模版
 * @param string $mess 指定返回的信息
 * @param null $result 指定返回的内容
 * @return mixed 返回的数据,code 状态,message 信息,result 资源
 */
function mysql_return_mess($mess = "错误", $result = null)
{
    $return_mess["code"] = "KO";
    $return_mess["message"] = $mess;
    $return_mess["result"] = $result;
    return $return_mess;
}

function template_multiplication($a)
{
    echo((intval($a) + 1) * intval(3));
}

/***
 * 远程下载bing美图
 * @param string $url 美图地址
 * @param string $filename 保存文件名
 * @return string           存放地址
 */
function get_image_by_url($url, $filename)
{
    $file_paths = "Uploads/bing/";
    $image_paths = $file_paths . $filename;
    try {
        if (!is_readable($file_paths)) {
            is_file($file_paths) or mkdir($file_paths, 0777); //创建文件夹
        }
        if (!is_readable($image_paths)) {
            $http = new \Org\Net\Http();
            $http->curlDownload($url, $image_paths);
        }
        return $image_paths;
    } catch (Exception $e) {
        return null;
    }
}

/***
 * 获取当前页面url
 * @return string 当前页面url
 */
function get_url()
{
    $sys_protocal = isset($_SERVER['SERVER_PORT']) && $_SERVER['SERVER_PORT'] == '443' ? 'https://' : 'http://';
    $php_self = $_SERVER['PHP_SELF'] ? $_SERVER['PHP_SELF'] : $_SERVER['SCRIPT_NAME'];
    $path_info = isset($_SERVER['PATH_INFO']) ? $_SERVER['PATH_INFO'] : '';
    $relate_url = isset($_SERVER['REQUEST_URI']) ? $_SERVER['REQUEST_URI'] : $php_self . (isset($_SERVER['QUERY_STRING']) ? '?' . $_SERVER['QUERY_STRING'] : $path_info);
    return $sys_protocal . (isset($_SERVER['HTTP_HOST']) ? $_SERVER['HTTP_HOST'] : '') . $relate_url;
}

/**
 * base64编码的图片上传到服务器  不是base64编码格式的 将直接返回
 * @param $base64
 * @param string $type
 * @return bool|string
 * @author: 丶陌路灬离殇 <pengqq@chinawiserv.com>
 */
function base64_upload($base64)
{
    $base64_image = str_replace(' ', '+', $base64);
    //post的数据里面，加号会被替换为空格，需要重新替换回来，如果不是post的数据，则注释掉这一行
    if (preg_match('/^(data:\s*image\/(\w+);base64,)/', $base64_image, $result)) {
        //匹配成功
        if ($result[2] == 'jpeg') {
            $image_name = uniqid() . '.jpg';
            //纯粹是看jpeg不爽才替换的
        } else {
            $image_name = uniqid() . '.' . $result[2];
        }
        $file_paths = "Uploads/Picture/" . date('Y-m-d', time());
        $image_files = "Uploads/Picture/" . date('Y-m-d', time()) . "/{$image_name}";
        if (!is_readable($file_paths)) {
            is_file($file_paths) or mkdir($file_paths, 0777); //创建文件夹
        }
        //服务器文件存储路径
        if (file_put_contents($image_files, base64_decode(str_replace($result[1], '', $base64_image)))) {
            return array('path' => "/" . $image_files, 'status' => 0);
        } else {
//            return $image_files;
            return false;
        }
    } else {
        return array('path' => $base64, 'status' => 1);
    }
}

/***
 * 发送HTTP请求方法
 * @param string $url 请求地址
 * @param string $params 请求参数
 * @param string $method 请求方法 GET/POST
 * @param array $header 请求头文件
 * @param bool|false $multi
 * @return mixed            返回数据
 * @throws Exception
 */
function get_http_content($url, $params, $method = 'GET', $header = array("Content-type: text/html; charset=utf-8"), $multi = false)
{
    $opts = array(
        CURLOPT_TIMEOUT => 30,
        CURLOPT_RETURNTRANSFER => 1,
        CURLOPT_SSL_VERIFYPEER => false,
        CURLOPT_SSL_VERIFYHOST => false,
        CURLOPT_HTTPHEADER => $header
    );

    /* 根据请求类型设置特定参数 */
    switch (strtoupper($method)) {
        case 'GET':
            $opts[CURLOPT_URL] = $url . '?' . http_build_query($params);
            break;
        case 'POST':
            //判断是否传输文件
            $params = $multi ? $params : http_build_query($params);
            $opts[CURLOPT_URL] = $url;
            $opts[CURLOPT_POST] = 1;
            $opts[CURLOPT_POSTFIELDS] = $params;
            break;
        default:
            throw new Exception('不支持的请求方式！');
    }

    /* 初始化并执行curl请求 */
    $ch = curl_init();
    curl_setopt_array($ch, $opts);
    $data = curl_exec($ch);
    $error = curl_error($ch);
    curl_close($ch);
    if ($error) throw new Exception('请求发生错误：' . $error);
    return $data;
}

/***
 * 发送HTTP请求方法
 * @param string $url 请求地址
 * @param string $params 请求参数
 * @param string $method 请求方法 GET/POST
 * @param array $header 请求头文件
 * @param bool|false $multi
 * @return mixed            返回数据
 * @throws Exception
 */
function get_http_change_ip($url, $params, $method = 'GET', $header = array("Content-type: text/html; charset=utf-8",'CLIENT-IP:125.71.135.221','X-FORWARDED-FOR:125.71.135.221'), $multi = false)
{
    $opts = array(
        CURLOPT_TIMEOUT => 30,
        CURLOPT_RETURNTRANSFER => 1,
        CURLOPT_SSL_VERIFYPEER => false,
        CURLOPT_SSL_VERIFYHOST => false,
        CURLOPT_HTTPHEADER => $header
    );

    /* 根据请求类型设置特定参数 */
    switch (strtoupper($method)) {
        case 'GET':
            $opts[CURLOPT_URL] = $url . '?' . http_build_query($params);
            break;
        case 'POST':
            //判断是否传输文件
            $params = $multi ? $params : http_build_query($params);
            $opts[CURLOPT_URL] = $url;
            $opts[CURLOPT_POST] = 1;
            $opts[CURLOPT_POSTFIELDS] = $params;
            break;
        default:
            throw new Exception('不支持的请求方式！');
    }

    /* 初始化并执行curl请求 */
    $ch = curl_init();
    curl_setopt_array($ch, $opts);
    $data = curl_exec($ch);
    $error = curl_error($ch);
    curl_close($ch);
    if ($error) throw new Exception('请求发生错误：' . $error);
    return $data;
}