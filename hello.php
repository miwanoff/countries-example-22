<?php
ob_start();
include "header.php";
include "action.php";
echo "\n<h2>Секретная информация</h2>\n";
if (isset($_GET['login']) && $_GET['login'] != "") {
    $admin = $_GET['login'];
    if (check_log("admin") == true) {
        echo "<p>Привет, $admin</p>";
        echo "<p>Сводка погоды</p>";
    }
} else {
    header("Location: index.php");
    ob_end_flush();
}
include "footer.php";