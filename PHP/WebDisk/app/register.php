<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>登录</title>
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/register.css">
</head>

<body>

<h1>WebDisk用户注册</h1>
<div id="login">
    <form action="register.php" method="post">
        <input type="text" name="username" class="input" placeholder="昵称">
        <input type="text" name="email" class="input" placeholder="电子邮箱">
        <input type="text" name="password" class="input" placeholder="密码">

        <div class="btn-group">
            <input type="button" class="btn btn-success" value="注册" id="register">
        </div>

    </form>
</div>

<script src="./js/jquery.min.js"></script>
<script src="./js/bootstrap.min.js"></script>
</body>
</html>