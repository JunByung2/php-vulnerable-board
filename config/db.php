<?php

$db_host = "localhost";
$db_user = "root";
$db_pass = "root";
$db_name = "php_web_board";

$connect = mysqli_connect(
    $db_host,
    $db_user,
    $db_pass,
    $db_name
);

if (!$connect) {
    die("DB 연결 실패");
}