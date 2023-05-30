<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>회원가입 페이지</title>

    <!-- CSS -->
    <link rel="stylesheet" href="../../assets/css/style.css">
    <style>
        /* body {
            position: relative;
        } */
        form > .modal {
            position : fixed;
            left: 50%;
            top: 50%;
            transform : scale(0.8) translate(-65%, -70%);
            opacity: 0;
            box-shadow: 0 1px 15px rgba(116, 116, 116, 0.226);
            width: 1000px;
            display: none;
            justify-content: center;
            background-color: #f6f6f6;
            border-radius : 10px;
            transition : all 0.5s;
            z-index: -1000;
        }
        form > .modal.show {
            position : fixed;
            left: 50%;
            top: 50%;
            transform : scale(0.8) translate(-65%, -65%);
            opacity: 1;
            box-shadow: 0 1px 15px rgba(116, 116, 116, 0.226);
            width: 1000px;
            display: flex;
            justify-content: center;
            background-color: #f6f6f6;
            border-radius : 10px;
            z-index: 1000;
        }
        .name__wrap > div {
            position: relative;
        }
        .youCheck {
            position: absolute;
            right: -50px;
            bottom: -30px;
            display: inline-block;
            border: 1px solid #000;
            padding: 3px 7px;
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
    <main id="main" class="container">
        <div class="join__inner">
            <a href="../main/main.php"><img src="../../assets/img/logo.png" alt="로고이미지" class="logoimg"></a>
            <h2>회원가입</h2>
            <div class="join__form">
                <form action="joinSave.php" name="join" method="post" onsubmit="return joinChecks()">
                    <fieldset>
                        <legend class="blind">회원가입 영역</legend>
                        <div class="name__wrap">
                            <div class="name">
                                <label for="youName" class="required">이름</label>
                                <input type="text" id="youName" name="youName" placeholder="이름을 입력해주세요." class="inputStyle" required>
                                <p class="msg" id="youNameComment"><!--이름은 한글만 사용할 수 있습니다.--></p>
                            </div>
                            <div class="nickname">
                                <label for="youNick" class="required">닉네임</label>
                                <input type="text" id="youNick" name="youNick" placeholder="사용하실 닉네임을 입력해주세요." class="inputStyle" required>
                                <a href="#c" onclick="nickChecking()">중복 확인</a>
                                <p class="msg" id="youNickComment"><!--이미 사용중인 닉네임입니다.--></p>
                            </div>
                        </div>
                        <div class="you">
                            <label for="youID" class="required">아이디</label>
                            <input type="text" id="youID" name="youID" placeholder="아이디는 숫자와 영어만 입력이 가능합니다." class="inputStyle" required>
                            <a href="#c" onclick="IdChecking()">아이디 중복검사</a>
                            <p class="msg" id="youIDComment"></p>
                        </div>
                        <div>
                            <label for="youPass" class="required">비밀번호</label>
                            <input type="password" id="youPass" name="youPass" placeholder="비밀번호를 입력해주세요." class="inputStyle" required>
                            <p class="msg" id="youPassComment"><!--비밀번호는 특수기호를 하나 이상 포함하여야 합니다.--></p>
                        </div>
                        <div>
                            <label for="youPassC" class="required">비밀번호 확인</label>
                            <input type="password" id="youPassC" name="youPassC" placeholder="비밀번호를 다시한번 입력해주세요." class="inputStyle" required>
                            <p class="msg" id="youPassCComment"><!--비밀번호가 일치하지 않습니다.--></p>
                        </div>
                        <div class="you">
                            <label for="youEmail" class="required">이메일</label>
                            <input type="email" id="youEmail" name="youEmail" placeholder="이메일을 입력해주세요." class="inputStyle" required>
                            <a href="#c" onclick="emailChecking()">이메일 중복검사</a>
                            <p class="msg" id="youEmailComment"><!--이미 사용중인 이메일입니다.--></p>
                        </div>
                        <div class="you">
                            <label for="youPhone" class="required">연락처</label>
                            <input type="text" id="youPhone" name="youPhone" placeholder="연락받으실 번호를 입력해주세요." class="inputStyle" required>
                            <a href="#c" onclick="phoneChecking()">연락처 중복검사</a>
                            <p class="msg" id="youPhoneComment"><!--휴대폰 번호를 다시 입력해주세요.--></p>
                        </div>
                        <div class="age__wrap">
                            <div class="youage">
                                <label for="youAge" class="required">연령대</label>
                                <select name="youAge" id="youAge">
                                    <option value="10s">10 대</option>
                                    <option value="20s">20 대</option>
                                    <option value="30s">30 대</option>
                                    <option value="40s">40 대</option>
                                    <option value="50s">50 이상</option>
                                </select>
                            </div>
                            <div class="gender">
                                <label for="youGender" class="required">성별</label>
                                <select name="youGender" id="youGender">
                                    <option value="woman">여자</option>
                                    <option value="man">남자</option>
                                </select>
                            </div>
                        </div>
                        <label class="checkagree">
                            <input type="checkbox" name="agree" value="0" disabled required><span class="checkagree__span"> 개인정보 제공동의 (필수)</span>
                        </label>
                        <button type="submit" class="btnStyle1">회원가입 완료</button>
                    </fieldset>
                    <div class="modal">
                        <?php include "joinTerms.php" ?>
                    </div>
                </form>
            </div>
        </div>
    </main>
    <!-- //main -->

    <script>
        const checkAgree = document.querySelector(".checkagree__span");
        const termsAgree = document.querySelector(".terms__agree");
        const termsBtn = document.querySelector(".term__button")

        checkAgree.addEventListener("click", () => {
            document.querySelector(".modal").classList.add("show");
        });

        
        termsBtn.addEventListener("click", (e) => {
            if(document.querySelector(".terms1").checked && document.querySelector(".terms2").checked){
                // e.preventDefault();
                document.querySelector(".checkagree input").disabled = true;
                document.querySelector(".checkagree input").checked = true;
                document.querySelector(".modal").classList.remove("show");
            } else {
                alert("이용약관 동의에 체크해주세요.")
            }
        });

        document.querySelector(".close__btn").addEventListener("click", () => {
            document.querySelector(".modal").classList.remove("show");
        });
    </script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        let emailBtn = false;
        let nickBtn = false;
        let IDBtn = false;
        let phoneBtn = false;

        let isEmailCheck = true;
        let isNickCheck = true;
        let isIDCheck =true;
        let isphoneCheck =true;

        function emailChecking(){
            emailBtn = true;
            let youEmail = $("#youEmail").val();
            if(youEmail == null || youEmail == ''){
                $("#youEmailComment").text("* 이메일을 입력해주세요");
            }else {
                $.ajax({
                    type : "POST",
                    url : "joinCheck.php",
                    data : {"youEmail" : youEmail, "type" : "isEmailCheck"},
                    dataType : "json",
                    success : function(data){
                        if(data.result == "good"){
                            $("#youEmailComment").text("* 사용 가능한 이메일 입니다");
                            isEmailCheck = true;
                            return isEmailCheck;
                        }else {
                            $("#youEmailComment").text("* 이미 존재하는 이메일 입니다");
                            isEmailCheck = false;
                            return isEmailCheck;
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
        function nickChecking(){
            nickBtn = true;
            let youNick = $("#youNick").val();
            if(youNick == null || youNick == ''){
                $("#youNickComment").text("* 닉네임을 입력해주세요!");
            } else {
                $.ajax({
                    type : "POST",
                    url: "joinCheck.php",
                    data: {"youNick": youNick, "type": "isNickCheck"},
                    dataType: "json",
                    success : function(data){
                        if(data.result == "good"){
                            $("#youNickComment").text("* 사용 가능한 닉네임 입니다");
                            isNickCheck = true;
                            return isNickCheck;
                        } else {
                            $("#youNickComment").text("* 이미 존재하는 닉네임 입니다");
                            isNickCheck = false;
                            return isNickCheck;
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
        function IdChecking(){
            IDBtn = true;
            let youID = $("#youID").val();
            if(youID == null || youID == ''){
                $("#youIDComment").text("* 아이디을 입력해주세요!");
            } else {
                $.ajax({
                    type : "POST",
                    url: "joinCheck.php",
                    data: {"youID": youID, "type": "isIDCheck"},
                    dataType: "json",
                    success : function(data){
                        if(data.result == "good"){
                            $("#youIDComment").text("* 사용 가능한 아이디 입니다");
                            isIDCheck = true;
                            return isIDCheck;
                        } else {
                            $("#youIDComment").text("* 이미 존재하는 아이디 입니다");
                            isIDCheck = false;
                            return isIDCheck;
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
        function phoneChecking(){
            phoneBtn = true;
            let youPhone = $("#youPhone").val();
            if(youPhone == null || youPhone == ''){
                $("#youPhoneComment").text("* 연락받으실 연락처를 적어주세요.");
            } else {
                $.ajax({
                    type : "POST",
                    url: "joinCheck.php",
                    data: {"youPhone": youPhone, "type": "isPhoneCheck"},
                    dataType: "json",
                    success : function(data){
                        if(data.result == "good"){
                            $("#youPhoneComment").text("* 사용 가능한 번호입니다.");
                            isPhoneCheck = true;
                            return isPhoneCheck;
                        } else {
                            $("#youPhoneComment").text("* 이미 등록된 번호입니다.");
                            isPhoneCheck = false;
                            return isPhoneCheck;
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
        
        function joinChecks(){
            //아이디 유효성 검사
            if($("#youID").val() == ''){
                $("#youIDComment").text("* 이름을 입력해주세요");
                $("#youID").focus();
                return false;
            }
            let getyouID = RegExp(/^[a-z0-9]+$/);
            if(!getyouID.test($("#youID").val())){
                $("#youIDComment").text("* ID는 영어와 숫자만 사용 가능합니다.");
                $("#youID").val('');
                $("#youID").focus();
                return false;
            }
            //이름 유효성 검사
            if($("#youName").val() == ''){
                $("#youNameComment").text("* 이름을 입력해주세요");
                $("#youName").focus();
                return false;
            }
            let getYouName = RegExp(/^[가-힣]+$/);
            if(!getYouName.test($("#youName").val())){
                $("#youNameComment").text("* 이름은 한글만 사용 가능합니다.");
                $("#youName").val('');
                $("#youName").focus();
                return false;
            }
            //이메일 유효성 검사
            if($("#youEmail").val() == ''){
                $("#youEmailComment").text("* 이메일을 입력해주세요");
                $("#youEmail").focus();
                return false;
            }
            let getYouEmail =  RegExp(/^[0-9a-zA-Z]([-_.]?[0-9a-zA-Z])*@[0-9a-zA-Z]([-_.]?[0-9a-zA-Z])*.[a-zA-Z]{2,3}$/i);
            if(!getYouEmail.test($("#youEmail").val())){
                $("#youEmailComment").text("* 이메일 형식에 맞게 작성해주세요");
                $("#youEmail").val('');
                $("#youEmail").focus();
                return false;
            }
            //닉네임 유효성 검사
            if($("#youNick").val() == ''){
                $("#youNickComment").text("* 닉네임을 입력해주세요");
                $("#youNick").focus();
                return false;
            }
            let getYouNick = RegExp(/^[가-힣|0-9]+$/);
            if(!getYouNick.test($("#youNick").val())){
                $("#youNickComment").text("* 닉네임은 한글 또는 숫자만 가능합니다.");
                $("#youNick").val('');
                $("#youNick").focus();
                return false;
            }
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
            //연락처 유효성 검사
            if($("#youPhone").val() == ''){
                $("#youPhoneComment").text("* 휴대폰번호를 입력해주세요");
                $("#youPhone").focus();
                return false;
            }
            let getYouPhone = RegExp(/^01([0|1|6|7|8|9])-?([0-9]{3,4})-?([0-9]{4})$/);
            if(!getYouPhone.test($("#youPhone").val())){
                $("#youPhoneComment").text("* 휴대폰번호가 정확하지 않습니다. (000-0000-0000)");
                $("#youPhone").val('');
                $("#youPhone").focus();
                return false;
            }
            if (isEmailCheck == false){
                $("#youEmailComment").text("* 이메일 중복확인을 눌러주세요");
                $("#youEmail").focus();
                return false;
            }
            else if (isNickCheck == false){
                $("#youNickComment").text("* 닉네임 중복확인을 눌러주세요");
                $("#youNick").focus();
                return false;
            }
            else if (isIDCheck == false){
                $("#youIDComment").text("* 아이디 중복확인을 눌러주세요");
                $("#youID").focus();
                return false;
            }
            else if (isphoneCheck == false){
                $("#youPhoneComment").text("* 연락처 중복확인을 눌러주세요");
                $("#youPhone").focus();
                return false;
            }
            if(emailBtn == false){
                $("#youEmailComment").text("* 이메일 중복확인을 눌러주세요");
                $("#youEmail").focus();
                return false;
            } else if(nickBtn == false){
                $("#youNickComment").text("* 닉네임 중복확인을 눌러주세요");
                $("#youNick").focus();
                return false;
            } else if(IDBtn == false){
                $("#youIDComment").text("* 아이디 중복확인을 눌러주세요");
                $("#youID").focus();
                return false;
            } else if(phoneBtn == false){
                $("#youPhoneComment").text("* 연락처 중복확인을 눌러주세요");
                $("#youPhone").focus();
                return false;
            }
        }
    </script>
</body>
</html>