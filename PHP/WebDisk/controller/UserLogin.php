<?php session_start();
/**
 * Created by PhpStorm.
 * User: master
 * Date: 16-3-16
 * Time: 下午9:28
 */

require_once "../autoload.php";

$username = $_POST['username'];
$password = $_POST['password'];
$code = $_POST['code'];

if( !$code ) {
    if( $_SESSION['password']) {
        $_SESSION['is_logined'] = 1;
        echo 1;
    }
    else
        echo 0;
}
else {
    if( !$_SESSION['password'] )
        echo 0;
    else if( strtoupper($code) != strtoupper($_SESSION['code']) )
        echo 0;
    else {
        $_SESSION['is_logined'] = 1;
        echo 1;
    }
}

