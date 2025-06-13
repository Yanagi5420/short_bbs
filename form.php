<?php
session_start();
if (!isset($_SESSION['name'])) {
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>一言掲示板 - 投稿</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h1>💬 一言掲示板</h1>
    <p>
    <?php
    if(isset($_SESSION['name'])){
        echo $_SESSION['name'],'さん、ようこそ！';
    }else{
    echo 'ユーザー名かパスワードが違います。';
    }
    ?>
    </p>
    <form action="post.php" method="post">
        <input type="hidden" name="name" value="<?= htmlspecialchars($_SESSION['name']) ?>">
        <p>コメント：<br>
        <textarea name="content" rows="4" cols="40" required></textarea></p>
        <p><button type="submit">投稿する</button></p>
    </form>
<p><a href="view.php">▶ 投稿一覧を見る</a></p>
<p><a href="logout.php">ログアウト</a></p>
</body>
</html>
