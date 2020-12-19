<!DOCTYPE html>

<html>

<head>
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link rel="shortcut icon" href="top.png">
    <meta http-equiv="content-type" charset="utf-8">
    <title>オープンサーチ</title>
    <style type="text/css">
        body {
            background-color: lightblue;
            text-align: center;
            font-weight: bold;
            width: 500px;
            margin-right: auto;
            margin-left: auto;
        }

        .button1,
        .button2,
        .button3 {
            font-size: 1.5em;
            font-weight: bold;
            padding: 5px 30px;
            border: 2px solid black;
            width: 200px;
        }

        .button1 {
            margin-top: 80px;
        }

        .button2 {
            margin-top: 100px;
        }

        .button3 {
            margin-top: 150px;
        }

        .button1:hover {
            color: blue;
            border: 2px solid blue;
        }

        .button2:hover {
            color: blue;
            border: 2px solid blue;
        }

        .button3:hover {
            color: red;
            border: 2px solid red;
        }

        .img {
            width: 100%;
            height: 100px;
        }
    </style>
</head>

<body>
    <form action="inputChange.php" method="post" name="inputChange"><br>
        <a href="top.php"><img src="top2.png" class="img"></a><br>
        <br>
        <input type="submit" value="新規登録" class="button1" name="new"></a>
        <br>
        <input type="submit" value="登録内容変更" class="button2" name="change"></a>
        <br>
        <a href="top.php"><input type="button" value="トップへ" class="button3"></a>

    </form>
</body>

</html>