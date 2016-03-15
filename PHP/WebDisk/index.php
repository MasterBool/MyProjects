<?php
session_start();
require_once "./autoload.php";
checkLogin('./app/login.php');
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    Hello!
</body>
</html>