<?php

$name = $_FILES['chooseFile']['name'];
$type = $_FILES['chooseFile']['type'];
$tmp_name = $_FILES['chooseFile']['tmp_name'];
$error = $_FILES['chooseFile']['error'];
$size = $_FILES['chooseFile']['size'];
$curDate = date('Y-m-d');

//检查今日是否创建文件夹
$pathName = '../app/upload/' . $curDate . '/';
if( !is_dir($pathName) ) mkdir($pathName);

if( $size <= 1000000 && $error == 0
) {
    move_uploaded_file($tmp_name, $pathName . $name);
    echo 'Success !' . "<br>";
    var_dump( md5_file('/home/wwwroot/default/PhpWorkPlace/WebDisk/app/upload/2016-03-17/npm.js') );
}
else {
    echo "Invalid File!" . "<br>";
}

