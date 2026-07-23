<?php 
session_start();
$title = $_POST['title'];
$content = $_POST['content'];
include 'config/db.php';
$sql = "UPDATE posts SET title = '$title', content = '$content', updated_at = NOW() WHERE id = {$_POST['id']}";
$result = mysqli_query($connect, $sql);
if($result){
    echo "<script>
            alert('수정되었습니다.');
            location.href='read.php?id={$_POST['id']}';
          </script>";
}else{
    echo "<script>
            alert('수정 실패');
            history.back();
          </script>";}

?>
