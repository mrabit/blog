<?php
/**
 * Created by PhpStorm.
 * User: yuany
 * Date: 2016/9/24 0024
 * Time: 23:25
 */

namespace Admin\Entity;
class Article
{
    private $article;
    public function __construct()
    {
        $this->article = M("article");
    }

    public function insert_article($article = array()){
        $return_mess = mysql_return_mess("发布文章失败");
        //数据库字段:title
        $map["title"] = $article["title"];
        //数据库字段:brief_introduction
        $map["brief_introduction"] = $article["brief_introduction"];
        //数据库字段:content
        $map["content"] = $article["content"];
        //数据库字段:reprint_url
        $map["reprint_url"] = $article["reprint_url"];
        //session获取当前登录用户ID
        $user_session = json_decode(session('userInfo'),true);
        //数据库字段:create_user_id
        $map["create_user_id"] = $user_session["id"];
        //数据库字段:create_time
        $map["create_time"] = time();
        //插入数据库
        $result = $this->article->add($map);
        if($result){
            if($article["tags"] != ""){
                $article_tags = new Article_tags();
                $result_tags = $article_tags->add_article_tags($result,$article["tags"]);
                if($result_tags["code"] != "OK"){
                    $return_mess["result"] = $result_tags["result"];
                    return $return_mess;
                }
            }
            $return_mess["code"] = "OK";
            $return_mess["message"] = "文章发布成功~";
            $return_mess["result"] = "";
        }else{
            $return_mess["result"] = $this->article->getLastSql();
        }
        return $return_mess;
    }

    public function get_article_by_id($id){
        $return_mess = mysql_return_mess("查询错误");
        $article_tags = new Article_tags();
        $result = $article_tags->get_tagsName_by_articleId($id);
        $tags_str = "";
        if($result["code"] == "OK"){
            foreach($result["result"] as $v){
                $tags_str = $tags_str.$v["tags_name"].",";
            }
            $tags_str = substr($tags_str,0,strlen($tags_str)-1);
        }
        $map["id"] = $id;
        $result = $this->article->where($map)->find();
        if($result){
            $result["tags"] = $tags_str;
            $return_mess["code"] = "OK";
            $return_mess["message"] = "正常";
            $return_mess["result"] = $result;
        }
        return $return_mess;
    }

    public function get_article_count($param){
        $map["id"] = array("like","%".$param["search"]["value"]."%");
        $map["title"] = array("like","%".$param["search"]["value"]."%");
        $map["brief_introduction"] = array("like","%".$param["search"]["value"]."%");
        $map['_logic'] = 'OR';
        return $this->article->where($map)->count();
    }

    public function get_article($param){
        $return_mess = mysql_return_mess("查询错误");
        if($param["time"]){
            return $this->get_article_by_time($param);
        }
        $key = "";
        if($param["order"]){
            $num = $param["order"]["0"]["column"];
            $key = $param["columns"][$num]["data"]." ".$param["order"]["0"]["dir"];
        }
        $map["id"] = array("like","%".$param["search"]["value"]."%");
        $map["title"] = array("like","%".$param["search"]["value"]."%");
        $map["brief_introduction"] = array("like","%".$param["search"]["value"]."%");
        $map['_logic'] = 'OR';
        $field = array(
            "id",
            "title",
            "brief_introduction",
            "if(IFNULL(reprint_url,true),'否','是')"=>"is_reprint",
            "FROM_UNIXTIME( create_time, '%Y-%m-%d %H:%i:%s' )"=>"create_time",
            );
        $result = $this->article
            ->where($map)
            ->order($key)
            ->field($field)
            ->limit($param["start"],$param["length"])
            ->select();
        if($result){
            $return_mess["code"] = "OK";
            $return_mess["message"] = "正常";
            $return_mess["result"] = $result;
        }
        return $return_mess;
    }

    public function get_article_by_time($time = ""){
//        UNIX_TIMESTAMP(date_sub(now(),interval 7 DAY))
        $return_mess = mysql_return_mess("查询错误");
//        $map["create_time"] = "create_time >= ".strtotime($time);
        $map["create_time"] = array("EGT",$time);
        $result = $this->article
            ->join("as a LEFT JOIN tp_user as u on u.id = a.create_user_id")
            ->where($map)
            ->field("a.id,a.title,u.uname,a.create_time")
            ->order("create_time DESC")
            ->select();
        if($result){
            $return_mess["code"] = "OK";
            $return_mess["message"] = "正常";
            $return_mess["result"] = array("length"=>count($result),"aaData"=>$result);
            ;
        }
//        $return_mess["result"] = $this->article->getLastSql();
        return $return_mess;
    }

    public function delete_article_by_id($id){
        $return_mess = mysql_return_mess("删除失败");
        $map["id"] = $id;
        $result = $this->article->where($map)->delete();
        if($result){
            $article_tags = new Article_tags();
            $article_tags->delete_tags_by_articleId($id);
            $return_mess["code"] = "OK";
            $return_mess["message"] = "正常";
            $return_mess["result"] = $result;
        }
        return $return_mess;
    }
}