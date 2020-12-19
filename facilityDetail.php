<?php

//session_cache_limiter('private_no_expire'); //Web版ではエラーのためコメントアウト
session_start();
require_once('common.php');
require_once('dbConnect.php');

$number = $_SESSION["number"];

try {
    $pdo = connectDB();

    $sql = "SELECT `name`,`url`,`post`,`address`,`tel`,`5`,`6`,`7`,`8`,`start`,`end`,`closeflg`,`remark`,`tag` FROM `content` WHERE `content_no` = $number";

    $stmt = $pdo->query($sql);

    foreach ($stmt as $row) {

        //店舗情報取得

        $shopName = $row["name"];              //店名
        $url = $row["url"];                    //URL
        $post = $row["post"];                  //郵便番号
        $address = $row["address"];            //住所
        $tel = $row["tel"];                    //電話番号
        $IHOH = cut($row["5"]);                  //特別開店時間（平日）
        $IHCH = cut($row["6"]);                  //特別閉店時間（平日）
        $IYOH = cut($row["7"]);                  //特別開店時間（土日祝）
        $IYCH = cut($row["8"]);                  //特別閉店時間（土日祝）
        $start = $row["start"];                //特別営業時間適用開始日時
        $end = $row["end"];                    //特別営業時間適用終了日時
        $closeflg = $row["closeflg"];          //一時閉店フラグ
        $remark = $row["remark"];              //備考
        $tag = $row["tag"];                    //タグ
    }
    // エラー（例外）が発生した時の処理を記述
} catch (PDOException $e) {

    // エラーメッセージを表示させる
    echo 'データベースにアクセスできません！' . $e->getMessage();

    // 強制終了
    exit;
}

function timeSet($open, $close)
{
    if ($open == "00:00" && $close == "00:00") {
        echo "２４時間営業";
    } else {
        echo $open . "～" . $close;
    }
}

function closeflg($closeflg, $start, $end)
{
    if ($closeflg == 1) {
        echo "<span style='color:red' class='h1'><strong>現在一時閉店中です！！</strong></span><br><br>";
        echo "<span style='color:red' class='h2'><strong>一時閉店期間：" . $start . "～" . $end . "</strong></span><br>";
    } else if ($closeflg == 0) {
    }
}

function cut($str)
{
    $cut = 3; //カットしたい文字数
    $replace = substr($str, 0, strlen($str) - $cut);
    return $replace;
}
?>

<!DOCTYPE html>

<html>

<head>
    <title>オープンサーチ</title>
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link rel="shortcut icon" href="top.png">
    <meta http-equiv="content-type" charset="utf-8">
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
            margin-top: 50px;
        }

        .button {
            font-size: 1em;
            font-weight: bold;
            padding: 5px 30px;
            border: 2px solid black;
            width: 200px;
            margin-bottom: 1px;
        }

        .h1 {
            font-size: 30px;
        }

        .h2 {
            font-size: 20px;
        }

        .button:hover {
            color: red;
            border: 2px solid red;
        }

        .img {
            width: 100%;
            height: 100px;
        }
    </style>
</head>

<body onload="closeCheck(<?php echo $closeflg ?>)">

    <a href="top.php"><img src="top2.png" class="img"></a><br>

    <h1>店舗情報</h1>

    <?php closeflg($closeflg, $start, $end) ?>
    <br><br><br>
    <table border="1">
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
                <a href="<?php echo $url ?>"><?php echo $url ?></a><br>
            </td>
        </tr>
        <tr>
            <td>
                住所
            </td>
            <td>
                <a href="https://www.google.com/maps/search/?api=1&query=<?php echo $address ?>"><?php echo $address ?><br></a>
            </td>
        </tr>
        <tr>
            <td>
                電話番号
            </td>
            <td>
                <a href="tel:<?php echo $tel ?>"><?php echo $tel ?><br></a>
            </td>
        </tr>
        <span id="special">
            <tr>
                <td>
                    <span style="color:red">特別</span>営業時間（平日）
                </td>
                <td>
                    <?php timeSet($IHOH, $IHCH) ?><br>
                </td>
            </tr>
            <tr>
                <td>
                    <span style="color:red">特別</span>開店時間（土日祝）
                </td>
                <td>
                    <?php timeSet($IYOH, $IYCH) ?><br>
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
                <?php echo $remark ?><br>
            </td>
        </tr>
    </table>
    <div onclick="oritatami()">
        <a style="cursor:pointer;">▼ タグ</a>
    </div>
    <div id="open" style="display:none;clear:both;">
        <?php echo $tag ?>
    </div><br>
    <br><br><br>
    <input type="button" value="戻る" onclick="history.back()" class='button'>

</body>

</html>