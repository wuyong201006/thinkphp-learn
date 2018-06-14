<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------

// 应用公共文件

/**
 * 获取十六位随机Id
 */
function getRandomId(){
    $hash = md5(uniqid());
    return substr($hash, 0, 16);
}

function IsJson($data){
    try{
        json_decode($data);
    }catch(Exception $e){
        return false;
    }    
    return (json_last_error() == JSON_ERROR_NONE);
}

/**
 * php时间戳转成Mysql的timestamp
 */
function phpTransformDate($phptime){
    return date("Y-m-d H:i:s", $phptime);
}

/**
 * Mysql的timestamp转成php时间戳
 */
function mysqlTransformDate($mysqldate){
    return strtotime($mysqldate);
}

function tokenValidate(){
    $header = request()->header();
    $data = $header['token'];

    $session = session('token');

    if($data != $session){
        return false;
    }

    return true;
}