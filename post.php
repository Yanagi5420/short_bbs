<?php
session_start();
// データベースに接続
try {
    $pdo=new PDO('mysql:host=mysql320.phy.lolipop.lan;dbname=LAA1554902-shortbbs;charset=utf8','LAA1554902','Short1234');
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo '接続失敗: ' . $e->getMessage();
}
$name=$_SESSION['name'];
$stmt = $pdo->prepare("SELECT id FROM users WHERE user_name = :user_name");
$stmt->bindValue(':user_name', $name, PDO::PARAM_STR);
$stmt->execute();
$user_data = $stmt->fetch(PDO::FETCH_ASSOC);
$user_id = $user_data['id'];

$content = htmlspecialchars($_POST['content'] ?? '');
//$time = date('Y-m-d H:i:s'); DBでデフォルト入力

/*if (trim($content) === '') {
    header("Location: form.php");
    exit;
}*/

$stmt = $pdo->prepare("INSERT INTO comment (user_id,content) VALUES (?,?)");
$stmt->execute([$user_id,$content]);

header("Location: view.php");
exit;
?>
