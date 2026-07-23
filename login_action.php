<?php

session_start();

include 'config/db.php';
$username = $_POST['username'];
$password = $_POST['password'];
$sql = "SELECT * FROM users WHERE username='$username'";

$result = mysqli_query($connect, $sql);
$row = mysqli_fetch_assoc($result);
if($password == $row['password']){
    echo "<script>alert('로그인 성공'); location.href='/index.php';</script>";

    session_start();
    $_SESSION['username'] = $row['username'];
    $_SESSION['user_id'] = $row['id'];
}






?>