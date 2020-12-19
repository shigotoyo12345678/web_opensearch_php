<?php
session_cache_limiter('private_no_expire');
session_start();

//施設詳細
if (isset($_POST["number"])) {
    $_SESSION["number"] = $_POST["number"];
    header("Location:facilityDetail.php");
    //マップ
} else if (isset($_POST["map_x"])) {
    header("Location:map.php");
    //施設詳細変更
} else if (isset($_POST["change"])) {
    $_SESSION["number"] = $_POST["change"];
    header("Location:upInput.php");
}

var_dump($_POST);
