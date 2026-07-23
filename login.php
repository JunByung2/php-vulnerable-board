
<?php
include 'components/header.php';
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <link rel="stylesheet" href="ghost.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>입장,,</title>
  </head>
  <body>
    <h1>입장 하시겠습니까?</h1>
    <form action="/login_action.php" method="post">
      <div class="form-container">
        <label for="username">아이디</label>
        <input type="text" name="username" placeholder="아이디" /><br />
        <label for="password">비밀번호</label>
        <input type="password" name="password" placeholder="비밀번호" /><br />
        <input type="submit" value="로그인" class="button" />
      </div>
    </form>

  </body>
</html>
