<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>로그인 페이지</title>

    <!-- CSS -->
    <link rel="stylesheet" href="../../assets/css/style.css">
    <style>
        body {
            overflow:hidden;
        }
        #youIDComment {
            color: red;
            text-align: left;
            font-size: 14px;
        }
        #youPwComment {
            color: red;
            text-align: left;
            font-size: 14px;
        }
        .banner img {
            cursor: pointer;
        }
    </style>
    
</head>
<body>
    <div id="skip">
        <a href="#header">헤더 영역 바로가기</a>
        <a href="#main">컨텐츠 영역 바로가기</a>
        <a href="#footer">푸터 영역 바로가기</a>
    </div>
    <!-- //skip -->
    <main id="main" class="container mt150">
        <div class="login_inner">
            <div class="banner"><img onclick="window.location.href = '../main/main.php'" src="../../assets/img/logo.png" alt="배너이미지"></div>
            <div class="login_form">
                <form action="loginSave.php" name="loginSave" method="post">
                    <fieldset>
                        <legend class="blind">로그인하기</legend>
                        <div>
                            <label for="youID" class="blind">아이디</label>
                            <input type="text" id="youID" name="youID" class="inputStyle"   placeholder="아이디" required>
                            <p class="msg" id="youIDComment"></p>
                        </div>
                        <div>
                            <label for="youPass" class="blind">비밀번호</label>
                            <input type="password" id="youPass" name="youPass" class="inputStyle" placeholder="비밀번호" required>
                            <p class="msg" id="youPwComment"></p>
                        </div>
                        <button type="button" class="button" onclick="pwChecking()">로그인</button>
                    </fieldset>
                </form>
            </div>
            <div class="login_footer">
                <ul class="listStyle">
                    <li><a href="../join/join.php">회원가입</a></li>
                    <li><a href="loginFind.php">아이디 찾기</a></li>
                    <li><a href="pwFind.php">비밀번호 찾기</a></li>
                </ul>
            </div>
        </div>
    </main>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        let isIDCheck = false;
        let isPwCheck = false;

        function pwChecking(){
            let youPw = $("#youPass").val();
            let youID = $("#youID").val();
            if(youPw == null || youPw == ''){
                $("#youPwComment").text("* 비밀번호를 입력해주세요.");
            }else {
                $.ajax({
                    type : "POST",
                    url : "loginCheck.php",
                    data : {"youPw" : youPw, "youID" : youID,  "type" : "isPwCheck"},
                    dataType : "json",
                    success : function(data){
                        if(data.result == "good"){
                            $("#youPwComment").text("* 비밀번호가 일치하지 않습니다.");
                        }else {
                            document.loginSave.submit();
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

        function IDChecking(){
            let youID = $("#youID").val();
            if(youID == null || youID == ''){
                $("#youIDComment").text("* 아이디를 입력해주세요");
            }else {
                $.ajax({
                    type : "POST",
                    url : "loginCheck.php",
                    data : {"youID" : youID, "type" : "isIDCheck"},
                    dataType : "json",
                    success : function(data){
                        if(data.result == "good"){
                            $("#youIDComment").text("* 존재하지 않는 아이디입니다.");
                        }else {
                            $("#youIDComment").text("");
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

        document.querySelector("#youID").addEventListener("focusout", IDChecking);
        // document.querySelector("#youPass").addEventListener("keyup", pwChecking);
    </script>
</body>
</html>