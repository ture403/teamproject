<?php
    include "../connect/connect.php";

    $youEmail = $_POST['youEmail'];
    $youID = $_POST['youID'];
    $youName = $_POST['youName'];
    $youNick = $_POST['youNick'];
    $youPass = $_POST['youPass'];
    $youPassC = $_POST['youPassC'];
    $youPhone = $_POST['youPhone'];
    $youAge = $_POST['youAge'];
    $youSex = $_POST['youGender'];
    $regTime = time();

    // echo $youEmail,$youID,$youName,$youPass,$youPhone,$youAge,$youSex;

    $sql = "INSERT INTO member(youEmail, youNick, youID, youName, youPass, youPhone, youAge, youSex, regTime) VALUES('$youEmail', '$youNick', '$youID', '$youName', '$youPass', '$youPhone', '$youAge', '$youSex', '$regTime')";
    $connect -> query($sql);

    // 사용자가 데이터 입력 -> 유효성 검사 -> 통과 -> 회원가입(쿼리문전송)
    // 사용자가 데이터 입력 -> 유효성 검사 -> 통과(이메일주소/핸드폰)(O) -> 회원가입(쿼리문전송)
    // 사용자가 데이터 입력 -> 유효성 검사 -> 통과(X) -> 회원가입(쿼리문전송)
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=r, initial-scale=1.0">
    <title>Document</title>
    
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
            padding-top: 5%;
        }
        .container {
            width: 800px;;
            margin: 0 auto;
        }
        #main {
            padding: 10vh;
            /* background-color: #dff5bb3e; */
            text-align: center;
            border-radius: 10px;
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
                <div class="h1">회원가입 완료</div>
                <div class="p">온리포유 회원이 되신 것을 환영합니다.<br>
                    로그인 후 편리하고 안전하게 서비스를 이용할수 있습니다.
                </div>
                <a href="../login/login.php">로그인 화면으로</a>
            </main>
        </div>
    </div>
</body>
</html>