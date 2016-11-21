<?php
/**
 * Created by PhpStorm.
 * User: yuany
 * Date: 2016/9/24 0024
 * Time: 3:05
 */

namespace Admin\Entity;


class Tags
{
    private $tags;
    public function __construct()
    {
        $this->tags = M("tags");
    }

    //发布文章使用
    public function get_all_tags($map = array("1"=>"1")){
        $return_mess = mysql_return_mess("tags查询错误");
        $result = $this->tags->where($map)->select();
//        echo $result;
        if($result){
            $return_mess["code"] = "OK";
            $return_mess["message"] = "正常";
            $return_mess["result"] = $result;
        }
        return $return_mess;
    }

    //发布文章,新增tags
    public function inert_into_all($tags_arr = Array()){
        //临时数组,查询使用
        $temp = Array();
        //id非0的数组
        $old_tags = array();
        //id为0,需要批量插入的数组
        $insert_tags = Array();
        //错误返回json
        $return_mess = mysql_return_mess("tags插入数据失败");
        foreach ($tags_arr as $value) {
            if($value["id"] == "0"){
                $temp[] = $value["tags_name"];
                $insert_tags[] = array("tags_name"=>$value["tags_name"]);
            }else{
                $old_tags[] = $value;
            }
        }
        //不存在新插入值
        if(count($insert_tags) <= 0){
            $return_mess["code"] = "OK";
            $return_mess["message"] = "正常";
            $return_mess["result"] = $old_tags;
            return $return_mess;
        }
        //批量插入操作
        if($this->tags->addAll($insert_tags)){
            //批量查询需要转为0,1
            $temp = join("','",$temp);
            $where["tags_name"] = array("exp",'in(\''.$temp.'\')');
            //查询
            $result = $this->get_all_tags($where);
            if($result["code"] == "OK"){
                //新老数组合并
                $data = array_merge($result["result"],$old_tags);
                $return_mess["code"] = "OK";
                $return_mess["message"] = "正常";
                $return_mess["result"] = $data;
            }else{
                $return_mess["message"] = $result["message"];
                $return_mess["result"] = $this->tags->getLastSql();
            }
        }else{
            $return_mess["result"] = $this->tags->getLastSql();
        }
        return $return_mess;
    }

    //tags管理,删除tags
    public function delete_tags_by_id($id){
        $return_mess = mysql_return_mess("删除失败");
        $map["id"] = $id;
        $result = $this->tags->where($map)->delete();
        if($result){
            $article_tags = new Article_tags();
            $article_tags->delete_tags_by_tagsId($id);
            $return_mess["code"] = "OK";
            $return_mess["message"] = "删除成功";
        }
        return $return_mess;
    }
}