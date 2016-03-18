<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="./css/bs.css">

    <style>
        form {
            width: 400px;
            margin: 400px auto;
        }
        button {
            width: 100px;
        }
    </style>

</head>
<body>

<form type="file" action="../controller/Upload.Action.php" method="post" enctype="multipart/form-data">
    选择上传文件
    <input type="file" name="chooseFile"><br>
    <button type="submit" class="btn btn-primary">上传</button>
</form>

</body>
</html>