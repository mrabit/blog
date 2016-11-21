<?php
/**
 * Created by PhpStorm.
 * User: yuany
 * Date: 2016/10/8 0008
 * Time: 23:17
 */

namespace Home\Entity;


class Bing
{
    private $bing;
    public function __construct()
    {
        $this->bing = M("bing");
    }

    public function get_img_lists($param){
        $return_mess = mysql_return_mess("查询错误");
        $result = $this->bing
                ->field($param["field"])
                ->order("img_time desc")
                ->limit($param["start"],$param["length"])
                ->select();
        if($result){
            $return_mess["code"] = "OK";
            $return_mess["message"] = "正常";
            $return_mess["result"] = $result;
        }
        return $return_mess;
//        return $this->bing->getLastSql();
    }

    public function add_imgInfo($param){
        $return_mess = mysql_return_mess("新增".$param["img_time"]."的图片失败");
        $result = $this->bing->add($param);
        if($result){
            $return_mess["code"] = "OK";
            $return_mess["message"] = "正常";
            $return_mess["result"] = $result;
        }
        return $return_mess;
    }

    public function get_img_by_time($time,$field = ""){
        $return_mess = mysql_return_mess("未找到".$time."的图片");
        $map["img_time"] = $time;
        $result = $this->bing
            ->field($field)
            ->where($map)
            ->find();
        if($result){
            $return_mess["code"] = "OK";
            $return_mess["message"] = "正常";
            $return_mess["result"] = $result;
        }
        return $return_mess;
    }

    public function get_img_count(){
        $return_mess = mysql_return_mess("查询错误");
        $result = $this->bing->count();
        if($result){
            $return_mess["code"] = "OK";
            $return_mess["message"] = "正常";
            $return_mess["result"] = $result;
        }
        return $return_mess;
    }

    public function update_imgUrl_by_time($img_url_480,$time){
        $return_mess = mysql_return_mess("查询错误");
        $where["img_time"] = $time;
        $data["img_url_480"] = $img_url_480;
        $result = $this->bing
            ->where($where)
            ->save($data);
        if($result){
            $return_mess["code"] = "OK";
            $return_mess["message"] = "正常";
            $return_mess["result"] = $result;
        }
        return $return_mess;
    }

    public function batch_update($table,$field,$param){
        $return_mess = mysql_return_mess("查询错误");
        $ids = implode(',', array_keys($param));
        $sql = "UPDATE ".$table." SET ".$field." = CASE id ";
        foreach ($param as $id => $ordinal) {
            $sql .= sprintf("WHEN %d THEN '%s' ", $id, $ordinal);
        }
        $sql .= "END WHERE id IN ($ids)";
        $result = $this->bing->query($sql);
        if($result > 0){
            $return_mess["code"] = "OK";
            $return_mess["message"] = "正常";
            $return_mess["result"] = $result;
        }
        return $return_mess;
    }
}