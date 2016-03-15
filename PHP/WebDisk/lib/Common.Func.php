<?php
/**
 * Created by PhpStorm.
 * User: master
 * Date: 16-3-15
 * Time: 下午5:09
 */
function alertMeg($msg, $url) {
    echo "<script>alert('{$msg}');</script>";
    echo "<script>window.location='{$url}';</script>";
}