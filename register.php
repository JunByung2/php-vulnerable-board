<?php
include 'components/header.php';
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <link rel="stylesheet" href="ghost.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>회원가입</title>
  </head>
  <body>
    <h1>회원가입</h1>
    <form action="/register_action.php" method="post">
      <div class="form-container">
      <div>
        <label for="username">아이디</label>
        <input type="text" name="username" placeholder="아이디를 입력하세요" />
      </div>
      <div>
        <label for="name">이름</label>
        <input type="text" name="name" placeholder="이름을 입력하세요" />
      </div>
      <div>
        <label for="password">비밀번호</label>
        <input type="password" name="password" placeholder="비밀번호를 입력하세요" />
      </div>
      <div>
        <label for="birth">생년월일</label>
        <input type="number" name="birth" placeholder="ex)19990314" />
      </div>
      <div>
        <label for="email">이메일</label>
        <input type="email" name="email" placeholder="이메일을 입력하세요" />
      </div>
      <input type="submit" value="회원가입" class="button" />
</div>
    </form>
  </body>
</html>