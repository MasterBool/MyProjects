<?php session_start();
/**
 * Created by PhpStorm.
 * User: master
 * Date: 16-3-13
 * Time: 下午4:35
 * 获取验证码
 */

require_once "../autoload.php";
$_SESSION['code'] = getCaptcha();
