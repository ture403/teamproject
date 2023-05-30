<?php
    include "../connect/connect.php";
    include "../connect/session.php";

    $youID = $_POST['youID'];
    $youPass = $_POST['youPass'];

    // echo $youEmail, $youPass;

    // 데이터 출력
    function msg($alert){
        echo "<p class='intro__text'>$alert</p>";
    }

    // 데이터 조회
    $sql = "SELECT memberID, youID, youName, youPass, youNick, youEmail, youPhone, youSex, youAge FROM member WHERE youID = '$youID' AND youPass = '$youPass'";
    $result = $connect -> query($sql);
    if($result){
        $count = $result -> num_rows;
        if($count == 0){
            msg("아이디 또는 비밀번호가 틀렸습니다. 다시 한번 확인해주세요!<br><div class='intro__btn'><a href='../login/login.php'>로그인</a></div>");
        } else {
            // 로그인 성공
            $memberInfo = $result -> fetch_array(MYSQLI_ASSOC);

            // echo "<pre>";
            // var_dump($memberInfo);
            // echo "</pre>";

            // 세션 생성
            $_SESSION['memberID'] = $memberInfo['memberID'];
            $_SESSION['youID'] = $memberInfo['youID'];
            $_SESSION['youName'] = $memberInfo['youName'];
            $_SESSION['youNick'] = $memberInfo['youNick'];
            $_SESSION['youEmail'] = $memberInfo['youEmail'];
            $_SESSION['youPhone'] = $memberInfo['youPhone'];
            $_SESSION['youSex'] = $memberInfo['youSex'];
            $_SESSION['youAge'] = $memberInfo['youAge'];

            Header("Location: ../main/main.php");
        }
    }
?>