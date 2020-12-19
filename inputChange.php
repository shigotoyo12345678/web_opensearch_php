<?php

session_start();

if (isset($_POST["new"])) {
    header("Location:input.php");
} else if (isset($_POST["change"])) {
    header("Location:upSearch.php");
}
