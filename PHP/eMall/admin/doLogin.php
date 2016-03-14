<?php session_start();
header('content-type:text/html; charset=utf-8');
/**
 * Created by PhpStorm.
 * User: master
 * Date: 16-3-13
 * Time: 下午4:44
 */
require_once "../include.php";

$username = $_POST['username'];
$password = md5($_POST['password']);
$vertifyCode = strtoupper($_POST['vertify']);
$correctVertifyCode = strtoupper($_SESSION['vertify']);
$autoAlag = $_POST['autoFlag'];

if($vertifyCode == $correctVertifyCode) {
    $sql = "SELECT id,password FROM Admin WHERE username = '{$username}'";
    $res = fetchOne($sql);

    if( $res == null )
        alertMeg('用户不存在', './login.php');
    else if( $res['password'] != $password )
        alertMeg('密码输入错误!', './login.php');

    if( $autoAlag ) {
        setcookie('adminId', $res['id'], time()+7*24*3600);
        setcookie('adminName', $username, time()+7*24*3600);
    }

    $_SESSION['adminName'] = $username;
    $_SESSION['adminId'] = $res['id'];
    header('location:index.php');
}
else {
    echo "<script>alert('验证码输入错误！');window.location = 'login.php';</script>";
}


//echo $username . "<br>";
//echo $password . "<br>";