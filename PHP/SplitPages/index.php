<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>分页练习</title>
    <style>
        table {
            width: 400px;
        }

        caption {
            margin: 10px;
            font-size: 20px;
        }

        #main {
            width: 100%;
            height: auto;
        }

        #main .page {
            width: 400px;
            height: auto;
            margin: 0 auto;
        }

        .page p {
            text-align: center;
        }

        .page .btns{
            display: flex;
            width: 100%;
        }

        .page .btns .pre {
            flex: 1;
        }

        .submit {
            width: 100%;
        }

        .page .btns .next {
            flex: 1;
        }

        #goto {
            width: 200px;
            margin: 20px auto;
        }

    </style>
</head>
<body>
<div id="main">

    <?php
    require_once "./model/FuncClass.php";
    $curPage = $_POST['page'];
    $prePage = null;
    $nextPage = null;

    if($curPage == null) {
        $curPage = 1;
        $nextPage = $curPage + 1;
        $prePage = 1;
    }
    else if( $curPage == 1 ){
        $nextPage = $curPage + 1;
        $prePage = 1;
    }
    else {
        $nextPage = $curPage + 1;
        $prePage =$curPage - 1;
    }

    $req = new FuncClass();
    $data = $req->getData($curPage);
    $tmp = "
    <table border=4 width=250 align=center>
        <caption>【号码归属地】</caption>
        <tr>
            <th>号段</th>
            <th>归属地</th>
            <th>运营商</th>
        </tr>
        <tr align=center>
            <td>" . $data[0][0] . "</td>
            <td>" . $data[0][1] . "</td>
            <td>" . $data[0][2] . "</td>
        </tr>
        <tr align=center>
            <td>" . $data[1][0] . "</td>
            <td>" . $data[1][1] . "</td>
            <td>" . $data[1][2] . "</td>
        </tr>
        <tr align=center>
            <td>" . $data[2][0] . "</td>
            <td>" . $data[2][1] . "</td>
            <td>" . $data[2][2] . "</td>
        </tr>
        <tr align=center>
            <td>" . $data[3][0] . "</td>
            <td>" . $data[3][1] . "</td>
            <td>" . $data[3][2] . "</td>
        </tr>
        <tr align=center>
            <td>" . $data[4][0] . "</td>
            <td>" . $data[4][1] . "</td>
            <td>" . $data[4][2] . "</td>
        </tr>
        <tr align=center>
            <td>" . $data[5][0] . "</td>
            <td>" . $data[5][1] . "</td>
            <td>" . $data[5][2] . "</td>
        </tr>
        <tr align=center>
            <td>" . $data[6][0] . "</td>
            <td>" . $data[6][1] . "</td>
            <td>" . $data[6][2] . "</td>
        </tr>
        <tr align=center>
            <td>" . $data[7][0] . "</td>
            <td>" . $data[7][1] . "</td>
            <td>" . $data[7][2] . "</td>
        </tr>
        <tr align=center>
            <td>" . $data[8][0] . "</td>
            <td>" . $data[8][1] . "</td>
            <td>" . $data[8][2] . "</td>
        </tr>
        <tr align=center>
            <td>" . $data[9][0] . "</td>
            <td>" . $data[9][1] . "</td>
            <td>" . $data[9][2] . "</td>
        </tr>
        <tr align=center>
            <td>" . $data[10][0] . "</td>
            <td>" . $data[10][1] . "</td>
            <td>" . $data[10][2] . "</td>
        </tr>
        <tr align=center>
            <td>" . $data[11][0] . "</td>
            <td>" . $data[11][1] . "</td>
            <td>" . $data[11][2] . "</td>
        </tr>
        <tr align=center>
            <td>" . $data[12][0] . "</td>
            <td>" . $data[12][1] . "</td>
            <td>" . $data[12][2] . "</td>
        </tr>
        <tr align=center>
            <td>" . $data[13][0] . "</td>
            <td>" . $data[13][1] . "</td>
            <td>" . $data[13][2] . "</td>
        </tr>
        <tr align=center>
            <td>" . $data[14][0] . "</td>
            <td>" . $data[14][1] . "</td>
            <td>" . $data[14][2] . "</td>
        </tr>
        <tr align=center>
            <td>" . $data[15][0] . "</td>
            <td>" . $data[15][1] . "</td>
            <td>" . $data[15][2] . "</td>
        </tr>
        <tr align=center>
            <td>" . $data[16][0] . "</td>
            <td>" . $data[16][1] . "</td>
            <td>" . $data[16][2] . "</td>
        </tr>
        <tr align=center>
            <td>" . $data[17][0] . "</td>
            <td>" . $data[17][1] . "</td>
            <td>" . $data[17][2] . "</td>
        </tr>
        <tr align=center>
            <td>" . $data[18][0] . "</td>
            <td>" . $data[18][1] . "</td>
            <td>" . $data[18][2] . "</td>
        </tr>
        <tr align=center>
            <td>" . $data[19][0] . "</td>
            <td>" . $data[19][1] . "</td>
            <td>" . $data[19][2] . "</td>
        </tr>
    </table>
    ";
    echo $tmp;

    $tmp = "
    <div class=\"page\">
        <p>第" . $curPage . "页</p>

        <div class=\"btns\">
            <form action=\"index.php\" method=\"post\" class=\"pre\">
                <input type=\"text\" value=\"$prePage\" name=\"page\" style=\"display: none;\">
                <input type=\"submit\" value=\"上一页\" class='submit'>
            </form>

            <form action=\"index.php\" method=\"post\" class=\"next\">
                <input type=\"text\" value=\"$nextPage\" name=\"page\" style=\"display: none;\">
                <input type=\"submit\" value=\"下一页\" class='submit'>
            </form>
        </div>
    </div>
    ";
    echo $tmp;

    ?>

    <form action="index.php" method="post" id="goto">
        跳转到第<input type="number" min="1" max="99" name="page">页
        <input type="submit">
    </form>
    <script src="./view/js/jquery.min.js"></script>
    <script src="./view/js/button.js"></script>
</div>

</body>
</html>