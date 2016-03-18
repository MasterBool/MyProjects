<?php
/**
 * Created by PhpStorm.
 * User: master
 * Date: 16-3-13
 * Time: 下午4:35
 */
function getCaptcha()
{
    $image = imagecreatetruecolor(100, 30);
    $background_color = imagecolorallocate($image, 35 ,35, 35);
    imagefill($image, 0, 0, $background_color);
    $str = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";

    $captcha_code = null;
    for($i=0; $i<4; $i++)
    {
        $fontsize = 6;
        $fontcolor = imagecolorallocate($image, rand(200,255) ,rand(200,255), rand(200,255));
        $fontcontent = rand(0, 61); $fontcontent = $str[$fontcontent];
        $captcha_code .= $fontcontent;
        $x = 25 * $i + rand(5,10);
        $y = rand(5,10);

        imagestring($image, $fontsize, $x, $y, $fontcontent, $fontcolor);
    }
//        点干扰
    for($i=0; $i<200; $i++)
    {
        $pointcolor = imagecolorallocate($image, rand(50,200), rand(50,200), rand(50,200));
        imagesetpixel($image, rand(0,100), rand(0,30), $pointcolor);
    }

//        线干扰
    for($i=0; $i<5; $i++)
    {
        $linecolor = imagecolorallocate($image, rand(0,255), rand(0,255), rand(0,255));
        imageline($image, rand(0, 100), rand(0, 30), rand(0, 100), rand(0, 30), $linecolor);
    }

//        输出验证码
    header('content-type: image/png');
    imagepng( $image );

//        销毁图片
    imagedestroy( $image );

    return $captcha_code;
}