<?php
    include "../connect/connect.php";
    include "../connect/session.php";

    $memberID = $_SESSION['memberID'];
    $boardAuthor = $_SESSION['youNick'];
    $boardName = $_POST['boardName'];
    $boardTitle = $_POST['boardTitle'];
    $boardIngre = $_POST['boardIngre'];
    $boardContents1 = nl2br($_POST['boardContents1']);
    $boardView = 1;
    $regTime = time();

    $boardName = $connect -> real_escape_string($boardName);
    $boardTitle = $connect -> real_escape_string($boardTitle);
    $boardContents1 = $connect -> real_escape_string($boardContents1);

    if(isset($_FILES['boardImg1'])){
        $boardImg1 = $_FILES['boardImg1'];
        $boardImgSize1 = $_FILES['boardImg1']['size'];
        $boardImgType1 = $_FILES['boardImg1']['type'];
        $boardImgName1 = $_FILES['boardImg1']['name'];
        $boardImgTmp1 = $_FILES['boardImg1']['tmp_name'];

        if($boardImgType1){
            $fileTypeExtension = explode("/", $boardImgType1);
            $fileType = $fileTypeExtension[0];          // image
            $fileExtension = $fileTypeExtension[1];      // jpeg

            // 이미지 타입 확인
            if($fileType == "image"){
                if($fileExtension == "jpg" || $fileExtension == "jpeg" || $fileExtension == "png" || $fileExtension == "gif"){
                    $boardImgDir = "../img/board/";
                    $boardImgName1 = "Img_".time().rand(1,99999)."."."{$fileExtension}";
                    echo "이미지 파일이 맞습니다.";
                } else {
                    echo "<script>alert('이미지 파일이 아닙니다.')</script>";
                }
            } else {
                echo "<script>alert('이미지 파일이 아닙니다.')</script>";
            }
            // 이미지 사이즈 확인
            if($boardImgSize1 > 10000000){
                echo "<script>alert('첫 번째 이미지 파일 용량이 1MB를 초과했습니다.')</script>";
            }
        }
        move_uploaded_file($boardImgTmp1, $boardImgDir.$boardImgName1);
        $sql = "INSERT INTO onlyboard(memberID, boardName, boardTitle, boardIngre, boardContents1, boardAuthor, boardView, ImgSrc1, ImgSize1, regTime) VALUES('$memberID', '$boardName', '$boardTitle', '$boardIngre', '$boardContents1', '$boardAuthor', '$boardView', '$boardImgName1', '$boardImgSize1', '$regTime')";
    } else {
        $sql = "INSERT INTO onlyboard(memberID, boardName, boardTitle, boardIngre, boardContents1, boardAuthor, boardView, regTime) VALUES('$memberID', '$boardName', '$boardTitle', '$boardIngre', '$boardContents1', '$boardAuthor', '$boardView', '$regTime')";
    }
    // 1번 내용(이미지)

    if(isset($_POST['boardContents2'])){
        $boardContents2 = nl2br($_POST['boardContents2']);

        $boardContents2 = $connect -> real_escape_string($boardContents2);
        if(isset($_FILES['boardImg2'])){
            $boardImg2 = $_FILES['boardImg2'];
            $boardImgSize2 = $_FILES['boardImg2']['size'];
            $boardImgType2 = $_FILES['boardImg2']['type'];
            $boardImgName2 = $_FILES['boardImg2']['name'];
            $boardImgTmp2 = $_FILES['boardImg2']['tmp_name'];

            if($boardImgType2){
                $fileTypeExtension = explode("/", $boardImgType2);
                $fileType = $fileTypeExtension[0];          // image
                $fileExtension = $fileTypeExtension[1];      // jpeg
    
                // 이미지 타입 확인
                if($fileType == "image"){
                    if($fileExtension == "jpg" || $fileExtension == "jpeg" || $fileExtension == "png" || $fileExtension == "gif"){
                        $boardImgDir = "../img/board/";
                        $boardImgName2 = "Img_".time().rand(1,99999)."."."{$fileExtension}";
                        echo "이미지 파일이 맞습니다.";
                    } else {
                        echo "<script>alert('이미지 파일이 아닙니다.')</script>";
                    }
                } else {
                    echo "<script>alert('이미지 파일이 아닙니다.')</script>";
                }
                // 이미지 사이즈 확인
                if($boardImgSize2 > 10000000){
                    echo "<script>alert('첫 번째 이미지 파일 용량이 1MB를 초과했습니다.')</script>";
                }
            }
            move_uploaded_file($boardImgTmp2, $boardImgDir.$boardImgName2);
            $sql = "INSERT INTO onlyboard(memberID, boardName, boardTitle, boardIngre, boardContents1, boardContents2, boardAuthor, boardView, ImgSrc1, ImgSrc2, ImgSize1, ImgSize2, regTime) VALUES('$memberID', '$boardName', '$boardTitle', '$boardIngre', '$boardContents1', '$boardContents2', '$boardAuthor', '$boardView', '$boardImgName1', '$boardImgName2', '$boardImgSize1', '$boardImgSize2', '$regTime')";
        } else {
            $sql = "INSERT INTO onlyboard(memberID, boardName, boardTitle, boardIngre, boardContents1, boardContents2, boardAuthor, boardView, ImgSrc1, ImgSize1, regTime) VALUES('$memberID', '$boardName', '$boardTitle', '$boardIngre', '$boardContents1', '$boardContents2', '$boardAuthor', '$boardView', '$boardImgName1', '$boardImgSize1', '$regTime')";
        }
    }
    // 2번 내용

    if(isset($_POST['boardContents3'])){
        $boardContents3 = nl2br($_POST['boardContents3']);

        $boardContents3 = $connect -> real_escape_string($boardContents3);
        if(isset($_FILES['boardImg3'])){
            $boardImg3 = $_FILES['boardImg3'];
            $boardImgSize3 = $_FILES['boardImg3']['size'];
            $boardImgType3 = $_FILES['boardImg3']['type'];
            $boardImgName3 = $_FILES['boardImg3']['name'];
            $boardImgTmp3 = $_FILES['boardImg3']['tmp_name'];

            if($boardImgType3){
                $fileTypeExtension = explode("/", $boardImgType3);
                $fileType = $fileTypeExtension[0];          // image
                $fileExtension = $fileTypeExtension[1];      // jpeg
    
                // 이미지 타입 확인
                if($fileType == "image"){
                    if($fileExtension == "jpg" || $fileExtension == "jpeg" || $fileExtension == "png" || $fileExtension == "gif"){
                        $boardImgDir = "../img/board/";
                        $boardImgName3 = "Img_".time().rand(1,99999)."."."{$fileExtension}";
                        echo "이미지 파일이 맞습니다.";
                    } else {
                        echo "<script>alert('이미지 파일이 아닙니다.')</script>";
                    }
                } else {
                    echo "<script>alert('이미지 파일이 아닙니다.')</script>";
                }
                // 이미지 사이즈 확인
                if($boardImgSize3 > 10000000){
                    echo "<script>alert('첫 번째 이미지 파일 용량이 1MB를 초과했습니다.')</script>";
                }
            }
            move_uploaded_file($boardImgTmp3, $boardImgDir.$boardImgName3);
            $sql = "INSERT INTO onlyboard(memberID, boardName, boardTitle, boardIngre, boardContents1, boardContents2, boardContents3, boardAuthor, boardView, ImgSrc1, ImgSrc2, ImgSrc3, ImgSize1, ImgSize2, ImgSize3, regTime) VALUES('$memberID', '$boardName', '$boardTitle', '$boardIngre', '$boardContents1', '$boardContents2', '$boardContents3', '$boardAuthor', '$boardView', '$boardImgName1', '$boardImgName2', '$boardImgName3', '$boardImgSize1', '$boardImgSize2', '$boardImgSize3', '$regTime')";
        } else {
            $sql = "INSERT INTO onlyboard(memberID, boardName, boardTitle, boardIngre, boardContents1, boardContents2,  boardContents3, boardAuthor, boardView, ImgSrc1, ImgSrc2, ImgSize1, ImgSize2, regTime) VALUES('$memberID', '$boardName', '$boardTitle', '$boardIngre', '$boardContents1', '$boardContents2', '$boardContents3', '$boardAuthor', '$boardView', '$boardImgName1', '$boardImgName2', '$boardImgSize1', '$boardImgSize2', '$regTime')";
        }
    }
    // 3번 내용

    if(isset($_POST['boardContents4'])){
        $boardContents4 = nl2br($_POST['boardContents4']);

        $boardContents4 = $connect -> real_escape_string($boardContents4);
        if(isset($_FILES['boardImg4'])){
            $boardImg4 = $_FILES['boardImg4'];
            $boardImgSize4 = $_FILES['boardImg4']['size'];
            $boardImgType4 = $_FILES['boardImg4']['type'];
            $boardImgName4 = $_FILES['boardImg4']['name'];
            $boardImgTmp4 = $_FILES['boardImg4']['tmp_name'];

            if($boardImgType4){
                $fileTypeExtension = explode("/", $boardImgType4);
                $fileType = $fileTypeExtension[0];          // image
                $fileExtension = $fileTypeExtension[1];      // jpeg
    
                // 이미지 타입 확인
                if($fileType == "image"){
                    if($fileExtension == "jpg" || $fileExtension == "jpeg" || $fileExtension == "png" || $fileExtension == "gif"){
                        $boardImgDir = "../img/board/";
                        $boardImgName4 = "Img_".time().rand(1,99999)."."."{$fileExtension}";
                        echo "이미지 파일이 맞습니다.";
                    } else {
                        echo "<script>alert('이미지 파일이 아닙니다.')</script>";
                    }
                } else {
                    echo "<script>alert('이미지 파일이 아닙니다.')</script>";
                }
                // 이미지 사이즈 확인
                if($boardImgSize4 > 10000000){
                    echo "<script>alert('첫 번째 이미지 파일 용량이 1MB를 초과했습니다.')</script>";
                }
            }
            move_uploaded_file($boardImgTmp4, $boardImgDir.$boardImgName4);
            $sql = "INSERT INTO onlyboard(memberID, boardName, boardTitle, boardIngre, boardContents1, boardContents2, boardContents3, boardContents4, boardAuthor, boardView, ImgSrc1, ImgSrc2, ImgSrc3, ImgSrc4, ImgSize1, ImgSize2, ImgSize3, ImgSize4, regTime) VALUES('$memberID', '$boardName', '$boardTitle', '$boardIngre', '$boardContents1', '$boardContents2', '$boardContents3', '$boardContents4', '$boardAuthor', '$boardView', '$boardImgName1', '$boardImgName2', '$boardImgName3', '$boardImgName4', '$boardImgSize1', '$boardImgSize2', '$boardImgSize3', '$boardImgSize4', '$regTime')";
        } else {
            $sql = "INSERT INTO onlyboard(memberID, boardName, boardTitle, boardIngre, boardContents1, boardContents2, boardContents3, boardContents4, boardAuthor, boardView, ImgSrc1, ImgSrc2, ImgSrc3, ImgSize1, ImgSize2, ImgSize3, regTime) VALUES('$memberID', '$boardName', '$boardTitle', '$boardIngre', '$boardContents1', '$boardContents2', '$boardContents3', '$boardAuthor', '$boardView', '$boardImgName1', '$boardImgName2', '$boardImgName3', '$boardImgSize1', '$boardImgSize2', '$boardImgSize3', '$regTime')";
        }
    }
    // 4번 내용

    if(isset($_POST['boardContents5'])){
        $boardContents5 = nl2br($_POST['boardContents5']);

        $boardContents5 = $connect -> real_escape_string($boardContents5);
        if(isset($_FILES['boardImg5'])){
            $boardImg5 = $_FILES['boardImg5'];
            $boardImgSize5 = $_FILES['boardImg5']['size'];
            $boardImgType5 = $_FILES['boardImg5']['type'];
            $boardImgName5 = $_FILES['boardImg5']['name'];
            $boardImgTmp5 = $_FILES['boardImg5']['tmp_name'];

            if($boardImgType5){
                $fileTypeExtension = explode("/", $boardImgType5);
                $fileType = $fileTypeExtension[0];          // image
                $fileExtension = $fileTypeExtension[1];      // jpeg
    
                // 이미지 타입 확인
                if($fileType == "image"){
                    if($fileExtension == "jpg" || $fileExtension == "jpeg" || $fileExtension == "png" || $fileExtension == "gif"){
                        $boardImgDir = "../img/board/";
                        $boardImgName5 = "Img_".time().rand(1,99999)."."."{$fileExtension}";
                        echo "이미지 파일이 맞습니다.";
                    } else {
                        echo "<script>alert('이미지 파일이 아닙니다.')</script>";
                    }
                } else {
                    echo "<script>alert('이미지 파일이 아닙니다.')</script>";
                }
                // 이미지 사이즈 확인
                if($boardImgSize5 > 10000000){
                    echo "<script>alert('첫 번째 이미지 파일 용량이 1MB를 초과했습니다.')</script>";
                }
            }
            move_uploaded_file($boardImgTmp5, $boardImgDir.$boardImgName5);
            $sql = "INSERT INTO onlyboard(memberID, boardName, boardTitle, boardIngre, boardContents1, boardContents2, boardContents3, boardContents4, boardContents5, boardAuthor, boardView, ImgSrc1, ImgSrc2, ImgSrc3, ImgSrc4, ImgSrc5, ImgSize1, ImgSize2, ImgSize3, ImgSize4, ImgSize5, regTime) VALUES('$memberID', '$boardName', '$boardTitle', '$boardIngre', '$boardContents1', '$boardContents2', '$boardContents3', '$boardContents4', '$boardContents5', '$boardAuthor', '$boardView', '$boardImgName1', '$boardImgName2', '$boardImgName3', '$boardImgName4', '$boardImgName5', '$boardImgSize1', '$boardImgSize2', '$boardImgSize3', '$boardImgSize4', '$boardImgSize5', '$regTime')";
        } else {
            $sql = "INSERT INTO onlyboard(memberID, boardName, boardTitle, boardIngre, boardContents1, boardContents2, boardContents3, boardContents4, boardContents5, boardAuthor, boardView, ImgSrc1, ImgSrc2, ImgSrc3, ImgSrc4, ImgSize1, ImgSize2, ImgSize3, ImgSize4, regTime) VALUES('$memberID', '$boardName', '$boardTitle', '$boardIngre', '$boardContents1', '$boardContents2', '$boardContents3', '$boardContents4', '$boardContents5', '$boardAuthor', '$boardView', '$boardImgName1', '$boardImgName2', '$boardImgName3', '$boardImgName4', '$boardImgSize1', '$boardImgSize2', '$boardImgSize3', '$boardImgSize4', '$regTime')";
        }
    }
    // 5번 내용

    $connect -> query($sql);

    // echo $memberID, $boardAuthor, $boardName, $boardTitle, $boardIngre, $boardContents1, $boardContents2, $boardContents3, $boardContents4, $boardContents5;
    // echo "<pre>";
    //     if(isset($boardImg1)){
    //         var_dump($boardImg1);
    //     }
    // echo "</pre>";
?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>레시피 업로드 완료</title>
    <link rel="stylesheet" href="../../assets/css/style.css">

    <style>
        #upmain {
            width: 100%;
            height: 700px;
            /* background-color: #ccc; */
        }
        .upcontainer {
            width: 1260px;
            height: 700px;
            /* background-color: #a76a6a; */
            margin: 0 auto;
            padding-top: 100px;
            text-align: center;
        }
        .upcontainer h1 {
            font-size: 40px;
            font-weight: bold;
            padding-top: 100px;
            text-align: center;
            font-family: SBAggro;
        }
        .upcontainer p {
            font-size: 30px;
            color: #747474;
            text-align: center;
            padding-top: 100px;
            font-family: SBAggro;
        }
        .upcontainer a {
            font-size: 18px;
            text-decoration: none;
            color: #fff;
            border: 1px solid #FFAD7F;
            background-color: #FFAD7F;
            padding: 20px 20px;
            border-radius: 10px;
            font-weight: lighter;
            font-family: SBAggro;
            display: inline-block;
            margin-top: 100px;
            width: 150px;
        }
    </style>
</head>
<body>
<?php include "../include/header.php"; ?>
    <div id="upmain">
        <div class="upcontainer">
            <h1>요리방 레시피가 업로드 되었습니다 ! 🌞</h1>
            <p>회원님께서 올려주신 레시피는 많은 분들의 도움이 됩니다 !</p>
            <div class="a">
                <a href="board.php">게시판 돌아가기</a>
            </div>
        </div>
    </div>
    <?php include "../include/footer.php"; ?>
</body>
</html>

<!-- <script>
    location.href = "board.php";
</script> -->