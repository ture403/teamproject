<?php
    include "../connect/connect.php";
    include "../connect/session.php";

    
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>아이디찾기</title>
    <link rel="stylesheet" href="../../assets/css/style.css">
    <link href="https://webfontworld.github.io/score/SCoreDream.css" rel="stylesheet">
    <link rel="stylesheet" href="../../assets/css/login.css">

    <style>
        #youFindComment {
            color: red;
            text-align: left;
            font-size: 14px;
        }
    </style>
</head>
<body>
    
    <main id="main" class="container ">
        <div class="login_inner mt150">
            <div class="banner"><img src="../../assets/img/logo.png" alt="배너이미지"></div>
            <p>아이디를 찾기 위한 정보를 입력해주세요</p>
            <div class="login_form">
                <form action="loginfindResult.php" name="loginfind" method="post">
                    <fieldset>
                        <legend class="blind">아이디 찾기</legend>
                        <div>
                            <label for="youName">이름</label>
                            <input type="text" id="youName" name="youName" class="inputStyle"   placeholder="이름" required>
                        </div>
                        <div>
                            <label for="youEmail">이메일</label>
                            <input type="email" id="youEmail" name="youEmail" class="inputStyle" placeholder="이메일" required>
                            <p class="msg" id="youFindComment"></p>
                        </div>
                        <button type="button" class="button" onclick="infoChecking()">아이디 찾기</button>
                    </fieldset>
                </form>
            </div>
        </div>
        
    </main>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        let isFindCheck = false;

        function infoChecking(){
            let youName = $("#youName").val();
            let youEmail = $("#youEmail").val();
            if(youName == null || youEmail == null){
                $("#youFindComment").text("* 이름과 이메일을 모두 입력해주세요");
            }else {
                $.ajax({
                    type : "POST",
                    url : "findCheck.php",
                    data : {"youName" : youName, "youEmail" : youEmail, "type" : "isFindCheck"},
                    dataType : "json",
                    success : function(data){
                        if(data.result == "good"){
                            $("#youFindComment").text("* 이름과 이메일이 일치하지 않습니다.");
                        }else {
                            document.loginfind.submit();
                        }
                    },
                    error : function(request, status, error){
                        console.log("request" + request);
                        console.log("status" + status);
                        console.log("error" + error);
                    }
                })
            }
        }
    </script>
</body>
</html>