<?php
    session_start();
    session_unset();
    session_destroy();
    if(isset($_POST['destroy_session'])){
    header("Location: login.php");
    exit;    
}
?>