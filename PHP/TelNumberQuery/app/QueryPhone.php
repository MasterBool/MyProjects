<?php
/**
 * Created by PhpStorm.
 * User: master
 * Date: 16-3-7
 * Time: 下午2:13
 */
namespace app;

use libs\ImHttpRequest;

class QueryPhone {
    const TAOBAO_API = 'https://tcc.taobao.com/cc/json/mobile_tel_segment.htm';

    public static function query($phone) {
        if (self::vertifyPhone($phone)) {
            $response =  ImHttpRequest::request(self::TAOBAO_API, ['tel'=>$phone]);
            $response = self::formatData($response);
            return $response;
        }
    }

//    校验手机号码合法性
    public static function vertifyPhone($phone = null) {
        $ret = false;
        if($phone) {
            if( preg_match('/^1[3578]{1}\d{9}$/', $phone) )
                $ret = true;
        }
        return $ret;
    }

    public static function formatData($data = null) {
        $ret = false;
        if($data) {
            preg_match_all("/(\w+):'([^']+)/", $data, $res);
            $ret = array_combine($res[1], $res[2]);
        }
        return $ret;
    }
}
