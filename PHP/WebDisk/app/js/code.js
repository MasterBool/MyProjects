$(function() {
    $("#username").focus('on', function() {
        $("#username-hint").html('请输入用户名');
    });

    $("#username").keyup('on', function() {

        $.get("../controller/CheckLogin.Action.php?username=" + $(this).val(), function(data, status) {
            if(data == '1') {
                $("#username-hint").html('有效账号');
                $("#username-iconhint").attr('class', 'glyphicon form-control-feedback glyphicon-ok');
                $("#username-div").attr('class', 'form-group has-feedback has-success');
            }
            else {
                $("#username-hint").html('非法用户');
                $("#username-iconhint").attr('class', 'glyphicon form-control-feedback glyphicon-remove');
                $("#username-div").attr('class', 'form-group has-feedback has-error');
            }
        });

    });


    $("#password").focus('on', function() {
        $("#password-hint").html('请输入密码，6-32位字母和数字');
    });

    $("#password").keyup('on', function() {
        $.post("../controller/CheckLogin.Action.php", {
            password: $("#password").val()
        }, function(data,status) {
            if( data == '1' ) {
                $("#password-hint").html('输入正确');
                $("#password-iconhint").attr('class', 'glyphicon form-control-feedback glyphicon-ok');
                $("#password-div").attr('class', 'form-group has-feedback has-success');
            }
            else {
                $("#password-hint").html('输入错误');
                $("#password-iconhint").attr('class', 'glyphicon form-control-feedback glyphicon-remove');
                $("#password-div").attr('class', 'form-group has-feedback has-error');
            }
        });
    });

    $("#code").keyup('on', function() {

        $.get("../controller/CheckLogin.Action.php?code=" + $("#code").val(), function(data, status) {
            if(data == '1') {
                $("#code-iconhint").attr('class', 'glyphicon form-control-feedback glyphicon-ok');
                $("#code-div").attr('class', 'form-group has-feedback has-success');
            }
            else {
                $("#code-iconhint").attr('class', 'glyphicon form-control-feedback glyphicon-remove');
                $("#code-div").attr('class', 'form-group has-feedback has-error');
            }
        });

    });

    $("#login-button").click('on', function() {
        $.post('../controller/UserLogin.php', {
                username: $("#username").val(),
                password: $("#password").val(),
                code: $("#code").val()
            },
            function(data, status) {
                if(data == '0') {
                    $("#code-area").show();
                }
                else
                    window.location = '../index.php';
            });
    });
});