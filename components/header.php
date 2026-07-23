<?php
session_start();
?>

<header class="header">
<a href="index.php" class="logo">게시판</a>    
<?php if (isset($_SESSION['username'])): ?><p style="margin-right: 10px;">
    <?= htmlspecialchars($_SESSION['username']) ?>님 반갑습니다</p>
    <a href="logout.php" class="somebtn">로그아웃</a>
<?php else: ?>
    <a href="login.php" class="somebtn">로그인</a>
    <a href="register.php" class="somebtn">회원가입</a>
<?php endif; ?>
</header>