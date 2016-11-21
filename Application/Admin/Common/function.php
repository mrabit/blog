<?php
/**
 * Created by PhpStorm.
 * User: yuany
 * Date: 2016/10/3 0003
 * Time: 20:28
 */
function Is_login(){
    !cookie('aside_item_id')?cookie('aside_item_id2',null):cookie('aside_item_id',null);
    return json_decode(session('userInfo'),true);
}