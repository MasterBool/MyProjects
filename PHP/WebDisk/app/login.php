<?php session_start();
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>登录</title>
    <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/login.css">
    <style>
        @font-face {
            font-family: 'Glyphicons Halflings';
            src: url('./fonts/glyphicons-halflings-regular.eot'); /* IE9 Compat Modes */
            src: url('./fonts/glyphicons-halflings-regular.eot?#iefix') format('embedded-opentype'), /* IE6-IE8 */
            url('./fonts/glyphicons-halflings-regular.woff') format('woff'), /* Modern Browsers */
            url('./fonts/glyphicons-halflings-regular.ttf')  format('truetype'), /* Safari, Android, iOS */
            url('./fonts/glyphicons-halflings-regular.svg#YourWebFontName') format('svg'); /* Legacy iOS */
        }
    </style>
</head>

<body>

<h3>WebDisk用户登录</h3>

<form role="form">
    <div class="form-group has-feedback" id="username-div">
        <label class="control-label" for="username">&nbsp;</label>
        <input type="text" class="form-control" id="username" placeholder="用户名">
        <span class="help-block" id="username-hint"></span>
        <span class="glyphicon form-control-feedback" id="username-iconhint"></span>
    </div>


    <div class="form-group has-feedback" id="password-div">
        <label class="control-label" for="password">&nbsp;</label>
        <input type="password" class="form-control" id="password" placeholder="密码">
        <span class="help-block" id="password-hint"></span>
        <span class="glyphicon form-control-feedback" id="password-iconhint"></span>
    </div>

    <div id="code-area">
        <div class="form-group has-feedback" id="code-div">
            <label class="control-label" for="code">&nbsp;</label>
            <input type="text" class="form-control" id="code" placeholder="验证码">
            <span class="glyphicon form-control-feedback" id="code-iconhint"></span>
        </div>
        <img src="../controller/GetCode.php?r=134" id="code-pic">
    </div>

</form>

<div class="btn-group">
    <button class="btn btn-primary" id="login-button">登录</button>
    <button type="button" class="btn btn-primary" id="register-button">注册</button>
</div>

<script src="./js/jquery.min.js"></script>
<script src="./js/bootstrap.min.js"></script>
<script src="./js/code.js"></script>
</body>
</html>