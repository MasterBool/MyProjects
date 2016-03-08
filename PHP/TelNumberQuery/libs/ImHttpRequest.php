<?php
/**
 * Created by PhpStorm.
 * User: master
 * Date: 16-3-7
 * Time: 下午3:48
 * http请求模块
 */

namespace libs;

/**
 * Class ImHttpRequest
 * @package libs
 */
class ImHttpRequest
{
    public static function request($url, $params, $method = ('GET')) {
        $response = null;
        if($url) {
            $method = strtoupper($method);
            if($method == 'POST') {

            }
            else {
                if( is_array($params) and count($params) ) {
                    if( strrpos($url, '?') ) {
                        $url = $url . '&' . http_build_query($params);
                    }
                    else {
                        $url = $url . '?' . http_build_query($params);
                    }
                    $response = iconv('GB2312', 'UTF-8', file_get_contents($url));
                }
            }
        }
        return $response;
    }
}