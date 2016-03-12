<?php
// 1. 打开图片
$pic_src = './material/img/in/1.jpg';

$info = getimagesize($pic_src);
$type = image_type_to_extension($info[2], false);

$fun = "imagecreatefrom{$type}";
$image = $fun($pic_src);
// 2.操作图片
$font_src = './material/msyh.ttf';
$content = 'Hello World !';
$color = imagecolorallocatealpha($image,255,255,255,50);
imagettftext($image, 20, 0, 11, 21, $color, $font_src, $content);
// 3.输出图片
header('Content-Type: ' . $info['mime']);
imagepng($image);

// 4.销毁图片
?>