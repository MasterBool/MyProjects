<!--<!doctype html>-->
<!--<html lang="en">-->
<!--<head>-->
<!--    <meta charset="UTF-8">-->
<!--    <title>表单提示信息</title>-->
<!--    <link rel="stylesheet" href="./css/bs.css">-->
<!--</head>-->
<!--<body>-->
<!--<h3>示例1</h3>-->
<!--<form role="form">-->
<!--    <div class="form-group has-success has-feedback">-->
<!--        <label class="control-label" for="inputSuccess1">成功状态</label>-->
<!--        <input type="text" class="form-control" id="inputSuccess1" placeholder="成功状态" >-->
<!--        <span class="help-block">你输入的信息是正确的</span>-->
<!--        <span class="glyphicon glyphicon-ok form-control-feedback"></span>-->
<!--    </div>-->
<!--    <div class="form-group has-warning has-feedback">-->
<!--        <label class="control-label" for="inputWarning1">警告状态</label>-->
<!--        <input type="text" class="form-control" id="inputWarning1" placeholder="警告状态">-->
<!--        <span class="help-block">请输入正确信息</span>-->
<!--        <span class="glyphicon glyphicon-warning-sign form-control-feedback"></span>-->
<!--    </div>-->
<!--    <div class="form-group has-error has-feedback">-->
<!--        <label class="control-label" for="inputError1">错误状态</label>-->
<!--        <input type="text" class="form-control" id="inputError1" placeholder="错误状态">-->
<!--        <span class="help-block">你输入的信息是错误的</span>-->
<!--        <span class="glyphicon glyphicon-remove form-control-feedback"></span>-->
<!--    </div>-->
<!--</form>-->
<!--</body>-->
<!--</html>-->

<?php
$result = 'lxz';
$sql = "SELECT * FROM User WHERE user_name='{$result}'";
//echo "<pre>";
//$a = fetchOne($sql);

//if( $a==null ) echo "Hello!";
var_dump($sql);