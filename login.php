<?php session_start();
$_SESSION = array();
session_destroy();?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>一言掲示板 - ログイン</title>
</head>
<body>
    <h1>ログイン</h1>
    <form action="check.php" method="post">
        <p>ユーザー名：<input type="text" name="user_name" required></p>
        <p>パスワード：<input type="password" name="pw" required></p>
        <p><button type="submit">ログイン</button></p>

        <p>(ユーザー名：テスト パスワード：test1234)</p>
    </form>
</body>
</html>