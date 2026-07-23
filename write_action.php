<?php 
    session_start();
    include 'config/db.php';
    $title = $_POST['title'];
    $content = $_POST['content'];
    // $file = $_FILES['file'];
    $user_id = $_SESSION['user_id'];
    $sql = "INSERT INTO posts (user_id, title, content) VALUES ( '$user_id', '$title', '$content')";
    $result = mysqli_query($connect, $sql);
    if($result){
        echo "<script>alert('글 작성이 완료되었습니다.')</script>";
        echo "<script>location.href='/index.php';</script>";
    }else{
        echo "<script>alert('글 작성에 실패했습니다.')</script>";
        echo "<script>history.back();</script>";
    }




    



?>