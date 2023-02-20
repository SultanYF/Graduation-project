<?php
    if(!isset($_SESSION['login_username'])){
        header("location:login.php");
        die();
    }
?>