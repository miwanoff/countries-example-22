<?php
include "header.php";
include "action.php";


if (isset($_POST["go"])) {
    $login = $_POST["login"];
    $password = $_POST["pass"];
    if (check_autorize($login)) {
        echo "Привет, $login!";
        if (check_admin($login, $password)) {
            echo "<a href='hello.php?login=$login'>Просмотр отчета</a>";
        }
    } else {
        echo "Вы не зарегистрированы!";
    }
}

echo "\n<h2>Главная страница</h2>\n";
$str_form = '<span id="massage"></span>
<form action="index.php" method="post" onsubmit="return verify(this)">
Логин: <input type="text" name="login">
Пароль: <input type="password" name="pass">
<input type="submit" value="OK" name="go">
</form>';
echo $str_form;