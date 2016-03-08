<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>手机归属地查询</title>
    <style>
        div {
            margin: 100px auto;
            display: block;
            height: 200px;
            width: 100%;
        }
        form {
            width: 400px;
            height: auto;
            margin: 0 auto;
            padding: 0;
            vertical-align: middle;
        }
        p{
            width: 400px;
            height: auto;
            margin: 10px auto;
        }
    </style>

</head>
<body>

<div>
    <form action="index.php" method="post">
        <input type="text" name="phone">
        <input type="submit" name="submit" value="submit">
    </form>

    <?php
    require_once "Autoload.php";

    if( $_POST["phone"]) {
        if( \app\QueryPhone::vertifyPhone($_POST["phone"]) ) {
            $mts = null;
            for($i=0; $i<7; $i++) $mts .= $_POST["phone"][$i];
            if( $data = \app\MysqlDB::readData($mts) ) {
                echo "<br>";
                echo '<p>' . "手机号: " . $_POST["phone"] . "</p>";
                echo '<p>' . "号码归属地: " . $data[0] . "</p>";
                echo '<p>' . "运营商: " . $data[1] . "</p>";
            }
            else {
                $data = \app\QueryPhone::query( $_POST["phone"] );
                echo "<br>";
                echo '<p>' . "手机号: " . $data["telString"] . "</p>";
                echo '<p>' . "号码归属地: " . $data["province"] . "</p>";
                echo '<p>' . "运营商: " . $data["catName"] . "</p>";
                \app\MysqlDB::writeData($data["province"], $data["catName"], $mts);
            }
        }
    }
    ?>
</div>

</body>
</html>
