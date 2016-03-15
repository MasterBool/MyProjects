<?php
/**
 * Created by PhpStorm.
 * User: master
 * Date: 16-3-15
 * Time: 下午7:32
 */
//function regCheckInput($username, $email, $password) {
//    $flag = 0;
//    if( preg_match("/^[\x{4e00}-\x{9fa5}A-Za-z0-9_]+$/u",$username ) )
//        $flag++;
//    if( preg_match("/^([a-zA-Z0-9_-])+@([a-zA-Z0-9_-])+(.[a-zA-Z0-9_-])+/", $email) )
//        $flag++;
//    if( preg_match("/^[a-zA-Z0-9]{3,20}$/", $password) )
//        $flag++;
//    return $flag == 3;
//}

function checkUserNameFormat($username) {
    return preg_match("/^[\x{4e00}-\x{9fa5}A-Za-z0-9_]+$/u",$username );
}



