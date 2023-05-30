<?php
    include "../connect/connect.php";
    include "../connect/session.php";

    $memberID = $_SESSION["memberID"];
    $youPass = $_POST["youPass"];
    $sql = "DELETE FROM member WHERE memberid ='$memberID' AND youpass ='$youPass'";
    $connect->query($sql);
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../assets/css/style.css">
    <title>요리방</title>
    <style>
        .mypageWithdrawOk{
            margin-top: 100px;
            min-height: 800px;
        }
        .mypageWithdrawOk .container{
            padding: 200px 0 300px;
            text-align: center;
        }
        .mypageWithdrawOk h1 {
            font-size: 40px;
            color: #227E16;
        }
        .mypageWithdrawOk p {
            font-size: 30px;
            color: #747474;
            margin-top: 90px;
            color: #227E16;
        }
        .mypageWithdrawOk .mypage_button {
            margin-top: 100px;
        }
        .mypage_button {
            display: flex;
            justify-content: center;
        }
        .mypage_button a {
            display: block;
            width: 30% ;
            height: 6vh;
            line-height: 6vh;
            font-size: 1.25em;
            background-color: #ffad7f;
            border-radius: 10px;
            font-weight: 500;
            color: #fff;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <?php include "../include/header.php" ?>
    <main id="main">
        <div class="mypageWithdrawOk">
            <div class="container">
                <h1>회원탈퇴 완료</h1>
                <p>그동안 온리포유를 사용해 주셔서 감사합니다. <br> 더 나은 서비스로 찾아뵙겠습니다.</p>
                <div class="mypage_button">
                    <a href="return.php" class="button1">홈으로</a>
                </div>
            </div>
        </div>
    </main>
</body>
</html>