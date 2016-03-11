<?php session_start(); ?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>验证码</title>
</head>
<body>
<form action="./form.php" method="post">
    <p>验证码图片: <img src="./captcha.php" width="100" height="30"></p>
    <p>请输入图片中的内容:
        <input type="text" maxlength="4" name="input">
    </p>
    <input type="submit">
</form>

<?php

if( strtoupper($_SESSION['author_code']) == strtoupper($_POST['input']) )
    echo "输入正确！" . "<br>";
else
    echo "输入错误！" . "<br>";

?>
</body>
</html>