

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../assets/css/style.css">
    <link href="https://webfontworld.github.io/score/SCoreDream.css" rel="stylesheet">
    <link rel="stylesheet" href="../../assets/css/login.css">

    <style>
        .button1 {
            cursor: pointer;
        }
    </style>
</head>
<body>
    
    <main id="main" class="container ">
        <div class="login_inner">
            <div class="banner"><img src="../../assets/img/logo.png" alt="배너이미지"></div>
            <p>회원님의 아이디입니다.</p>
            <div class="login_form">
                <?php
                    include "../connect/connect.php";

                    $youEmail = $_POST['youEmail'];
                    $youName = $_POST['youName'];

                    // echo $youEmail, $youName;

                    $sql = "SELECT youID FROM member WHERE youName='$youName' AND youEmail='$youEmail'";
                    $result = $connect -> query($sql);


                    if($result){
                        $count = $result -> num_rows;
                        if($count == 0){
                            echo "이름과 이메일을 다시 한 번 확인해 주세요. :3";
                        } else {
                            // 로그인 성공
                            $memberInfo = $result -> fetch_array(MYSQLI_ASSOC);
                            $youID = $memberInfo['youID'];
                            // echo "<pre>";
                            // var_dump($memberInfo);
                            // echo "</pre>";
                        //     echo $youID;
                        }
                    }

                ?>
                <div>
                    <!-- <div class="email">아이디</div> -->
                    <div class="findEmail"><?= $youID ?></div>
                </div>
                <div class="button_inner">
                    <button onclick= "window.location.href = 'pwFind.php'" class="button1">비밀번호 찾기</button>
                    <a href="../login/login.php" class="button2">로그인하러 가기</a>
                </div>
            </div>
        </div>
        
    </main>
</body>
</html>