<?php

/**
 * Created by PhpStorm.
 * User: master
 * Date: 16-3-9
 * Time: 下午6:03
 */
class FuncClass
{
    public function getData($page) {
        $minId = 1870000 + ($page - 1) * 20;
        $maxId =$minId + 19;

        $connection = new mysqli('localhost', 'master', 'lxz', 'ecust');
        if( $connection->connect_error )
            die("Connection failed: " . $connection->connect_error);
        $connection->query("SET NAMES UTF8");
        $sql = "SELECT mts, province, catName FROM PhoneNumber WHERE mts BETWEEN $minId AND $maxId";
        $result = $connection->query($sql)->fetch_all();
//        var_dump($result);
        return $result;
    }
}

//$a = new FuncClass();
//$data = $a->getData('2');
//var_dump($data[0][0]);var_dump($data[0][1]);var_dump($data[0][2]);