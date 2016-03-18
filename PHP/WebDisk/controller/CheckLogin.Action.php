<?php session_start();
/**
 * Created by PhpStorm.
 * User: master
 * Date: 16-3-15
 * Time: 下午9:23
 * ajax表单验证
 */
require_once "../autoload.php";

/**
 * $_SESSION['is_logined']: 1表示已登录
 * $_SESSION['username']: 已登录用户用户名
 * $_SESSION['password']: 已登录用户密码
 * $_SESSION['code']: 正确验证码
 */

if( $_REQUEST['username'] ) { //用户名检查
    $res  = checkUserName( $_REQUEST['username'] );
    if( $res )
        $_SESSION['username']  = $_REQUEST['username'];
    else
        $_SESSION['username'] = null;
    echo $res;
}
else if( $_REQUEST['password'] ) { //密码检查
    if( !$_SESSION['username'] )
        echo 0;
    else {
        $res = checkUserPwd($_SESSION['username'], $_REQUEST['password']);
        if( $res ) $_SESSION['password'] = $_REQUEST['password'];
        echo $res;
    }
}
else if( $_REQUEST['code'] ) {
    if( strtoupper($_REQUEST['code']) == strtoupper($_SESSION['code']) )
        echo 1;
    else
        echo 0;
}