<?php
    session_start();
    $hostName = "localhost";
    $userName = "root";
    $PassName = "";
    $dbName = "magill-pet";
    $conn = mysqli_connect($hostName, $userName, $PassName, $dbName );
    if(!$conn){
        die("Server Connection Error:".mysqli_connect_error());
        exist();
    }
?>