<?php

include 'components/header.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<head>
    <title>기록 작성</title>
    <link rel="stylesheet" href="ghost.css">
</head>

<h1>기록 작성</h1>

<form action="/write_action.php" method="post">
    <div class="form-container">

        <label for="title">제목</label>
        <input
            type="text"
            id="title"
            name="title"
            placeholder="제목을 입력하세요"
        />

        <label for="content">내용</label>
        <textarea
            id="content"
            name="content"
            placeholder="내용을 입력하세요"
        ></textarea>

        <div class="button-wrap">
            <input
                type="submit"
                value="기록 등록"
                class="button"
            />
        </div>

    </div>
</form>