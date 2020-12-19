<?php

require_once('common.php');

?>

<!DOCTYPE html>

<html>

<head>
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>オープンサーチ</title>
    <meta http-equiv="content-type" charset="utf-8">
    <link rel="shortcut icon" href="top.png">
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
            margin-top: 30px;
            margin-bottom: 50px;
        }

        .city {
            width: 170px;
        }

        .button {
            font-size: 1.5em;
            font-weight: bold;
            padding: 5px 30px;
            border: 2px solid black;
        }

        .button:hover {
            color: blue;
            border: 2px solid blue;
        }

        .img {
            width: 100%;
            height: 100px;
        }
    </style>
</head>

<body onload="inputCheck()">

    <a href="top.php"><img src="top2.png" class="img"></a><br>
    <br>
    <br>
    <br>
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
            現在営業中のみ表示　<input type="checkbox" name="now" value="1" checked="checked">
            <br>
            <br>
            <br>
            <br>
            <input type="submit" value="検索" name="search" class="button">
        </div>
        <br>
        <br>
        <br>
        <br>
        <br>
        <a href="registerSel.php"><input type="button" value="施設情報登録" class="button"></a>
    </form>
    
</body>

</html>