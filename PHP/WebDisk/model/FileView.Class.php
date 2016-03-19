<?php

/**
 * Created by PhpStorm.
 * User: master
 * Date: 16-3-18
 * Time: 上午8:53
 */
class FileView
{
    private $xml;

    function __construct($username)
    {
        $res = fetchOne("SELECT file_xml FROM User WHERE user_name='{$username}'")['file_xml'];
        $this->xml = simplexml_load_string($res);
    }
}