<?php
/**
 * Created by PhpStorm.
 * User: master
 * Date: 16-3-14
 * Time: 下午3:57
 */
require_once "../include.php";

$act = $_REQUEST['act'];
switch($act)
{
    case 'logout':
        adminLogout();
        break;
    case 'addAdmin':
        addAdmin($_POST['username'], $_POST['password'], $_POST['email']);
        break;
}