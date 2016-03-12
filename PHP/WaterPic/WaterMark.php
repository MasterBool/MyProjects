<?php

/**
 * Created by PhpStorm.
 * User: master
 * Date: 16-3-12
 * Time: 下午5:05
 * 输出水印图片
 */
class WaterMark
{
    private static function addWater($path, $filename, $flag) {
        $water_src = './material/water.png';

        //getimagesize：返回一个数组, example: 0.高，1.宽，2.图片类型，用于HTML标签的字符串，mime.图片类型
        //array(7) { [0]=> int(1920) [1]=> int(1080) [2]=> int(2) [3]=> string(26) "width="1920" height="1080""
        // ["bits"]=> int(8) ["channels"]=> int(3) ["mime"]=> string(10) "image/jpeg" }
        $info = getimagesize($path);
        $type = image_type_to_extension($info[2], false);

        //将图片写入内存，自动识别图片类型
        $fun = "imagecreatefrom{$type}";
        $image = $fun($path);
        $info_water = getimagesize($water_src);
        $type_water = image_type_to_extension($info_water[2], false);
        $fun = "imagecreatefrom{$type_water}";
        $image_water = $fun($water_src);

        //合并原图和水印
        imagecopymerge($image, $image_water, 1750, 910, 0, 0, $info_water[0], $info_water[1], 30);

        //输出图片
        $fun = "image{$type}";
        if( !$flag ) {
            header('Content-Type: ' . $info['mime']);
            $fun($image);
        }
        else
            $fun($image, $filename);

        //销毁内存
        imagedestroy($image);
        imagedestroy($image_water);
    }

    //默认输出文件，为　false则输出到浏览器
    public static function outPut($path, $flag = true) {
        $arr = glob($path);
        $n = count($arr);
        for($i=0; $i<$n; $i++) {
            $filename = './material/img/out/' . hash('md5', $arr[$i]) . image_type_to_extension( getimagesize($arr[$i])[2] );
            self::addWater($arr[$i], $filename, $flag);
        }
    }
}

//测试
//WaterMark::outPut('./material/img/in/*');