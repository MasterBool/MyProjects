<?php
/**
 * Created by PhpStorm.
 * User: master
 * Date: 16-3-13
 * Time: 下午4:40
 */
require_once '../include.php';

function connect() {
    $conn = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_NAME);
    !$conn->connect_error or die('数据库连接失败: ' . $conn->connect_error);
    $conn->set_charset(DB_ENCODEING);
    return $conn;
}

function insert($table, $array)
{
    $keys = join(',', array_keys($array));
    $valsArr = array_values($array);
    $vals = "'";
    for($i=0; $i<count($valsArr); $i++) {
        if($i != count($valsArr)-1)
            $vals .= $valsArr[$i] . "','";
        else
            $vals .= $valsArr[$i] . "'";
    }

    $sql = "INSERT INTO {$table} ($keys) VALUES ({$vals})";
    $conn = connect();
    $conn->query($sql);
    return $conn->insert_id;
}

//example: $where = 'id = "21"'
function update($table, $array, $where = null)
{
    $str = null;
    foreach($array as $key=>$value)
    {
        !$str ? $sep='' : $sep=',';
        $str .= $sep . $key . "='" . $value . "'";
        $sql = "UPDATE {$table} SET {$str}" . ($where==null?null:" WHERE " . $where);
    }
    $conn = connect();
    $conn->query($sql);
    return $conn->affected_rows;
}

function delete($table, $where=null) {
    $where == null or ($where=" WHERE " . $where);
    $sql = "DELETE FROM {$table}{$where}";
    $conn = connect();
    $conn->query($sql);
    return $conn->affected_rows;
}

function fetchOne($sql, $result_type=MYSQLI_ASSOC) {
    $conn = connect();
    $row = $conn->query($sql)->fetch_array($result_type);
    return $row;
}

function fetchAll($sql, $result_type=MYSQLI_ASSOC) {
    $conn = connect();
    $result = $conn->query($sql);
    while( @$row = $result->fetch_array($result_type) ) {
        $rows[] = $row;
    }
    return $rows;
}

function getResultNum($sql) {
    $conn = connect();
    $result = $conn->query($sql)->num_rows;
    return $result;
}


