<head>
    <link rel="stylesheet" href="ghost.css">
</head>

<?php 
session_start();
include 'config/db.php';

$id = (int)$_GET['id'];
$sql = "SELECT * FROM posts WHERE id = $id";
$result = mysqli_query($connect, $sql);
$post = mysqli_fetch_assoc($result);

if(!$post){
    die("존재하지 않는 글입니다.");
}
if($post['user_id'] != $_SESSION['user_id']){
    die("수정 권한이 없습니다.");
}

?>
<h1>기록 수정</h1>

<form action="/update_action.php" method="post">
    <div class="form-container">

        <label for="title">제목</label>
        <input
            type="text"
            name="title"
            id="title"
            value="<?= htmlspecialchars($post['title']) ?>"
        >

        <label for="content">내용</label>
        <textarea
            name="content"
            id="content"><?= htmlspecialchars($post['content']) ?></textarea>

        <input type="hidden" name="id" value="<?= $post['id'] ?>">

        <div class="button-wrap">
            <input type="submit" value="수정하기" class="button">
        </div>

    </div>
</form>