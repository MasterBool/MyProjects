<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>登录</title>
<!--    <link rel="stylesheet" href="./css/bootstrap.min.css">-->
<!--    <link rel="stylesheet" href="./css/login.css">-->
    <link rel="stylesheet" href="./css/bs.css">
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

<h1>WebDisk用户登录</h1>
<!--<div id="login">-->
<!--    <form action="register.php" method="post">-->
<!---->
<!--        <div class="username">-->
<!--            <input type="text" name="username" class="input" placeholder="昵称" id="username">-->
<!--            <span class="username" id="usernameHint"></span>-->
<!--        </div>-->
<!---->
<!--        <div class="password">-->
<!--            <input type="text" name="password" class="input" placeholder="密码" id="password">-->
<!--            <span class="password"></span>-->
<!--        </div>-->
<!---->
<!---->
<!---->
<!--        <div class="btn-group">-->
<!--            <input type="submit" class="btn btn-success" value="登录" id="login">-->
<!--            <span></span>-->
<!--            <input type="button" class="btn btn-success" value="注册" id="register">-->
<!--        </div>-->
<!---->
<!--    </form>-->
<!--</div>-->

<form role="form">
    <div class="form-group has-success has-feedback">
        <label class="control-label" for="inputSuccess1">成功状态</label>
        <input type="text" class="form-control" id="inputSuccess1" placeholder="成功状态" >
        <span class="help-block">你输入的信息是正确的</span>
        <span class="glyphicon glyphicon-ok form-control-feedback"></span>
    </div>
</form>


<script src="./js/jquery.min.js"></script>
<script src="./js/bootstrap.min.js"></script>
<script>

    $("#username").focus('on', function() {
        $("span.username").html('请输入5-25个字符，包含中文，字母和数字');
    });

    $("#username").keyup('on', function() {
        var xmlhttp=new XMLHttpRequest();
        xmlhttp.onreadystatechange=function()
        {
            if (xmlhttp.readyState==4 && xmlhttp.status==200)
            {
                var res = xmlhttp.responseText;
                switch (res)
                {
                    case '1':
                        document.getElementById("usernameHint").innerHTML = '含有非法字符！';
                        break;
                    case '2':
                        document.getElementById("usernameHint").innerHTML = '少于5个字符！';
                        break;
                    case '3':
                        document.getElementById("usernameHint").innerHTML = '多于25个字符！';
                        break;
                    case '4':
                        document.getElementById("usernameHint").innerHTML = '已被占用！';
                        break;
                    case '5':
                        document.getElementById("usernameHint").innerHTML = '有效';
                        break;

                }
            }
        }
        xmlhttp.open("GET", "../controller/CheckLogin.Action.php?username=" + $("#username").val(),true);
        xmlhttp.send();
    });


</script>

</body>
</html>