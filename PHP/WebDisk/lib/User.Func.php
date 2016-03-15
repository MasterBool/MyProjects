<?php session_start();
/**
 * Created by PhpStorm.
 * User: master
 * Date: 16-3-15
 * Time: 下午5:04
 */
//require_once "../autoload.php";

function checkLogin($url='login.php') {
    if( !$_COOKIE['log_status'] && !$_SESSION['log_status'] )
        alertMeg('先登陆!',$url);
}