<?php session_start();
/**
 * Created by PhpStorm.
 * User: master
 * Date: 16-3-13
 * Time: 下午4:13
 */
header("content-type:text/html;charset=utf-8");
date_default_timezone_set("PRC");
define('ROOT', dirname(__FILE__));
set_include_path(".".PATH_SEPARATOR.ROOT."/lib".PATH_SEPARATOR.ROOT."/core".PATH_SEPARATOR.ROOT."/configs".PATH_SEPARATOR.get_include_path());

require_once 'image.func.php';
require_once 'config.php';
require_once 'mysql.func.php';
require_once 'admin.inc.php';
require_once 'common.func.php';
//require_once 'string.func.php';
//require_once 'page.func.php';