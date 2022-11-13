<?php
include "header.php";
include "action.php";

if (isset($_POST["go"])) {
    $login = $_POST["login"];
    $password = $_POST["pass"];
    if (check_autorize($login, $password)) {
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

// $out = out_arr();

// if (count($out) > 0) {
//     foreach ($out as $row) {
//         echo $row;
//     }
// } else {
//     echo "Нет данных...";
// }

$str_form_s = '<h3>Сортировать по:</h3>
<form action="index.php" method="post" name="sort_form">
<select name="sort" id="sort" size="1">
    <option value="name">названию</option>
    <option value="area">площади</option>
    <option value="population">среднему населению</option>
</select>
<input type="submit" name="submit" value="OK">
</form>';
echo $str_form_s;

if (isset($_POST['sort'])) {
    $how_to_sort = $_POST['sort'];
    sorting($how_to_sort);
}

$out = out_arr();

if (count($out) > 0) {
    foreach ($out as $row) {
        echo $row;
    }
} else {
    echo "Нет данных...";
}

$str_form_search = "<h3>Поиск:</h3>
			<form  name='searchForm' action='index.php' method='post' onSubmit='return overify_login(this);' >
 			 <input type='text' name='search'>
 			 <input type='submit' name='gosearch' value='Подтвердить'>
 			 <input type='submit' name='clear' value='Сбросить'>
 		     </form>";

echo $str_form_search;

if (isset($_POST['gosearch'])) {
    $data = test_input($_POST['search']);
    $out = out_search($data);

// вызов функции out_arr() из action.php для получения массива
    if (count($out) > 0) {
        foreach ($out as $row) { //вывод массива построчно
            echo $row;
        }
    } else // если нет данных
    {
        echo "Ничего не найдено...";
    }
}