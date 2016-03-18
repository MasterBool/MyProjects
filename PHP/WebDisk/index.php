<?php session_start();
if( !$_SESSION['is_logined'] ) header('location: ./app/login.php');
?>

<!DOCTYPE html>
<html>
<head>
    <title>Bootstrap 实例 - 默认的导航栏</title>
    <link href="./app/css/bs.css" rel="stylesheet">
    <link rel="stylesheet" href="./app/css/index.css">
</head>
<body>

<nav class="navbar navbar-default" role="navigation">
    <div class="navbar-header">
        <a class="navbar-brand" href="#">WebDisk</a>
    </div>
    <div>
        <ul class="nav navbar-nav" id="login">
            <li><a href="#">欢迎你，<?php
                    echo $_SESSION['username'];
                    ?></a></li>
            <li><a href="./controller/Exit.php">退出</a></li>
        </ul>
    </div>
</nav>


<div id="main">

    <button class="btn btn-primary" id="download">下载</button>
    <button class="btn btn-primary" id="upload">上传</button>


    <div class="file">
        <input type="checkbox">
        <span></span>
    </div>
</div>


<script src="./app/js/jquery.min.js"></script>
<script src="./app/js/bootstrap.min.js"></script>
<script src="./app/js/index.js" type="text/javascript"></script>
</body>
</html>