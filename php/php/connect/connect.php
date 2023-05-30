<?php
    $host = "localhost";
    $user = "plove13";
    $pw = "a!QAZ2wsx";
    $db = "plove13";
    $connect = new mysqli($host, $user, $pw, $db);
    $connect -> set_charset("utf-8");

    if(mysqli_connect_errno()){
        echo "Database Connect false";
    } else {
        // echo "Database Connect True";
    };
?>