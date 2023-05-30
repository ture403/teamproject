<?php
    include "../connect/session.php";

    unset($_SESSION['memberID']);
    unset($_SESSION['youID']);
    unset($_SESSION['youName']);
    unset($_SESSION['youNick']);

    Header("Location: ../main/main.php");
?>