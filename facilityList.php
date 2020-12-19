<?php

session_cache_limiter('private_no_expire');
session_start();
require_once('common.php');
require_once('dbConnect.php');

//変更施設検索画面から遷移した場合セッション変数を取得
if (isset($_SESSION["pageNo"])) {
    $pageNo = $_SESSION["pageNo"];
}

$_SESSION["number"] = null;
$_SESSION = $_POST;

function search()
{
    global $pageNo;

    $prefecture = $_POST["prefecture"];
    $city = $_POST["city"];
    $word1 = $_POST["word1"];
    $word2 = "";
    if (isset($_POST['word2'])) {
        $word2 = $_POST["word2"];
    }
    if (isset($_POST['now'])) {
        $now = 1;
    } else {
        $now = 0;
    }

    // tryにPDOの処理を記述
    try {

        $pdo = connectDB();

        $sql = "SELECT * FROM `content` WHERE 1";

        if ($prefecture != "") {
            $sql = $sql . " AND `prefecture`='" . $prefecture . "'";
        }
        if ($city != "") {
            $sql = $sql . " AND `city`='" . $city . "'";
        }
        if ($word1 != "") {
            $sql = $sql . " AND(( `prefecture` LIKE '%" . $word1 . "%' OR `city` LIKE '%" . $word1 . "%' 
            OR `name` LIKE '%" . $word1 . "%' OR `address` LIKE '%" . $word1 . "%' OR `remark` LIKE '%" . $word1 . "%' OR `tag` LIKE '%" . $word1 . "%' ))";
        }
        if ($word2 != "") {
            $sql = $sql . " AND(( `prefecture` LIKE '%" . $word2 . "%' OR `city` LIKE '%" . $word2 . "%' 
            OR `name` LIKE '%" . $word2 . "%' OR `address` LIKE '%" . $word2 . "%' OR `remark` LIKE '%" . $word2 . "%' OR `tag` LIKE '%" . $word2 . "%'))";
        }
        if ($now == 1) {
            $today = date("Y-m-d");
            $youbi = date("w", strtotime($today));

            if ($youbi == 1 || $youbi == 2 || $youbi == 3 || $youbi == 4 || $youbi == 5) {
                $num = 1;
            } else if ($youbi == 0 || $youbi == 6) {
                $num = 0;
            }
            if ($num == 1) {
                $sql = $sql . "  AND ( ( CURRENT_TIME >= `5` OR CURRENT_TIME <= `6` ) AND ( `5` < `6` AND CURRENT_TIME BETWEEN `5` AND `6` ) OR ( `5` > `6` AND ( CURRENT_TIME BETWEEN `5` AND '23:59:59' OR CURRENT_TIME BETWEEN '00:00:00' AND `6` ) ) OR ( `5` = '00:00:00' AND `6` = '00:00:00' ) AND ( CURRENT_DATE >= `start` AND CURRENT_DATE <= `end` ) AND `closeflg` = 0 )";
            } else if ($num == 0) {
                $sql = $sql . "  AND ((  CURRENT_TIME >= `7` OR CURRENT_TIME <= `8` ) AND ( `7` < `8` AND CURRENT_TIME BETWEEN `7` AND `8` ) OR ( `7` > `8` AND ( CURRENT_TIME BETWEEN `7` AND '23:59:59' OR CURRENT_TIME BETWEEN '00:00:00' AND `8` ) ) OR ( `7` = '00:00:00' AND `8` = '00:00:00' ) AND ( CURRENT_DATE >= `start` AND CURRENT_DATE <= `end` ) AND `closeflg` = 0 )";
            }
        }

        $stmt = $pdo->query($sql);

        $int = 0;
        foreach ($stmt as $row) {
            //変更施設検索画面から遷移
            if (isset($pageNo)) {
                // データベースのフィールド名で出力
                echo "<button type='submit' value='" . $row["content_no"] . "' name='change' class='button1'>" . $row["name"] . "</button>";
                // 改行を入れる
                echo '<br>';
            }
            //トップ画面から遷移
            else {
                while ($int == 0) {
                    $int += 1;
                    echo " <input type='image' src='map.png' name='map' value='マップで検索' class='gomap'><br>";
                }

                // データベースのフィールド名で出力
                echo "<button type='submit' value='" . $row["content_no"] . "' name='number' class='button1'>" . $row["name"] . "</button>";
                // 改行を入れる
                echo '<br>';
            }
        }

        // エラー（例外）が発生した時の処理を記述
    } catch (PDOException $e) {

        // エラーメッセージを表示させる
        echo 'データベースにアクセスできません！' . $e->getMessage();

        // 強制終了
        exit;
    }
}

?>

<!DOCTYPE html>

<html>

<head>
    <link rel="shortcut icon" href="top.png">
    <meta name="viewport" content="width=device-width,initial-scale=1">
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

        h1 {
            margin-bottom: 0px;
        }

        .button1,
        .button2 {
            font-size: 1em;
            font-weight: bold;
            padding: 5px 30px;
            border: 2px solid black;
            width: 200px;
            margin-bottom: 1px;
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

        .gomap {
            width: 200px;
            height: 50px;
            padding-bottom: 40px;
        }
    </style>
</head>

<body>
    <a href="top.php"><img src="top2.png" class="img"></a><br>

    <h1>店舗一覧</h1>
    <form action="screenBranch.php" method="post" name=""><br>
        <?php search() ?><br><br><br>
    </form>

    <a href="top.php"><input type="button" value="戻る" class='button2'></a>
</body>

</html>