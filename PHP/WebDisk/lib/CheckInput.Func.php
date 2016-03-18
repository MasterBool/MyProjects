<?php
/**
 * Created by PhpStorm.
 * User: master
 * Date: 16-3-15
 * Time: 下午7:32
 */

function checkUserNameFormat($username) {
    return preg_match("/^[\x{4e00}-\x{9fa5}A-Za-z0-9_]+$/u",$username );
}

function checkPwdFormat($password) {
    return preg_match("/^[a-zA-Z0-9]{3,20}$/", $password);
}

function checkUserPwdFormat($email) {
    return preg_match("/^([a-zA-Z0-9_-])+@([a-zA-Z0-9_-])+(.[a-zA-Z0-9_-])+/", $email);
}

/**
 * 0.非法用户
 * 1.有效账号
 */
function checkUserName($username) {
    $sql = "SELECT * FROM User WHERE user_name='{$username}'";
    $flag = null;

    if( !checkUserNameFormat($username) )
        $flag = 0;
    else if(strlen($username)<5 || strlen($username)>25)
        $flag = 0;
    else if( !fetchOne($sql) )
        $flag = 0;
    else
        $flag = 1;
    return $flag;
}

function checkUserPwd($username, $password) {
    $flag = null;
    if( !checkPwdFormat($password) )
        $flag = 0;
    else if( strlen($password) < 6 || strlen($password) > 32)
        $flag = 0;
    else {
        $sql = "SELECT * FROM User WHERE user_name='{$username}'";
        $correct_pwd = fetchOne($sql)['password'];
        $password = md5($password);
        if( $correct_pwd && $correct_pwd == $password ) {
            $flag = 1;
        }
    }
    return $flag;
}



