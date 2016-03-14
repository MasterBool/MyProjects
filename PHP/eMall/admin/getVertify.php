<?php session_start();
/**
 * Created by PhpStorm.
 * User: master
 * Date: 16-3-13
 * Time: 下午4:01
 * 获取验证码
 */
require_once '../include.php';
$_SESSION['vertify'] = getCaptcha();