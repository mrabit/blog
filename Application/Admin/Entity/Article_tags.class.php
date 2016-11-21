<?php
/**
 * Created by PhpStorm.
 * User: yuany
 * Date: 2016/9/25 0025
 * Time: 2:37
 */

namespace Admin\Entity;


class Article_tags
{
    private $article_tags;
    public function __construct()
    {
        $this->article_tags = M("article_tags");
    }

    //联合tags表获取所有tags并统计tags数
    public function get_tags_and_count(){
        $return_mess = mysql_return_mess("查询失败");
        $where = array("RIGHT join tp_tags as b on tags_id = b.id ");
        $result = $this->article_tags->join($where)
            ->field('b.id,b.tags_name,count(tags_id) as counts')

            ->group('tags_name')

            ->select();
        if($result){
            $return_mess["code"] = "OK";
            $return_mess["mess"] = "查询成功";
            $return_mess["result"] = $result;
        }
        return $return_mess;
    }

    //tags管理,删除tags时,需删除存在tags的文章内tags
    public function delete_tags_by_tagsId($tags_id){
        $map["tags_id"] = $tags_id;
        $result = $this->article_tags->where($map)->delete();
        return $result;
    }

    //添加文章tags
    public function add_article_tags($article_id,$tags_arr){
        $return_mess = mysql_return_mess("tags添加错误");
        //解析tags,数据库不存在字段需新增
        $tags = new Tags();
        $tags_arr = $tags->inert_into_all($tags_arr);
        if($tags_arr["code"] != "OK"){
            $return_mess["message"] = $tags_arr["message"];
            $return_mess["result"] = $tags_arr["result"];
            return $return_mess;
        }
        $map = "";
        foreach ($tags_arr["result"] as $item) {
            $map[] = array("article_id"=>$article_id,"tags_id"=>$item["id"]);
        }
        $result = $this->article_tags->addAll($map);
        if($result){
            $return_mess["code"] = "OK";
            $return_mess["message"] = "tags添加成功";
        }else{
            $return_mess["result"] = $this->article_tags->getLastSql();
        }
        return $return_mess;
    }

    //通过文章id获取所有tags,需要联合tags表获取tags_name
    public function get_tagsName_by_articleId($article_id){
        $return_mess = mysql_return_mess("查询失败");
        $where = array("tp_tags as t on tp_article_tags.tags_id = t.id",);
        $map[] = array("article_id"=>$article_id);
        $result = $this->article_tags->join($where)
            ->field('t.tags_name')
            ->where($map)
            ->group('tags_name')
            ->select();
        if($result){
            $return_mess["code"] = "OK";
            $return_mess["message"] = "查询成功";
            $return_mess["result"] = $result;
        }else{
        }
//        $return_mess["result"] = $this->article_tags->getLastSql();
        return $return_mess;
    }

    public function delete_tags_by_articleId($id){
        $map["article_id"] = $id;
        $result = $this->article_tags->where($map)->delete();
        return $result;
    }
}