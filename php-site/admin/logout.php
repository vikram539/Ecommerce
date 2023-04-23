<?php
    session_start();
    unset($_SESSION['admin-login']);
    unset($_SESSION['login-user']);
    if(session_destroy()){
        header("Location: login.php");
    }
?>