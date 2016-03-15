<?php

header("content-type:text/html;charset=utf-8");
date_default_timezone_set("PRC");
define('ROOT', dirname(__FILE__));
set_include_path(".".PATH_SEPARATOR.ROOT."/lib".PATH_SEPARATOR.ROOT."/conf".PATH_SEPARATOR.get_include_path());

require_once "config.php";
require_once "Common.Func.php";
require_once "User.Func.php";
require_once "CheckInput.Func.php";
require_once "Mysql.Func.php";


