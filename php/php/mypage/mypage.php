<?php 
    include "../connect/connect.php";
    include "../connect/session.php";

    // echo "<pre>";
    // var_dump($_SESSION);
    // echo "</pre>";

    $youID = $_SESSION["youID"];
    $youName = $_SESSION["youName"];
    $youNick = $_SESSION["youNick"];
    $youEmail = $_SESSION["youEmail"];
    $youPhone = $_SESSION["youPhone"];
    $youSex = $_SESSION["youSex"];
    $youAge = $_SESSION["youAge"];

    $sql = "SELECT imgsrc FROM member WHERE youID = '$youID'"; // 적절한 memberID 값을 사용하세요
    $result = $connect->query($sql);

    if ($result && $result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $imgsrc = $row['imgsrc'];

        // // 이미지 파일 경로가 있는 경우 이미지 출력
        // if (!empty($imgsrc)) {
        //     echo "<img src='../../assets/mypage/" . $imgsrc . "' alt='이미지' class='file_img'>";
        // }
    }
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="../../assets/css/style.css">
    <title>Only For You</title>
    <script defer src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <style>
        .join__inner input {
            box-sizing: border-box;
        }
        .join__form button {
            float: right;
            text-align: center;
            margin-left: 15px;
            background-color: #EBFFB3;
            padding: 15px 35px;
            border-radius: 10px;
            font-weight: 500;
        }
        .join__inner .title {
            font-size: 30px;
            font-weight: 500;
            margin-top: 100px;
            margin-bottom: 40px;
        }
        .input-file-button{
            text-align: center;
            font-size: 20px;
            font-weight: 400;
            color: #dfdfdf;
            cursor: pointer;
        }
        .file_img {
            width: 200px; 
            height: 200px; 
            display: block; 
            margin: auto;
            cursor: pointer;
        }
        .file_img_desc {
            display: block;
            margin: 0 auto; 
            border: none;
            padding: 5px 10px;
            border-radius: 10px;
            cursor: pointer;
            background-color: #EBFFB3;
        }
        .name_nick .name{
            width: 100%;
        }
        .name_nick .name .title {
            display: inline-block;
            text-align: left;
            margin-bottom: 5px;
            font-size: 1.43rem;
            font-weight: 500;
            margin-top: 0;
        }
        
        .name_nick .nick{
            width: 100%;
        }
        .name_nick .nick .nick_wrap {
            display: flex;
        }
        .name_nick .nick input {
            width: 70%;
        }
        .name_nick .nick button {
            height: 50px;
            padding: 10px;
            width: 40%;
            background-color: #ffad7f;
        }
        .name_nick .nick button:hover{
            background-color: #f89e69;
            color: #fff;
        }
        .inputStyle5 {
            background-color: #EBFFB3B2;
            width: 100%;
            border-radius: 5px;
            padding: 15px !important;
            font-size: 14px;
            height: 50px;
            border: 0;
            font-weight: 300;
            text-align:left;
        }
        .mypage_font {
            margin-bottom: 5px;
            font-size: 1.43rem;
            font-weight: 500;
        }
        .nickcommet {
            font-size: 12px;
            color: #f01;
        }
        .pl {
            padding-left: 0;
        }
        /* id */
        .you .title {
            display: inline-block;
            text-align: left;
            margin-bottom: 5px;
            font-size: 1.43rem;
            font-weight: 500;
            margin-top: 0;
        }
        /* pass */
        .pass_wrap{
            display: flex;
            justify-content: space-between;
        }
        .pass_wrap input {
            width: 75%;
        }
        .pass_wrap button {
            width: 25%;
            height: 50px;
            padding: 10px;
            background-color: #ffad7f;
        }
        .pass_wrap button:hover{
            background-color: #f89e69;
            color: #fff;
        }
        .mb3 {
            margin-bottom: 3em;
        }
        /* age */
        /* nick */
        .youNick_wrap {
            display: flex;
        }
        .youNick_wrap input {
            width:55%;
        }
        .youNick_wrap a {
            display: block;
            padding: 15px 0;
            width: 20%;
            height: 50px;
            background-color: #ffad7f;
            font-size: 13px;
            font-weight: 500;
            border-radius: 10px;
            text-align: center;
            box-sizing: border-box;
            margin-left: 10px;
        }
        .youNick_wrap a:hover{
            color:#fff;
        }
        .youNick_wrap .Nickbutton {
            width: 20% !important;
            height: 50px !important;
            padding: 10px !important;
            background-color: #ffad7f;
        }
        /* phone */
        .phone_inner {
            display: flex;
            justify-content: space-between;
        }
        .phone_inner input{
            width:55%;
        }
        .phone_inner a {
            margin-left: 13px;
            display: block;
            padding: 15px 0;
            width: 20%;
            height: 50px;
            background-color: #ffad7f;
            font-size: 13px;
            font-weight: 500;
            border-radius: 10px;
            text-align: center;
            box-sizing: border-box;
        }
        .phone_inner a:hover{
            color: #fff;
        }
        .phone_inner button {
            height: 50px;
            padding: 10px;
            width: 20%;
            background-color: #ffad7f;
        }
        .phone_inner button:hover{
            color: #fff;
        }
        /* age */
        .age_wrap {
            display: flex;
        }
        .age_wrap button {
            height: 50px;
            padding: 10px;
            width: 40%;
            background-color: #ffad7f;
        }
        .age_wrap button:hover{
            background-color: #f89e69;
            color: #fff;
        }
        /* gender */
        .gender{
            width: 40%;
        }
        .gender .title {
            display: inline-block;
            text-align: left;
            margin-bottom: 5px;
            font-size: 1.43rem;
            font-weight: 500;
            margin-top: 0;
        }
        .gender .desc {
            padding: 14px;
        }
        .exit{
            display: block;
            padding: 15px 0;
            width: 20%;
            height: 50px;
            background-color: #ffad7f;
            font-size: 13px;
            font-weight: 500;
            border-radius: 10px;
            text-align: center;
            box-sizing: border-box;
            float:right;
        }
        .exit:hover{
            background-color: #f89e69;
            color: #fff;
        }
    </style>
</head>
<body>
    <?php include "../include/header.php" ?>
    <main id="main" class="container">
        <div class="join__inner">
            <h2 class="title">마이페이지(회원정보수정)</h2>
            <form action="mypageImgeUpload.php" method="POST" onsubmit="return checkFile()" enctype="multipart/form-data">
                <label for="blogFile">
                    <?php if (!empty($imgsrc)) {
                        echo "<img src='../img/profile/" . $imgsrc . "' alt='이미지' class='file_img' id='blogFileUp'>";
                        } else {
                            echo "<img id='blogFileUp' src='../../assets/img/User.png' alt='이미지' class='file_img'>";
                        }
                    ?>
                </label>
                <input type="file" id="blogFile" name="blogFile" style="display: none;" onchange="previewFile(event)">
                <button type="submit" class="file_img_desc">이미지 변경</button>              
            </form>
            <div class="join__form">
                
                    <fieldset>
                        <div class="name_nick">
                            <div class="name mb30">
                                <h2 class="title mypage_font">이름</h2>
                                <div class="desc inputStyle5" style="box-sizing:border-box; background-color: #b3db3eb2;"><?=$youName;?></div>
                                <p class="nickcommet">*이름은 수정이 불가능 합니다.</p>
                            </div>
                            <form action="mypageNickUpload.php" method="POST" class="nick" onsubmit="return joinChecksNick()">
                                <label for="youNick" class="required">닉네임</label>
                                <div class="youNick_wrap">
                                    <input type="text" id="youNick" name="youNick" placeholder="현재 닉네임은 <?=$youNick?> 입니다." class="inputStyle5" required>
                                    <a href="#c" onclick="nickChecking()">중복 확인</a>
                                    <button class="Nickbutton" type="submit">닉네임변경</button>
                                </div>
                                <p class="msg" id="youNickComment"><!--이미 사용중인 닉네임입니다.--></p>
                            </form>
                        </div>
                        <div class="you">
                            <h2 class="title mypage_font">아이디</h2>
                            <div class="desc inputStyle5" style="box-sizing:border-box; background-color: #b3db3eb2;"><?=$youID;?></div>
                            <p class="nickcommet">*아이디는 수정이 불가능 합니다.</p>
                        </div>
                        <form action="mypagePassUpload.php" method="post" class="mb30" onsubmit="return joinChecksPass()">
                            <div class="mb30">
                                <label for="youPass" class="required">비밀번호</label>
                                <input type="password" id="youPass" name="youPass" placeholder="비밀번호를 입력해주세요." class="inputStyle5 pl" required>
                                <p class="msg" id="youPassComment"><!--비밀번호는 특수기호를 하나 이상 포함하여야 합니다.--></p>
                            </div>
                            <div>
                                <label for="youPassC" class="required">비밀번호 확인</label>
                                <div class="pass_wrap">
                                    <input type="password" id="youPassC" name="youPassC" placeholder="비밀번호를 다시한번 입력해주세요." class="inputStyle5 pl" required>
                                    <button type="submit">비밀번호 변경</button>
                                </div>
                                <p class="msg" id="youPassCComment"><!--비밀번호가 일치하지 않습니다.--></p>
                            </div>
                        </form>
                        <div class="you">
                            <h2 class="title mypage_font">이메일</h2>
                            <div class="desc inputStyle5" style="box-sizing:border-box; background-color: #b3db3eb2;"><?=$youEmail?></div>
                            <p class="nickcommet">*이메일은 수정이 불가능 합니다.</p>
                        </div>
                        <form action="mypagePhoneUpload.php" method="post" class="phone mb30" onsubmit="return joinChecksPhone()">
                            <label for="youPhone" class="required mypage_font">연락처</label>
                            <div class="phone_inner">
                                <input type="text" id="youPhone" name="youPhone" placeholder="수정할 번호를 입력해주세요." class="inputStyle5" required>
                                <a href="#c" onclick="phoneChecking()">연락처 중복검사</a>
                                <button type="submit">변경</button>
                            </div>
                            <p class="msg" id="youPhoneComment"><!--휴대폰 번호를 다시 입력해주세요.--></p>
                        </form>
                        <div class="age__wrap">
                            <form action="mypageAgeUpload.php" method="post" class="youage">
                                <label for="youAge" class="required">연령대</label>
                                <div class="age_wrap">
                                    <select name="youAge" id="youAge" class="inputStyle5" >
                                        <option value="10s">10 대</option>
                                        <option value="20s">20 대</option>
                                        <option value="30s">30 대</option>
                                        <option value="40s">40 대</option>
                                        <option value="50s">50 이상</option>
                                    </select>
                                    <button type="submit">연령 변경</button>
                                </div>
                            </form>
                            <div class="gender">
                                <h2 class="title mypage_font">성별</h2>
                                <div class="desc inputStyle5" style="box-sizing:border-box; background-color: #b3db3eb2;"><?=$youSex?></div>
                                <p class="nickcommet">*성별은 수정이 불가능 합니다.</p>
                            </div>
                        </div>
                    </fieldset>
                    
                    <a href="mypageWithdraw.php" class="exit">탈퇴하기</a>
            </div>
        </div>
    </main>
    
<?php include "../include/footer.php" ?>

<script>
    //사진 클릭시 위에 이미지 보이기
    function previewFile(event) {
    let fileInput = event.target;
    let previewImage = document.getElementById("blogFileUp");

    let fileReader = new FileReader();
    fileReader.onload = function () {
        previewImage.src = fileReader.result;
    };
    
    fileReader.readAsDataURL(fileInput.files[0]);
    }
    function checkFile() {
        let previewImage = document.getElementById("blogFile");
        if (previewImage.files.length === 0) {
            alert("파일을 첨부하지 않았습니다.");
            return false;
        }
        alert("파일을 업로드 되었습니다.");
    }
</script>
<script>
        function nickChecking(){
            let youNick = $("#youNick").val();
            if(youNick == null || youNick == ''){
                $("#youNickComment").text("* 닉네임을 입력해주세요!");
            } else {
                $.ajax({
                    type : "POST",
                    url: "../join/joinCheck.php",
                    data: {"youNick": youNick, "type": "isNickCheck"},
                    dataType: "json",
                    success : function(data){
                        if(data.result == "good"){
                            $("#youNickComment").text("* 사용 가능한 닉네임 입니다");
                            isNickCheck = true;
                        } else {
                            $("#youNickComment").text("* 이미 존재하는 닉네임 입니다");
                            isNickCheck = false;
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
            let youPhone = $("#youPhone").val();
            if(youPhone == null || youPhone == ''){
                $("#youPhoneComment").text("* 연락받으실 연락처를 적어주세요.");
            } else {
                $.ajax({
                    type : "POST",
                    url: "../join/joinCheck.php",
                    data: {"youPhone": youPhone, "type": "isPhoneCheck"},
                    dataType: "json",
                    success : function(data){
                        if(data.result == "good"){
                            $("#youPhoneComment").text("* 사용 가능한 번호입니다.");
                            isPhoneCheck = true;
                        } else {
                            $("#youPhoneComment").text("* 이미 등록된 번호입니다.");
                            isPhoneCheck = false;
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
        
        function joinChecksNick(){
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
        }
        function joinChecksPass(){
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
        }
        function joinChecksPhone(){
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
        }
    </script>
</body>
</html>