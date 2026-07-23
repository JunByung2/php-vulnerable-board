<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="ghost.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>**열어보지 마십시오**</title>
</head>
<body>
    <?php include 'components/header.php'; ?>
    <h1>열람 금지</h1>
    <p>운영진은 존재하지 않습니다</p>
    <?php 
    if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

    $search_type = $_GET['search_type'] ?? 'title';
    $keyword = $_GET['keyword'] ?? '';

    include 'config/db.php';
    $sql = "SELECT COUNT(*) FROM posts";
    $result = mysqli_query($connect, $sql);
    $row = mysqli_fetch_assoc($result);
    $total = $row['COUNT(*)'];
    $per_page = 15;
    if ($total % $per_page ==0){
        $page_num = intdiv($total, $per_page);
    } else {
        $page_num = intdiv($total, $per_page) + 1;
    }

    $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;

    if ($page < 1){
        $page = 1;
    }

    $start = (($page - 1) * $per_page);

    if($keyword== ''){
        $sql2 = "SELECT posts.id, posts.user_id, posts.title, posts.view_count, users.username FROM posts JOIN users ON posts.user_id = users.id ORDER BY posts.id DESC LIMIT $start, $per_page";
    } else {
        $sql2 = "SELECT posts.id, posts.user_id, posts.title, posts.view_count, users.username FROM posts JOIN users ON posts.user_id = users.id WHERE $search_type LIKE '%{$keyword}%' ORDER BY posts.id DESC LIMIT $start, $per_page";
    }
    $result2 = mysqli_query($connect, $sql2);
?>
<form action="/index.php" method="get" class="search-form">
    <select class="button" name="search_type">
        <option value="title">제목</option>
        <option value="username">작성자</option>
        <option value="content">내용</option>
        <option value="id">번호</option>
    </select>
    <input class="search-input" type="text" name="keyword">
    <input class="button" type="submit" value="검색">
</form>
    <table>
        <tr>
            <td>번호</td>
            <td>제목</td>
            <td>작성자</td>
            <td>조회수</td>
        </tr>

        <?php while($row2 = mysqli_fetch_assoc($result2)) { ?>
        <tr>
            <td><?= $row2['id'] ?></td>
            <td><a href="/read.php?id=<?= $row2['id'] ?>"><?= $row2['title'] ?></a></td>
            <td><?= $row2['username'] ?></td>
            <td><?= $row2['view_count'] ?></td>
        </tr>
        <?php } ?>      
        
    </table>
    <div class="pagination">
    <?php
    for($i = 1; $i <= $page_num; $i++){
        if($i == $page){
            echo "<a href='/index.php?page={$i}&search_type={$search_type}&keyword={$keyword}' class='page-btn active'>{$i}</a>";
        } else {
            echo "<a href='/index.php?page={$i}&search_type={$search_type}&keyword={$keyword}' class='page-btn'>{$i}</a>";
        }
    }?>
    </div>
<?php
if(isset($_SESSION['username'])){
        ?>
        <div class="button-wrap">
            <a href="/write.php" class="button">글 작성</a>
        </div>
        <?php } ?>
    




    
</body>
</html>



