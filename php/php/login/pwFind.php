<?php
    include "../connect/connect.php";
    include "../connect/session.php";
?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>비밀번호 재설정</title>
    <link rel="stylesheet" href="../../assets/css/style.css">
    <link href="https://webfontworld.github.io/score/SCoreDream.css" rel="stylesheet">
    <link rel="stylesheet" href="../../assets/css/login.css">

    
</head>
<body>
    
    <main id="main" class="container ">
        <div class="login_inner">
            <div class="banner"><img src="../../assets/img/logo.png" alt="배너이미지"></div>
            <p>비밀번호를 재설정하기 위한 정보를 입력해 주세요</p>
            <div class="login_form">
                <form action="pwModify.php" name="pwFind" method="post">
                    <fieldset>
                        <legend class="blind">비밀번호 재설정</legend>
                        <div>
                            <label for="youName">이름</label>
                            <input type="text" id="youName" name="youName" placeholder="이름을 입력해주세요." required>
                        </div>
                        <div>
                            <label for="youID">아이디</label>
                            <input type="text" id="youID" name="youID" placeholder="아이디를 입력해주세요." required>
                        </div>
                        <div>
                            <label for="youEmail">이메일</label>
                            <input type="email" id="youEmail" name="youEmail"placeholder="이메일을 입력해주세요." required>
                            <p class="msg" id="youFindComment"></p>
                        </div>
                        <!-- <div>
                            <label for="youPass">인증코드</label>
                            <div class="code_inner">
                                <input type="email" id="youcode" name="youcode" placeholder="인증코드를 입력해주세요." required>
                                <a href="#">코드번호</a >
                            </div>
                        </div> -->
                        <button type="button" class="button" onclick="infoChecking()">비밀번호 재설정</button>
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
            let youID = $("#youID").val();
            let youEmail = $("#youEmail").val();

            if(youName == '' || youID == '' || youEmail == '' ||  youName == null || youID == null || youEmail == null){
                $("#youFindComment").text("* 이름과 아이디, 이메일을 모두 입력해주세요");
            }else {
                $.ajax({
                    type : "POST",
                    url : "pwfindCheck.php",
                    data : {"youName" : youName, "youID" : youID , "youEmail" : youEmail, "type" : "isFindCheck"},
                    dataType : "json",
                    success : function(data){
                        if(data.result == "good"){
                            $("#youFindComment").text("* 이름과 아이디, 이메일이 일치하지 않습니다.");
                        }else {
                            document.pwFind.submit();
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