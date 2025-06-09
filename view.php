<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>一言掲示板 - 投稿一覧</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

    <?php
        // データベースに接続
        try {
            $pdo=new PDO('mysql:host=mysql320.phy.lolipop.lan;dbname=LAA1554902-shortbbs;charset=utf8','LAA1554902','Short1234');
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo '接続失敗: ' . $e->getMessage();
        }

        //全件取得
        $stmt = $pdo->query("SELECT user_id,content,create_at FROM comment");
        $comment = $stmt->fetchAll(PDO::FETCH_ASSOC);
    ?>

    <h1>📜 投稿一覧</h1>
    <p><a href="form.php">← 投稿フォームへ戻る</a></p>
    <hr>
    <?php
    if (!empty($comment)) {
        foreach ($comment as $comments) {
            echo "<div class='post'>";
            //user_idから名前を呼び出し
            $stmt = $pdo->query("SELECT user_name FROM users WHERE id = $comments[user_id]");
            $name = $stmt->fetch(PDO::FETCH_ASSOC);

            echo "<p><strong>$name[user_name]</strong>さん
            (".htmlspecialchars($comments['create_at']).")</p>";
            echo "<p>" . nl2br(htmlspecialchars($comments['content'])) . "</p>";
            echo "</div><hr>";
        }
    } else {
        echo "<p>まだ投稿がありません。</p>";
    }
    ?>
</body>
</html>
