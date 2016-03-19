<?php session_start();

require_once "../autoload.php";

//$username = $_GET['username'];
//$res = fetchOne("SELECT file_xml FROM User WHERE user_name='{$username}'")['file_xml'];

$str = <<<XML
<root>
    <first name="bootstrap" type="dir">
        <second name="css" type="dir"></second>

        <second name="js" type="dir">
            <third name="bootstrap.js" type="file" id="1"></third>

            <third name="bootstrap.min.js" type="file" id="2"></third>

            <third name="npm.js" type="file" id="3"></third>
        </second>

        <second name="fonts" type="dir">

        </second>
    </first>

    <test name="just a test">

    </test>
</root>
XML;



$xml = simplexml_load_string($str);

//显示xml属性，var_dump()、print_r不能够显示节点属性值

foreach($xml->first[0]->attributes() as $a => $b) {

    echo $a,'="',$b,"\"\n";

}

//foreach ($xml->first[0]->children() as $child)
//{
//    echo "<br>" . $child->getName() . "<br>";

//    foreach($child->second[0]->attributes() as $a => $b){
//
//        echo "<br/>".$child."：".$a."==".$b;

//    }

//}


//foreach ($xml->first[0]->children() as $child) {
//    echo "<br>" . $child->getName() . "<br>";
//}
