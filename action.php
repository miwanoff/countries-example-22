<?php
include "db.php";

// function check_autorize($log)
// {
//     global $users;
//     return array_key_exists($log, $users);
// }

function check_autorize($log, $pas) {
    global $users;
    return array_key_exists($log, $users) && $pas == $users[$log];
}

function check_admin($log, $pas)
{
    global $users;
    return array_key_exists($log, $users) && $pas == $users["admin"];
}

// function check_log($log)
// {
//     return $log == "admin";
// }