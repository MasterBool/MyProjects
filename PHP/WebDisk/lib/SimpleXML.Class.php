<?php

/**
 * Created by PhpStorm.
 * User: master
 * Date: 16-3-18
 * Time: 上午10:05
 *  $path = array( $key=>$value );
 */
class SimpleXML
{
    private $xml;

    public function getXml()
    {
        return $this->xml;
    }

    // 初始化为空xml
    public function __construct()
    {
        $str = <<<XML
<?xml version="1.0" encoding="UTF-8"?>
<root></root>
XML;
        $this->xml = simplexml_load_string($str);
    }

    public function loadFromString($string)
    {
        $this->xml = simplexml_load_string($string);
    }

    /**
     * @param $node : SimpleXMLElement
     * @param $path : array
     * @param int $index
     * @return mixed
     * $path是表示路径的数组，如 $path = array('soft', 'vs', 'vs2012');
     */
    public function getNode($path = null, $node = null, $index = 0)
    {

        if( $index == 0 )
            $node = $this->xml;

        if( count($path) == 0 )
            return $node;

        foreach($node->children() as $child)
        {
            if( $child->getName() == $path[$index] ) {
                unset( $path[$index] );
                return $this->getNode($path, $child, $index + 1);
            }
        }
    }

    public function getAttrbutes($path)
    {
        $node = $this->getNode($path);
        $res = null;
        foreach($node->attributes() as $key=>$value) {
            $res[$key] = (string)$value;
        }
        return $res;
    }


    public function addNode($nodename, $path = null)
    {
        if( $path == null ) {
            $this->xml->addChild($nodename);
            return;
        }
        $n = count($path) - 1;

        $code = 'foreach($this->xml';
        for($i=0; $i<$n; $i++)
            $code .= "->{$path[$i]}[0]";
        $code .= '->children() as $child){
            if( $child->getName() == $path[$n] )
                $child->addChild($nodename);
        }';
        eval($code);
    }

    public function addAttribute($key, $value, $path = null)
    {
        if( $path == null ) {
            $this->xml->addAttribute($key, $value);
            return;
        }
        $n = count($path) - 1;
        $code = 'foreach($this->xml';
        for($i=0; $i<$n; $i++)
            $code .= "->{$path[$i]}[0]";
        $code .= '->children() as $child){
            if( $child->getName() == $path[$n] )
                $child->addAttribute($key, $value);
        }';
        eval($code);
    }

    public function updateAttribute($key, $value, $path = null)
    {
        if( $path == null ) {
            foreach($this->xml->attributes() as $a=>$b) {
                if( $a == $key )
                    $this->xml[$key] = $value;
            }
            return;
        }

        $str = '$this->xml';
        $n = count($path);
        for($i=0; $i<$n; $i++)
            $str .= "->{$path[$i]}[0]";
        $code = 'foreach(' . $str;
        $code .= '->attributes() as $a=>$b){if( $a == $key )' . $str . '[$key] = $value;}';
        eval($code);
    }

    public function deleteNode($path = null)
    {
        if( $path == null ) {
            unset($this->xml);
        }

        $n = count($path);
        $code = 'unset($this->xml';
        for($i=0; $i<$n; $i++)
            $code .= ('->' . $path[$i] . '[0]');
        $code .= ');';
        eval($code);
    }

    public function updateNode($newname, $path)
    {
        if($path == null) return;
        $node = $this->getNode($path);
        $str = $node->saveXML();
        $re = '/' . $node->getName() . '/';
        $str = preg_replace($re, $newname, $str, 1);
        $str = str_replace("</{$node->getName()}>", "</{$newname}>", $str);

        $doc = $this->xml->saveXML();
        $doc = str_replace($node->saveXML(), $str, $doc);
        $this->loadFromString($doc);
    }

    public function deleteAttrbute($key, $path)
    {
        $node = $this->getNode($path);
        unset($node[$key]);
    }
}
