<?php

session_cache_limiter('private_no_expire');
session_start();

$register_check = $_SESSION["register_check"];
$content_no = $_SESSION["number"];
$_SESSION = $_POST;
$_SESSION["number"] = $content_no;

//店舗情報取得
$prefecture = $_POST["prefecture"]; //県
$city = $_POST["city"];             //市
$shopName = $_POST["shopName"];     //店名
$url = $_POST["url"];               //URL
$post = $_POST["post"];             //郵便番号
$addr11 = $_POST["addr11"];         //住所
$tel = $_POST["tel"];               //電話番号
$IHOH = $_POST["IHOH"];             //特別開店時間（平日）
$IHOM = $_POST["IHOM"];
$IHCH = $_POST["IHCH"];             //特別閉店時間（平日）
$IHCM = $_POST["IHCM"];
$IYOH = $_POST["IYOH"];             //特別開店時間（土日祝）
$IYOM = $_POST["IYOM"];
$IYCH = $_POST["IYCH"];             //特別閉店時間（土日祝）
$IYCM = $_POST["IYCM"];
$start = $_POST["start"];           //特別営業時間適用開始日時
$end = $_POST["end"];               //特別営業時間適用終了日時
if (isset($_POST["close"])) {       //一時閉店
    $close = 1;
} else {
    $close = 0;
}
$remarks = $_POST["remarks"];       //備考
$tag = $_POST["tag"];               //タグ

function title_check($register_check)
{
    if ($register_check == 0) {
        echo "登録内容確認";
        $_SESSION["register_check"] = 0;
    } else if ($register_check == 1) {
        echo "更新内容確認";
        $_SESSION["register_check"] = 1;
    }
}

function noSelect($selected)
{
    if ($selected == 0) {
        $selected = "未選択";
    }
}

noSelect($prefecture);
noSelect($city);

function closeflg($close, $start, $end)
{
    if ($close == 1) {
        echo "<span style='color:red' class='h1'><strong>この期間一時閉店します</strong></span><br>";
        echo "<span style='color:red'><h2>一時閉店期間：" . $start . "～" . $end . "</h2></span><br>";
    } else if ($close == 0) {
    }
}

function timeSet2($open, $close, $open2, $close2)
{
    if ($open == "00" && $close == "00" && $open2 == "00" && $close2 == "00") {
        echo "２４時間営業";
    } else {
        echo $open . ":" . $close . "～" . $open2 . ":" . $close2;
    }
}
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

        .button1,
        .button2 {
            font-size: 1em;
            font-weight: bold;
            padding: 5px 30px;
            border: 2px solid black;
            width: 120px;
        }

        .button2 {
            margin-top: 20px;
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

<body onload="closeCheck2(<?php echo $close ?>)">

    <a href="top.php"><img src="top2.png" class="img"></a><br>
    <h1><?php title_check($register_check) ?></h1>
    <?php closeflg($close, $start, $end) ?>

    <div class="a">
        <form action="registerCheck.php" method="post">

            <table border="1">
                <tr>
                    <td>
                        県
                    </td>
                    <td>
                        <?php echo $prefecture ?><br>
                    </td>
                </tr>
                <tr>
                    <td>
                        市
                    </td>
                    <td>
                        <?php echo $city ?><br>
                    </td>
                </tr>
                <tr>
                    <td>
                        施設名
                    </td>
                    <td>
                        <?php echo $shopName ?><br>
                    </td>
                </tr>
                <tr>
                    <td>
                        URL
                    </td>
                    <td>
                        <a href="<?php echo $url ?>"><?php echo $url ?><br></a>
                    </td>
                </tr>
                <tr>
                    <td>
                        郵便番号
                    </td>
                    <td>
                        <?php echo $post ?><br>
                    </td>
                </tr>
                <tr>
                    <td>
                        住所
                    </td>
                    <td>
                        <?php echo $addr11 ?><br>
                    </td>
                </tr>
                <tr>
                    <td>
                        電話番号
                    </td>
                    <td>
                        <?php echo $tel ?><br>
                    </td>
                </tr>
                <span id="special2">
                    <tr>
                        <td>
                            <span style="color:red">特別</span>営業時間（平日）
                        </td>
                        <td>
                            <?php timeSet2($IHOH, $IHOM, $IHCH, $IHCM) ?><br>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <span style="color:red">特別</span>開店時間（土日祝）
                        </td>
                        <td>
                            <?php timeSet2($IYOH, $IYOM, $IYCH, $IYCM) ?><br>
                        </td>

                    </tr>
                    <tr>
                        <td>
                            <span style="color:red">特別</span>営業時間適用期間
                        </td>
                        <td>
                            <?php echo $start . "から" . $end . "まで" ?>　<br>
                        </td>
                    </tr>
                </span>
                <tr>
                    <td>
                        備考
                    </td>
                    <td>
                        <?php echo $remarks ?><br>
                    </td>
                </tr>
                <tr>
                    <td>
                        タグ
                    </td>
                    <td>
                        <?php echo $tag ?><br>
                    </td>
                </tr>
            </table>
            <br>
            <br>
            <input type="submit" value="登録" class="button1"><br><br><br>
        </form>
    </div>
    <button onclick="history.back()" class="button2">戻る</button>

</body>

</html>