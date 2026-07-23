<?php
session_start();

include 'config/db.php';

$username = $_POST['username'];
$name = $_POST['name'];
$password = $_POST['password'];
$email = $_POST['email'];
$birth = $_POST['birth'];

$sql0 ="SELECT COUNT(*) AS same FROM users WHERE username='$username'";
$result0 = mysqli_query($connect, $sql0);
$row0 = mysqli_fetch_assoc($result0);

if($row0['same'] > 0){
  echo "<script>alert('이미 존재하는 아이디입니다.'); history.back();</script>";
  exit;
}



$sql = "INSERT INTO users (username, name, password, email, birthdate) VALUES ('$username', '$name', '$password', '$email', '$birth')";
$result = mysqli_query($connect, $sql);

if($result){
    
  echo "<script>alert('회원가입이 완료되었습니다.'); location.href='/login.php';</script>";
}else{
  echo "<script>alert('회원가입에 실패했습니다.'); history.back();</script>";
}




?>