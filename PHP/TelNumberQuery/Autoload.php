<?php

/**
 * Created by PhpStorm.
 * User: master
 * Date: 16-3-7
 * Time: 下午2:29
 * 自动加载
 */
class Autoload
{
    public static function load($className) {
        $fileName = str_replace('\\', '/', $className) . '.php';
        if(is_file($fileName)) require_once $fileName;
    }
}

spl_autoload_register(['Autoload', 'load']);