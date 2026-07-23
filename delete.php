<?php
session_start();

include 'config/db.php';

$id = (int)$_GET['id'];

$sql = "SELECT user_id FROM posts WHERE id = $id";
$result = mysqli_query($connect, $sql);
$post = mysqli_fetch_assoc($result);

if(!$post){
    die("존재하지 않는 글입니다.");
}

if($post['user_id'] != $_SESSION['user_id']){
    die("삭제 권한이 없습니다.");
}

$sql = "DELETE FROM posts WHERE id = $id";

if(mysqli_query($connect, $sql)){
    echo "<script>
            alert('삭제되었습니다.');
            location.href='index.php';
          </script>";
}else{
    echo "<script>
            alert('삭제 실패');
            history.back();
          </script>";
}
?>