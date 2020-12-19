<?php

session_cache_limiter('private_no_expire');
session_start();
require_once('common.php');
require_once('dbConnect.php');

$register_check = $_SESSION["register_check"];

if ($register_check === 0) {
} else if ($register_check === 1) {

    $number = $_SESSION["number"];
}
$prefecture = $_SESSION["prefecture"];                                                    //県
$prefecture = preg_replace('/\A[\p{C}\p{Z}]++|[\p{C}\p{Z}]++\z/u', '', $prefecture);      //空白を消す
$city = $_SESSION["city"];                                                                //市
$shopName = $_SESSION["shopName"];                                                        //店名
$url = $_SESSION["url"];                                                                  //URL
$post = $_SESSION["post"];                                                                //郵便番号
$addr11 = $_SESSION["addr11"];                                                            //住所
$tel = $_SESSION["tel"];                                                                  //電話番号
$e = $_SESSION["IHOH"] . ":" . $_SESSION["IHOM"];                                         //特別開店時間（平日）
$f = $_SESSION["IHCH"] . ":" . $_SESSION["IHCM"];                                         //特別閉店時間（平日）
$g = $_SESSION["IYOH"] . ":" . $_SESSION["IYOM"];                                         //特別開店時間（土日祝）
$h = $_SESSION["IYCH"] . ":" . $_SESSION["IYCM"];                                         //特別閉店時間（土日祝）
$start = $_SESSION["start"];                                                              //特別営業時間適用開始日時
$end = $_SESSION["end"];                                                                  //特別営業時間適用終了日時
if (isset($_SESSION["close"])) {                                                          //一時閉店チェック
    $close = 1;
} else {
    $close = 0;
}
$remarks = $_SESSION["remarks"];                                                          //備考
$tag = $_SESSION["tag"];                                                                  //タグ
if (isset($_SESSION["image"])) {
    $image = $_SESSION["image"];                                                          //画像
} else {
    $image = "";
}

try {

    $pdo = connectDB();

    //新規登録の場合と施設詳細変更の場合でSQLを変える
    if ($register_check === 0) {
        $sql = "INSERT INTO `content`(`prefecture`, `city`,`name`, `url`, `post`, `address`, `tel`, `5`, `6`, `7`, `8`, `start`, `end`, `closeflg`, `remark`, `tag`) 
VALUES ('" . $prefecture . "','" . $city . "','" . $shopName . "','" . $url . "','" . $post . "','" . $addr11 . "','" . $tel . "','" . $e . "','" . $f . "','" . $g . "','" . $h . "','" . $start . "','" . $end . "',$close,'" . $remarks . "','" . $tag . "')";
    } else if ($register_check === 1) {
        $sql = "UPDATE `content` SET `prefecture`='$prefecture',`city`='$city',`name`='$shopName',`url`='$url',`post`=$post,`address`='$addr11',`tel`='$tel',`5`='$e',`6`='$f',`7`='$g',`8`='$h',`start`='$start',`end`='$end',`closeflg`=$close,`remark`='$remarks',`tag`='$tag' WHERE `content_no`=$number";
    }

    $stmt = $pdo->query($sql);

   // $stmt->execute();

    // 接続を閉じます
    $pdo = null;
} catch (PDOException $e) {

    // エラーメッセージを表示させる
    echo 'データベースにアクセスできません！' . $e->getMessage();

    // 強制終了
    exit;
}

//新規登録の場合と施設詳細変更の場合でタイトルを変える
function title_check($register_check)
{
    if ($register_check == 0) {
        echo "施設情報を登録しました";
        $_SESSION["register_check"] = 0;
    } else if ($register_check == 1) {
        echo "施設情報を更新しました";
        $_SESSION["register_check"] = 1;
    }
}

?>
<html>

<head>
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link rel="shortcut icon" href="top.png">
    <title>オープンサーチ</title>
    <meta http-equiv="content-type" charset="utf-8">
    <script type="text/javascript" src="script.js"></script>
    <style type="text/css">
        .s {
            text-align: center;
            padding-top: 100px;
        }

        .b {
            font-size: 1.5em;
            font-weight: bold;
            padding: 5px 30px;
        }

        body {
            background-color: lightblue;
            font-weight: bold;
            text-align: center;
            width: 500px;
            margin-right: auto;
            margin-left: auto;
        }

        .img {
            width: 100%;
            height: 100px;
        }
    </style>
</head>

<body>
    <a href="top.php"><img src="top2.png" class="img"></a><br>

    <div class="s">
        <span id="yesno">
            <h2><?php title_check($register_check) ?></h2>
        </span>
        <br>
        <br>
        <br>
        <input type="button" value="OK" class="b" onclick="topScene()">
    </div>

</body>

</html>