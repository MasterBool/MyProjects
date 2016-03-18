<?php session_start();
/**
 * Created by PhpStorm.
 * User: master
 * Date: 16-3-17
 * Time: 下午10:12
 */

require_once "../autoload.php";

$username = $_GET['username'];
$res = fetchOne("SELECT file_xml FROM User WHERE user_name='{$username}'")['file_xml'];

$xml = simplexml_load_string($res);
//var_dump($xml);

foreach($xml->children() as $a=>$b){

    var_dump($b);

}

//foreach ($xml->childNodes as $item)
//{
//    print $item->nodeName . " = " . $item->nodeValue . "<br>";
//}

