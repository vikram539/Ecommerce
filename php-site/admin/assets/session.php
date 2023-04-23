<?php
    $_SESSION['admin-login'];
    $_SESSION['login-user'];

    if($_SESSION['admin-login'] == "" AND $_SESSION['login-user'] == ""){
    session_unset();
        if(session_destroy()){
            header("Location: login.php");
        }
    }
?>