<head>
    <link rel="stylesheet" href="ghost.css">
    <title>문서 열람</title>
</head>

<?php
include 'components/header.php'; ?>

<?php
include 'config/db.php';
$num = $_GET['id'];
$num = (int)$_GET['id'];

$update_sql = "UPDATE posts SET view_count = view_count + 1
WHERE id = $num
";

mysqli_query($connect, $update_sql);

$sql = "SELECT posts.*, users.username FROM posts JOIN users ON posts.user_id = users.id WHERE posts.id = $num";

$result = mysqli_query($connect, $sql);
$row = mysqli_fetch_assoc($result);
?>
<div class="post-container">
    <h1><?= htmlspecialchars($row['title']) ?></h1>

    <div class="post-info">
        <span>작성자 : <?= htmlspecialchars($row['username']) ?></span>
        <span>조회수 : <?= $row['view_count'] ?></span>
        <span>작성일 : <?= $row['created_at'] ?></span>
    </div>

    <div class="post-content">
        <?= nl2br(htmlspecialchars($row['content'])) ?>
    </div>

    <div class="button-wrap">
        <a href="/index.php" class="button">돌아가기</a>

        <?php if (
            isset($_SESSION['user_id']) &&
            $_SESSION['user_id'] == $row['user_id']
        ): ?>
            <a href="/update.php?id=<?= $row['id'] ?>" class="button">수정</a>

            <a href="/delete.php?id=<?= $row['id'] ?>"
               class="button"
               onclick="return confirm('흔적을 제거 하시겠습니까?')">
                흔적 제거
            </a>
        <?php endif; ?>
    </div>
</div>