<?php

session_cache_limiter('private_no_expire');
session_start();
require_once('common.php');
$_SESSION["pageNo"] = 1;
?>

<!DOCTYPE html>

<html>

<head>
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link rel="shortcut icon" href="top.png">
    <title>オープンサーチ</title>
    <meta http-equiv="content-type" charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <script type="text/javascript" src="script.js"></script>
    <style type="text/css">
        body {
            background-color: lightblue;
            text-align: center;
            font-weight: bold;
            width: 500px;
            margin-right: auto;
            margin-left: auto;
        }

        h1 {
            margin-top: 80px;
            margin-bottom: 50px;
        }

        .h1 {
            font-size: 30px;
        }

        .city {
            width: 170px;
        }

        .button1,
        .button2 {
            font-size: 1.5em;
            font-weight: bold;
            padding: 5px 30px;
            border: 2px solid black;
        }

        .button1:hover {
            color: blue;
            border: 2px solid blue;
        }

        .button2:hover {
            color: red;
            border: 2px solid red;
        }

        .img {
            width: 100%;
            height: 100px;
        }
    </style>
</head>

<body onload="inputCheck()">

    <a href="top.php"><img src="top2.png" class="img"></a><br>
    <h1>変更施設検索</h1>
    <form action="facilityList.php" name="shop" method="post">
        <div class="one">
            県<?php prefectureSet() ?><br><br>

            市<select id="city" name="city" class="city">
                <option value="">市を選択してください</option>
            </select>
            <br>
            <br>
            検索ワード１<input type="text" name="word1" id="word1" onkeyup="inputCheck2()"><br><br>
            検索ワード２<input type="text" name="word2" id="word2"><br><br>
            <br>
            <br>
            <br>
            <br>
            <input type="submit" value="検索" name="search" class="button1">
        </div>
        <br>
        <br>
        <br>
        <br>
        <br>
        <a href="registerSel.php"><input type="button" value="戻る" class="button2"></a>
    </form>

</body>

</html>