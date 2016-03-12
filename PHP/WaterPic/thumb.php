<?php
/**
 * Created by PhpStorm.
 * User: master
 * Date: 16-3-12
 * Time: 下午7:40
 * 生成缩略图
 */
function thumbPics($path) {
    $info = getimagesize($path);
    $type = image_type_to_extension($info[2], false);
    $fun = "imagecreatefrom{$type}";
    $image = $fun($path);

    $image_thumb = imagecreatetruecolor(160,90);
    imagecopyresized($image_thumb, $image,0,0,0,0,160,90,1920,1080);

    header('Content-Type: ' . $info['mime']);
    $fun = "image{$type}";
    $fun($image_thumb   );
    imagedestroy($image);
    imagedestroy($image_thumb);
}

thumbPics('./material/img/in/3.jpg');