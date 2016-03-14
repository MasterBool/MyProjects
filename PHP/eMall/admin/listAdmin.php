<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>管理员列表</title>
</head>
<body>
    <table border=1 width=600 align=center>
        <caption>【管理员列表】</caption>
        <tr>
            <th>用户名</th>
            <th>密码</th>
            <th>邮箱</th>
        </tr>

        <?php

        require_once "../include.php";
        $sql = "SELECT username,password,email FROM Admin";
        $result = fetchAll($sql);
//        echo "<pre>";
//        var_dump($result);
        $n = count($result);
        for($i=0; $i<$n; $i++)
        {
            echo "<tr>";
            echo "<td align='center'>{$result[$i]['username']}</td>";
            echo "<td align='center'>{$result[$i]['password']}</td>";
            echo "<td align='center'>{$result[$i]['email']}</td>";
            echo "</tr>";
        }

        ?>

    </table>

</body>
</html>



