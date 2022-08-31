<?php
    require 'nav.php';
    if(!isset($_SESSION['login']) || $_SESSION['login']!=true){
        header("location:index.php");
        exit;
    }
?>

Welcome <?php echo $_SESSION['uname']; ?>