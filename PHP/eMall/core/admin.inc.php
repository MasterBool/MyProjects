<?php session_start();
/**
 * Created by PhpStorm.
 * User: master
 * Date: 16-3-14
 * Time: 上午10:33
 */
require_once '../include.php';

function isLogined($url) {
    if( !$_COOKIE['adminId'] && !$_SESSION['adminId'] )
        alertMeg('先登陆!',$url);
//    header("location: ../admin/index.php");
}

/**
 * 注销管理员
 */
function adminLogout() {
    setcookie('adminId', '', time()-8*24*3600);
    session_destroy();
    header('location: ./login.php');
}

/**
 * 添加管理员
 */
function addAdmin($username, $password, $email) {
    $result = fetchOne("SELECT username FROM Admin WHERE username = '{$username}'");
    if( $result != null ) {
        echo "该管理员已存在！<a href=\"addAdmin.php\">重新添加</a>";
        return;
    }

    $arr = array('username'=>$username, 'password'=>md5($password), 'email'=>$email);
    if( insert('Admin', $arr) )
        echo "添加成功！<a href=\"addAdmin.php\">继续添加</a>";
    else
        echo "添加失败！<a href=\"addAdmin.php\">重新添加</a>";

}




