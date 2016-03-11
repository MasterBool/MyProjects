<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>

<?php
function getView($realpath, $hostpath) {
    $fileNameArray = glob( $realpath . '/' . '*' );
    $n = count($fileNameArray);

    echo '<ul>';
    for($i=0; $i<$n; $i++)
    {

        if( is_dir($fileNameArray[$i]) ) {
            $name = basename($fileNameArray[$i]);
            $href = $hostpath . '/' . $name;
            $real = $realpath . '/' . $name;
            $temp = "<li><form action=\"download.php\" method=\"get\">
                        <span>$name</span>
                        <input type=\"text\" value=\"$href\" name=\"hostpath\" style=\"display: none\">
                        <input type=\"text\" value=\"$real\" name=\"realpath\" style=\"display: none\">
                        <input type=\"submit\" value='打开目录'>
                     </form></li>";
            echo $temp;
        }
        else {
            $name = basename($fileNameArray[$i]);
            $href = $hostpath . '/' . $name;
            echo "<li><a href=\"$href\">$name</a></li>";
        }
    }
    echo '</ul>';
}

$realpath = $hostpath = null;
if( $_GET['realpath'] == null ) {
    $realpath = '/home/wwwroot/default/PhpWorkPlace/FileLoad/upload/files';
    $hostpath = 'http://localhost/PhpWorkPlace/FileLoad/upload/files';
}
else {
    $realpath = $_GET['realpath'];
    $hostpath = $_GET['hostpath'];
}
getView($realpath, $hostpath);

?>


</body>
</html>