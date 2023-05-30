<?php
    include "../connect/connect.php";
    include "../connect/session.php";

    $youEmail = $_POST['youEmail'];
    $youID = $_POST['youID'];
    $youName = $_POST['youName'];
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../assets/css/style.css">
    <link href="https://webfontworld.github.io/score/SCoreDream.css" rel="stylesheet">
    <link rel="stylesheet" href="../../assets/css/login.css">

    <style>
        .msg {
            color: red;
            text-align: left;
            font-size: 14px;
        }
    </style>
</head>
<body>
    
    <main id="main" class="container ">
        <div class="login_inner">
            <div class="banner"><img src="../../assets/img/logo.png" alt="배너이미지"></div>
            <p>재설정할 비밀번호를 입력해주세요.</p>
            <div class="login_form">
                <form action="pwfindResult.php" name="pwfind" method="post" onsubmit="return pwChecks()">
                    <fieldset>
                        <legend class="blind">아이디 찾기</legend>
                        <div>
                            <label for="youPass">새 비밀번호</label>
                            <input type="password" id="youPass" name="youPass"placeholder="비밀번호를 입력해 주세요" required>
                            <p class="msg" id="youPassComment"></p>
                        </div>
                        <div>
                            <label for="youPass">새 비밀번호 확인</label>
                            <div class="code_inner">
                                <input type="password" id="youPassC" name="youPassC" placeholder="비밀번호를 입력해 주세요" required>
                                <!-- <a href="#">확인</a > -->
                            </div>
                            <p class="msg" id="youPassCComment"></p>
                        </div>
                        <form action="pwfindResult.php" method="post">
                            <input type="text" id="youID" name="youID" value="<?= $youID ?>" style="display:none">
                        </form>
                        <button type="submit" class="button">비밀번호 변경</button>
                    </fieldset>
                </form>
            </div>
        </div>
        
    </main>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    
    <script>
        function pwChecks(){
            //비밀번호 유효성 검사
            if($("#youPass").val() == ''){
                $("#youPassComment").text("* 비밀번호를 입력해주세요");
                $("#youPass").focus();
                return false;
            }
            //8~20자 이내, 공백X, 영문, 숫자, 특수문자
            let getYouPass = $("#youPass").val();
            let getYouPassNum = getYouPass.search(/[0-9]/g);
            let getYouPassEng = getYouPass.search(/[a-z]/ig);
            let getYouPassSpe = getYouPass.search(/[`~!@@#$%^&*|₩₩₩'₩";:₩/?]/gi);
            if(getYouPass.length < 8 || getYouPass.length > 20){
                $("#youPassComment").text("8자리 ~ 20자리 이내로 입력해주세요~");
                return false;
            } else if (getYouPass.search(/\s/) != -1){
                $("#youPassComment").text("비밀번호는 공백없이 입력해주세요!");
                return false;
            } else if (getYouPassNum < 0 || getYouPassEng < 0 || getYouPassSpe < 0 ){
                $("#youPassComment").text("영문, 숫자, 특수문자를 혼합하여 입력해주세요!");
                return false;
            }
            //비밀번호 확인 유효성 검사
            if($("#youPassC").val() == ''){
                $("#youPassCComment").text("* 확인 비밀번호를 입력해주세요");
                $("#youPassC").focus();
                return false;
            }
            //비밀번호 일치 체크
            if($("#youPass").val() !== $("#youPassC").val()){
                $("#youPassCComment").text("* 비밀번호가 일치하지 않습니다.");
                return false;
            }
        };
    </script>
</body>
</html>