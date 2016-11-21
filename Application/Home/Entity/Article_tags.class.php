<?php
/**
 * Created by PhpStorm.
 * User: yuany
 * Date: 2016/9/29 0029
 * Time: 19:48
 */

namespace Home\Entity;

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

}