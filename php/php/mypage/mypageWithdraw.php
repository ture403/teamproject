<?php 
    include "../connect/connect.php";
    include "../connect/session.php";

    // echo "<pre>";
    // var_dump($_SESSION);
    // echo "</pre>";

    $memberID = $_SESSION["memberID"];
    $youID = $_SESSION["youID"];
    $youName = $_SESSION["youName"];
    $youNick = $_SESSION["youNick"];
    $youEmail = $_SESSION["youEmail"];
    $youPhone = $_SESSION["youPhone"];
    $youSex = $_SESSION["youSex"];
    $youAge = $_SESSION["youAge"];

    $sql = "SELECT youPass FROM member WHERE memberid ='$memberID'";
    $result = $connect -> query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc(); // 데이터 가져오기
    
        // 필요한 데이터 추출
        $youPass = $row['youPass'];
    
        // 데이터 사용
    } else {
        echo "데이터가 없습니다.";
    }
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../assets/css/style.css">
    <title>마이페이지 탈퇴</title>
    <script defer src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <style>
        #main{
            width: 760px;
            height: 650px;
            margin: 0 auto;
        }
        #main .container {
            width: 766px;
            height: 640px;
            background-color: #ccc;
        }
        .withdraw_form {
            margin-top: 200px;
            width: 730px;
            height: 380px;
        }
        .withdraw_form h1{
            font-size: 40px;
            font-weight: 500;
            text-align: center;
            margin-bottom: 30px;
        }
        .input {

        }
        .button {
            display: block;
            height: 50px;
            width:200px;
            background-color: #ffad7f;
            border-radius: 20px;
            margin: 30px auto;
        }
        .button:hover{
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
    </style>
</head>
<body>
    <?php include "../include/header.php" ?>
    <main id="main" class="container ">
        <div class="withdraw_inner">
            <div class="withdraw_form">
                <h1>탈퇴하기</h1>
                <form action="mypageWithdrawOk.php" name="out" method="post" onsubmit="return joinChecksPass()">
                    <fieldset>
                        <div class="mb30">
                                <label for="youPass" class="required">비밀번호</label>
                                <input type="password" id="youPass" name="youPass" placeholder="비밀번호를 입력해주세요." class="inputStyle5 " required>
                                <p class="msg" id="youPassComment"><!--비밀번호는 특수기호를 하나 이상 포함하여야 합니다.--></p>
                            </div>
                            <div>
                                <label for="youPassC" class="required">비밀번호 확인</label>
                                <div class="pass_wrap">
                                    <input type="password" id="youPassC" name="youPassC" placeholder="비밀번호를 다시한번 입력해주세요." class="inputStyle5 " required>
                                </div>
                                <p class="msg" id="youPassCComment"><!--비밀번호가 일치하지 않습니다.--></p>
                                <button class="button" type="submit" onsubmit="return joinChecksPass()">회원 탈퇴</button>
                            </div>
                    </fieldset>
                </form>
            </div>
        </div>
        
    </main> 
    <?php include "../include/footer.php" ?>
    <script>
        function joinChecksPass(){
            if($("#youPass").val() !== $("#youPassC").val()){
                $("#youPassCComment").text("*비밀번호가 일치하지 않습니다.");
                return false;
            }
            let youPassFromPHP = '<?php echo $youPass; ?>';
            if($("#youPass").val() !== youPassFromPHP ){
                $("#youPassComment").text("* 데이터와 일치하지 않습니다.");
                return false;
            //비밀번호 일치 체크
            }
        }
    </script>
</body>
</html>