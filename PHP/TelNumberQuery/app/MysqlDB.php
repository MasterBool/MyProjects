<?php
/**
 * Created by PhpStorm.
 * User: master
 * Date: 16-3-8
 * Time: 上午10:57
 */

namespace app;


class MysqlDB
{
    public static function writeData($province, $catName, $mts) {
        $conn = new \mysqli('localhost', 'master', 'lxz', 'ecust');
        if( $conn->connect_error )
            die("Connection failed: " . $conn->connect_error);

        $sql = "INSERT INTO PhoneNumber (province, catName, mts)
                VALUES ('$province', '$catName', '$mts')";
        if ($conn->query($sql) != TRUE)
            echo "Error: " . $sql . "<br>" . $conn->error . "<br>";
        $conn->close();
    }

    public static function readData($mts) {
        $conn = new \mysqli('localhost', 'master', 'lxz', 'ecust');
        if( $conn->connect_error )
            die("Connection failed: " . $conn->connect_error);

        $sql = "SELECT province, catName, mts FROM PhoneNumber WHERE mts = $mts";
        $result = $conn->query($sql)->fetch_row();
        $conn->close();
        return $result;
    }
}