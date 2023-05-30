<?php
    include "../connect/connect.php";
    include "../connect/session.php";

    $youPass = $_POST['youPass'];
    $youPassC = $_POST['youPassC'];
    $youID = $_POST['youID'];

    $sql = "UPDATE member SET youPass = '{$youPass}' WHERE youID = '{$youID}'";

    $connect -> query($sql);
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=r, initial-scale=1.0">
    <title>비밀번호 찾기 완료 페이지</title>
    
    
    <style>
        @import url('https://webfontworld.github.io/sandbox/SBAggro.css');
        * {
            margin: 0;
            padding: 0;
        }

        body {
            margin: 0 auto;
            font-family: 'SBAggro';
        }
        img {
            vertical-align: top;
            width: 100%;
        }
        #wrap {
            width: 100%;
            padding-top: 10%;
        }
        .container {
            width: 800px;
            margin: 0 auto;
        }
        #main {
            width: 100%;
            max-width: 500px;
            margin: 0 auto;
            padding: 10vh 6vw;
            text-align: center;
            font-family: 'SBAggro';
            border: 1px dotted #D9D9D9;
            background-color: antiquewhite;
            border-radius: 20px;
        }
        .logo {
            text-align: center;
            padding: 0 0 50px 0;
        }
        .logo img {
            width: 220px;
        }
        #main .h1 {
            font-size:40px;
            margin-bottom: 50px;
            font-weight:100;
            color: #227e16;
        }
        #main .p{
            font-size: 25px;
            margin-bottom: 60px;
            line-height: 1.5;
            font-weight: 300;
            color: #227e16;
        }
        #main a {
            font-size: 26px;
            text-decoration: none;
            color: #fff;
            border: 1px solid #FFAD7F;
            background-color: #FFAD7F;
            padding: 20px 62px;
            border-radius: 10px;
            font-weight: lighter;
        }

        /* 미디어 쿼리 */
        @media (max-width : 1200px) {
            #main {
                width: 96%;
            }
        }
    </style>
</head>
<body>
    <div id="wrap">
        <div class="container">
            <main id="main">
                <div class="logo"><img src="../../assets/img/logo.png" alt=""></div>
                <div class="h1">비밀번호 변경 완료</div>
                <div class="p">비밀번호가 정상적으로 변경되었습니다.
                </div>
                <a href="../login/login.php">로그인 화면으로</a>
            </main>
        </div>
    </div>
</body>
</html>