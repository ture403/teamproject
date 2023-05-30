<?php
    session_start(); // 세션 시작
    session_unset(); // 세션 변수 모두 제거
    session_destroy(); // 세션 종료
    
    // 홈페이지로 리다이렉트
    header("Location: ../main/main.php");
    exit;
?>