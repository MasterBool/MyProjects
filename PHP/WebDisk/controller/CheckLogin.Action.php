<?php
/**
 * Created by PhpStorm.
 * User: master
 * Date: 16-3-15
 * Time: 下午9:23
 */
require_once "../autoload.php";

/**
 * 1.含有非法字符
 * 2.少于5个字符
 * 3.多于25个字符
 * 4.已被占用
 * 5.有效
 */
$result = $_GET['username'];
if( $result ) {
    $meg = null;
    if( !checkUserNameFormat($result) )
        $msg = 1;
    else if( strlen($result) < 5 )
        $msg = 2;
    else if( strlen($result) > 25 )
        $msg = 3;
    else {
        $sql = "SELECT * FROM User WHERE user_name='{$result}'";
        if( fetchOne($sql) ) $msg = 4;
        else $msg = 5;
    }
    echo $msg;
}


