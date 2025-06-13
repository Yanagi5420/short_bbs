<?php
    session_start();
    $pdo=new PDO('mysql:host=mysql320.phy.lolipop.lan;dbname=LAA1554902-shortbbs;charset=utf8','LAA1554902','Short1234');
    $sql=$pdo->prepare('select * from users where user_name=? and password=?');
    $sql->execute([$_POST['user_name'],$_POST['pw']]);
    foreach($sql as $row){
       $_SESSION['name']=$row['user_name'];
    }
    $pdo=null;
    header("Location: form.php");
    exit;
?>
