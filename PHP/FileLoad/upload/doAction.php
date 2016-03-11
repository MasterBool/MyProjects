<?php
/**
 * Created by PhpStorm.
 * User: master
 * Date: 16-3-11
 * Time: 下午3:15
 */
$name = $_FILES['chooseFile']['name'];
$type = $_FILES['chooseFile']['type'];
$tmp_name = $_FILES['chooseFile']['tmp_name'];
$error = $_FILES['chooseFile']['error'];
$size = $_FILES['chooseFile']['size'];
$curDate = date('Y-m-d');

//检查今日是否创建文件夹
$pathName = './files/' . $curDate . '/';
if( !is_dir($pathName) ) mkdir($pathName);

if( $type == 'image/jpeg'
    || $type == 'image/jpg'
    || $type == 'image/png'
    || $type == 'image/gif'
    && $size <= 100000
    && $error == 0
  ) {
    move_uploaded_file($tmp_name, $pathName . $name);
    echo 'Success !' . "<br>";
}
else {
    echo "Invalid File!" . "<br>";
}

