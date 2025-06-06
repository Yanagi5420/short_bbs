<?php
    $pdo=new PDO('mysql:host=mysql304.phy.lolipop.lan;dbname=LAA1554872-php2024;charset=utf8','LAA1554872','Pass1005');
    $sql=$pdo->prepare('select * from user where mail=? and password=?');
    $sql->execute([$_POST['mail'],$_POST['pw']]);
    foreach($sql as $row){
       $_SESSION['mail']=$row['mail'];
       $_SESSION['name']=$row['user_name'];
    }
    $pdo=null;
    header("Location: form.php");
    exit;
?>