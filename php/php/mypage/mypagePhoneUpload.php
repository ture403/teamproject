<?php
    include "../connect/connect.php";
    include "../connect/session.php";

    $memberID = $_SESSION['memberID'];
    $youPhone = $_POST['youPhone'];
    $modtime = time();
    // echo $modtime;

    $_SESSION["youPhone"] = $youPhone;
    
    $sql = "UPDATE member  SET youPhone = '$youPhone' WHERE memberID = '$memberID'";
    $connect -> query($sql);
    $sql1 = "UPDATE member  SET modtime = '$modtime' WHERE memberID = '$memberID'";
    $connect -> query($sql1);
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=r, initial-scale=1.0">
    <link rel="stylesheet" href="../../assets/css/style.css">
    <title>Only For You</title>
    
    <style>
        @import url('https://webfontworld.github.io/sandbox/SBAggro.css');
        .mypageModify_Ok{
            margin-top: 100px;
            min-height: 800px;
        }
        .mypageModify_Ok .container{
            padding: 200px 0 300px;
            text-align: center;
        }
        .mypageModify_Ok h1 {
            font-size: 40px;
            color: #227E16;
        }
        .mypageModify_Ok p {
            font-size: 30px;
            color: #747474;
            margin-top: 90px;
            color: #227E16;
        }
        .mypageModify_Ok span {
            color: #ffad7f;
        }
        .mypageModify_Ok .mypage_button {
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
<body>
    <?php include "../include/header.php" ?>
    <main id="main">
        <div class="mypageModify_Ok">
            <div class="container">
                <h1>핸드폰 수정완료</h1>
                <p>핸드폰번호가 수정되었습니다.! <br>온리포유를 즐겨보세요.</p>
                <div class="mypage_button">
                    <a href="mypage.php" class="button1">이전으로</a>
                </div>
            </div>
        </div>
    </main>
    <?php include "../include/footer.php" ?>
</body>
</html>