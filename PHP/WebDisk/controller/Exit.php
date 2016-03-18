<?php session_start();
/**
 * Created by PhpStorm.
 * User: master
 * Date: 16-3-17
 * Time: 下午9:00
 */
session_destroy();
header('location: ../app/login.php');
