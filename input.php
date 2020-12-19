<?php

session_cache_limiter('private_no_expire');
session_start();
require_once('common.php');

$_SESSION["register_check"] = 0;

?>

<!DOCTYPE html>

<html>

<head>
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link rel="shortcut icon" href="top.png">
    <title>オープンサーチ</title>
    <meta http-equiv="content-type" charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
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
    <script type="text/javascript" src="script.js"></script>
    <script src="https://ajaxzip3.github.io/ajaxzip3.js" charset="UTF-8"></script>
    <!--住所自動入力用-->

</head>

<body>
    <a href="top.php"><img src="top2.png" class="img"></a><br>

    <h1>施設情報入力</h1>

    <form action="inputVerification.php" method="post" name="shop">

        <table>
            <tr>
                <td>
                    県　　　　　　　　　　
                </td>
                <td>
                    <?php prefectureSet() ?><br>
                </td>
            </tr>
            <tr>
                <td>
                    市　　　　　　　　　　
                </td>
                <td>
                    <select name="city" id="city" style="width:170px;" required>
                        <option value="">市を選んでください</option>
                    </select><br>
                </td>
            </tr>
            <tr>
                <td>
                    施設名　　　　　　　　
                </td>
                <td>
                    <input type="text" name="shopName" id="shopName" style="width:200px;" required><br>
                </td>
            </tr>
            <tr>
                <td>
                    URL　　　　　　　　　
                </td>
                <td>
                    <input type="text" name="url" id="url" style="width:200px;"><br>
                </td>
            </tr>
            <tr>
                <td>
                    郵便番号　　　　　　　
                </td>
                <td>
                    <input type="text" name="post" id="post" style="width:200px;" size="10" maxlength="8" onKeyUp="AjaxZip3.zip2addr(this,'','addr11','addr11');" oninput="value = value.replace(/[^0-9]+/i,'');" required><br>
                </td>
            </tr>
            <tr>
                <td>
                    住所　　　　　　　　　
                </td>
                <td>
                    <input type="text" name="addr11" id="address" style="width:200px;" required><br>
                </td>
            </tr>
            <tr>
                <td>
                    電話番号　　　　　　　
                </td>
                <td>
                    <input type="text" name="tel" id="tel" oninput="value = value.replace(/[^0-9]+/i,'');" style="width:200px;" required><br>
                </td>
            </tr>
            <tr>
                <td>
                    <span style="color:red"><strong>＊一時閉店の場合チェックしてください</strong></span>
                </td>
                <td>
                    <input type="checkbox" name="close" id="close" value="閉店" onchange="closeDisappear()"><br>
                </td>
            </tr>
            <span id="closeDisappear">
                <tr>
                    <td>
                        <span style="color:red">特別</span>営業時間（平日）　
                    </td>
                    <td>
                        <?php hour("IHOH") . minute("IHOM") ?>～<?php hour("IHCH") . minute("IHCM") ?><br>
                    </td>

                </tr>
                <tr>
                    <td>
                        <span style="color:red">特別</span>営業時間（土日祝）
                    </td>
                    <td>
                        <?php hour("IYOH") . minute("IYOM") ?>～<?php hour("IYCH") . minute("IYCM") ?><br>

                    </td>

                </tr>
            </span>
            <tr>
                <td>
                    <span id="closeDisappear2"><span style="color:red">特別</span>営業時間適用期間</span>　　
                </td>
                <td>
                    <input type="date" name="start" id="start" min="<?php echo returnToday() ?>" onchange="dateCheck()" required>から<input type="date" name="end" id="end" min="<?php echo $today ?>" onchange="dateCheck()" required>まで<br>
                </td>
            </tr>
            <tr>
                <td>
                    備考
                </td>
                <td>
                    <textarea name="remarks"></textarea><br>
                </td>
            </tr>
            <tr>
                <td>
                    タグ
                </td>
                <td>
                    <textarea name="tag"></textarea><br>
                </td>
            </tr>
        </table>
        <br>
        <br>
        <br>
        <input type="submit" value="内容確認" id="submit" class="button1">

    </form>

    <a href="registerSel.php"><button class="button2">戻る</button></a>
    <br>
    <br>
    <br>

</body>

</html>