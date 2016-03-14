<?php
/**
 * Created by PhpStorm.
 * User: master
 * Date: 16-3-13
 * Time: 下午4:40
 */

function alertMeg($msg, $url) {
    echo "<script>alert('{$msg}');</script>";
    echo "<script>window.location='{$url}';</script>";
}