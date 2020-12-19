<?php

session_cache_limiter('private_no_expire');
session_start();
require_once('common.php');
require_once('dbConnect.php');

$prefecture = $_SESSION["prefecture"];
$city = $_SESSION["city"];
$word1 = $_SESSION["word1"];
$word2 = "";
if ($_SESSION["word2"] != "") {
    $word2 = $_SESSION["word2"];
}
if (isset($_SESSION['now'])) {
    $now = 1;
} else {
    $now = 0;
}

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
        $sql = $sql . " AND( `prefecture` LIKE '%" . $word1 . "%' OR `city` LIKE '%" . $word1 . "%' 
                OR `name` LIKE '%" . $word1 . "%' OR `address` LIKE '%" . $word1 . "%' OR `remark` LIKE '%" . $word1 . "%' OR `tag` LIKE '%" . $word1 . "%' )";
    }
    if ($word2 != "") {
        $sql = $sql . " AND `prefecture` LIKE '%" . $word2 . "%' OR `city` LIKE '%" . $word2 . "%' 
                OR `name` LIKE '%" . $word2 . "%' OR `address` LIKE '%" . $word2 . "%' OR `remark` LIKE '%" . $word2 . "%' OR `tag` LIKE '%" . $word2 . "%'";
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
            $sql = $sql . "  AND (  CURRENT_TIME >= `5` OR CURRENT_TIME <= `6` ) AND ( `5` < `6` AND CURRENT_TIME BETWEEN `5` AND `6` ) OR ( `5` > `6` AND ( CURRENT_TIME BETWEEN `5` AND '23:59:59' OR CURRENT_TIME BETWEEN '00:00:00' AND `6` ) ) OR ( `5` = '00:00:00' AND `6` = '00:00:00' ) AND ( CURRENT_DATE >= `start` AND CURRENT_DATE <= `end` ) AND `closeflg` = 0 ";
        } else if ($num == 0) {
            $sql = $sql . "  AND (  CURRENT_TIME >= `7` OR CURRENT_TIME <= `8` ) AND ( `7` < `8` AND CURRENT_TIME BETWEEN `7` AND `8` ) OR ( `7` > `8` AND ( CURRENT_TIME BETWEEN `7` AND '23:59:59' OR CURRENT_TIME BETWEEN '00:00:00' AND `8` ) ) OR ( `7` = '00:00:00' AND `8` = '00:00:00' ) AND ( CURRENT_DATE >= `start` AND CURRENT_DATE <= `end` ) AND `closeflg` = 0 ";
        }
    }

    echo "<br>";

    $stmt = $pdo->query($sql);

    foreach ($stmt as $row) {

        $js[] = [$row["content_no"], $row["address"], $row["name"]];
    }

    $jsjson = json_encode($js);

    // エラー（例外）が発生した時の処理を記述
} catch (PDOException $e) {

    // エラーメッセージを表示させる
    echo 'データベースにアクセスできません！' . $e->getMessage();

    // 強制終了
    exit;
}

$apikey = "AIzaSyBXqVRTnTo7lG4owMiUXxeER3aU7XBUMGA";
?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <link rel="shortcut icon" href="top.png">
    <style>
        body {
            background-color: lightblue;
            text-align: center;
            font-weight: bold;
            width: 800px;
            margin-right: auto;
            margin-left: auto;
        }

        #maps {
            height: 700px;
        }

        .img {
            width: 100%;
            height: 100px;
        }


        .button {
            font-size: 1em;
            font-weight: bold;
            padding: 5px 30px;
            border: 2px solid black;
            width: 200px;
            margin-bottom: 1px;
        }

        .button:hover {
            color: red;
            border: 2px solid red;

        }
    </style>
</head>

<body onload="test()">
    <a href="top.php"><img src="top2.png" class="img"></a><br>
    <div id="maps"></div><br>
    <input type="button" onclick="history.back()" class="button" value="戻る">
    <script src="https://maps.googleapis.com/maps/api/js?key=<?php echo $apikey ?>"></script>
    <script>
        function test() {
            navigator.geolocation.getCurrentPosition(initMap);
        }

        function initMap(position) {
            var a = position.coords.latitude;
            var b = position.coords.longitude;

            var mapPosition = {
                lat: a,
                lng: b
            }
            var mapArea = document.getElementById('maps');
            var mapOptions = {
                center: mapPosition,
                zoom: 16,
            };
            var map = new google.maps.Map(mapArea, mapOptions);

            new google.maps.Marker({
                map: map,
                position: mapPosition,
                icon: {
                    fillColor: "blue", //塗り潰し色
                    fillOpacity: 0.8, //塗り潰し透過率
                    path: google.maps.SymbolPath.CIRCLE, //円を指定
                    scale: 16, //円のサイズ
                    strokeColor: "#FF0000", //枠の色
                    strokeWeight: 1.0 //枠の透過率
                },
                label: {
                    text: '現', //ラベル文字
                    color: '#FFFFFF', //文字の色
                    fontSize: '20px' //文字のサイズ
                }
            });

            var php = JSON.parse('<?php echo $jsjson; ?>'); //jsonをparseしてJavaScriptの変数に代入

            php.forEach(function(value) {
                getIdoKeido(value[1], map, value[2]);
            });
        }

        function getIdoKeido(addressInput, map, name) {

            //Google Maps APIのジオコーダを使います。
            var geocoder = new google.maps.Geocoder();

            //ジオコーダのgeocodeを実行します。
            //第１引数のリクエストパラメータにaddressプロパティを設定します。
            //第２引数はコールバック関数です。取得結果を処理します。
            geocoder.geocode({
                    address: addressInput
                },
                function(results, status) {

                    var idokeido = "";

                    if (status == google.maps.GeocoderStatus.OK) {
                        //取得が成功した場合

                        //結果をループして取得します。
                        for (var i in results) {
                            if (results[i].geometry) {

                                //緯度を取得します。
                                var ido = results[i].geometry.location.lat();
                                //経度を取得します。
                                var keido = results[i].geometry.location.lng();

                                idokeido += "■緯度：" + ido + "\n　経度：" + keido + "\n";
                            }
                        }
                    } else if (status == google.maps.GeocoderStatus.ZERO_RESULTS) {
                        //alert("住所が見つかりませんでした。");
                    } else if (status == google.maps.GeocoderStatus.ERROR) {
                        alert("サーバ接続に失敗しました。");
                    } else if (status == google.maps.GeocoderStatus.INVALID_REQUEST) {
                        alert("検索条件に合う施設が見つかりませんでした。");
                    } else if (status == google.maps.GeocoderStatus.OVER_QUERY_LIMIT) {
                        //alert("リクエストの制限回数を超えました。");
                    } else if (status == google.maps.GeocoderStatus.REQUEST_DENIED) {
                        alert("サービスが使えない状態でした。");
                    } else if (status == google.maps.GeocoderStatus.UNKNOWN_ERROR) {
                        alert("原因不明のエラーが発生しました。");
                    }
                    var mapPosition = {
                        lat: ido,
                        lng: keido
                    }

                    var marker = new google.maps.Marker({
                        map: map,
                        position: mapPosition,

                    });

                    google.maps.event.addListener(marker, 'click', (function(url) {
                        return function() {
                            location.href = "https://www.google.com/maps/search/?api=1&query=" + addressInput;
                        };
                    })("https://www.google.com/maps/search/?api=1&query=" + addressInput));

                    var infoWindow = new google.maps.InfoWindow({ // 吹き出しの追加
                        content: name // 吹き出しに表示する内容
                    });
                    marker.addListener('mouseover', function() { // マーカーをクリックしたとき
                        infoWindow.open(map, marker); // 吹き出しの表示
                    });

                })
        }
    </script>
</body>

</html>