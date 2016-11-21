<?php
/**
 * Created by PhpStorm.
 * User: yuany
 * Date: 2016/9/28 0028
 * Time: 23:41
 */

namespace Home\Entity;

class Article
{
    private $article;
    public function __construct()
    {
        $this->article = M("article");
    }

    public function get_article($param){
        if($param["tags_id"]){
            return $this->get_article_by_tagsId($param);
        }
        $return_mess = mysql_return_mess("查询错误");
        $join = array("as a left join tp_user as u on create_user_id = u.id");
        $result = $this->article
            ->join($join)
            ->order("create_time desc")
            ->limit($param["start"],$param["length"])
            ->field('a.id,title,reprint_url,brief_introduction,u.uname,
                    create_time')
            ->select();
        if($result){
            $return_mess["code"] = "OK";
            $return_mess["message"] = "正常";
            $return_mess["result"] = $result;
        }
//        $return_mess["result"] = $this->article->getLastSql();
        return $return_mess;
    }

    public function get_article_count($param){
        if($param["tags_id"]){
            return $this->get_article_count_by_tagsId($param["tags_id"]);
        }
        $return_mess = mysql_return_mess("查询错误");
        $result = $this->article->count();
        if($result){
            $return_mess["code"] = "OK";
            $return_mess["message"] = "正常";
            $return_mess["result"] = $result;
        }
        return $return_mess;
    }

    public function get_article_by_tagsId($param){
        $return_mess = mysql_return_mess("查询错误");
        $join = array(" as a
                        left join tp_user as u on create_user_id = u.id
                        inner join tp_article_tags as t on t.article_id = a.id");
        $map["tags_id"] = $param["tags_id"];
        $result = $this->article
            ->join($join)
            ->where($map)
            ->limit($param["start"],$param["length"])
            ->order("create_time desc")
            ->field('a.id,title,reprint_url,brief_introduction,u.uname,
                    create_time')
            ->select();
        if($result){
            $return_mess["code"] = "OK";
            $return_mess["message"] = "正常";
            $return_mess["result"] = $result;
        }else{
//            $return_mess["result"] = $this->article->getLastSql();
        }
        return $return_mess;
    }

    public function get_article_count_by_tagsId($tags_id){
        $return_mess = mysql_return_mess("查询错误");
        $join = array(" as a
                        left join tp_user as u on create_user_id = u.id
                        inner join tp_article_tags as t on t.article_id = a.id");
        $map["tags_id"] = $tags_id;
        $result = $this->article
            ->join($join)
            ->where($map)
            ->field('a.id,title,reprint_url,brief_introduction,u.uname,
                    create_time')
            ->count();
        if($result){
            $return_mess["code"] = "OK";
            $return_mess["message"] = "正常";
            $return_mess["result"] = $result;
        }else{
//            $return_mess["result"] = $this->article->getLastSql();
        }
        return $return_mess;
    }

    public function get_article_by_in($param){
        $map[$param["key"]] = array("in",$param["value"]);
        $result = $this->article
            ->field("id,title,create_time")
            ->where($map)
            ->order("create_time desc")
            ->select();
        return $result;
    }

    public function get_article_by_id($id){
        $return_mess = mysql_return_mess("查询错误");
        $join = array("tp_user as u on create_user_id = u.id");
        $map["tp_article.id"] = $id;
        $result = $this->article
            ->join($join)
            ->where($map)
            ->field('title,reprint_url,content,u.uname,
                    FROM_UNIXTIME( create_time, \'%Y-%m-%d %H:%i:%s\' ) as create_time,
                    FROM_UNIXTIME( create_time, \'%m月%d,%Y\' ) as create_time2,
                    FROM_UNIXTIME( modify_time, \'%Y-%m-%d %H:%i:%s\' ) as modify_time')
            ->find();
        if($result){
            $return_mess["code"] = "OK";
            $return_mess["message"] = "正常";
            $return_mess["result"] = $result;
        }
        return $return_mess;
    }

    public function get_article_by_archives(){
        $return_mess = mysql_return_mess("查询错误");
        $result = $this->article
            ->field('create_time,COUNT( * ),GROUP_CONCAT(id) as id')
            ->order("create_time DESC")
            ->group('FROM_UNIXTIME( create_time, "%Y年%m月%日" )')
            ->select();
        if($result){
            $return_mess["code"] = "OK";
            $return_mess["message"] = "正常";
            foreach($result as $k => $v){
                $archives_time = $v["create_time"];
                $aaData = $this->get_article_by_in(array("key"=>"id","value"=>$v["id"]));
                $data_length = count($aaData);
                $return_mess["result"][] = array(
                    "archives_time"=>$archives_time,
                    "data_length"=>$data_length,
                    "aaData"=>$aaData
                    );
            }
        }
        return $return_mess;
    }
}