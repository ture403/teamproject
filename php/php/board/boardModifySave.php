<?php
    include "../connect/connect.php";
    include "../connect/session.php";
    include "../connect/sessionCheck.php";

    $boardID = $_POST['boardID'];
    $boardName = $_POST['boardName'];
    $boardTitle = $_POST['boardTitle'];
    $boardIngre = $_POST['boardIngre'];
    $boardPass = $_POST['modiPass'];
    $count = $_POST['count'];


    $boardArray = array();
    if(isset($_POST['boardContents1'])){
        $boardContents1 = nl2br($_POST['boardContents1']);
        array_push($boardArray, $boardContents1);
    }
    if(isset($_POST['boardContents2'])){
        $boardContents2 = nl2br($_POST['boardContents2']);
        array_push($boardArray, $boardContents2);
    }
    if(isset($_POST['boardContents3'])){
        $boardContents3 = nl2br($_POST['boardContents3']);
        array_push($boardArray, $boardContents3);
    }
    if(isset($_POST['boardContents4'])){
        $boardContents4 = nl2br($_POST['boardContents4']);
        array_push($boardArray, $boardContents4);
    }
    if(isset($_POST['boardContents5'])){
        $boardContents5 = nl2br($_POST['boardContents5']);
        array_push($boardArray, $boardContents5);
    }

    $imageArray = array();
    if(isset($_FILES['boardImg1'])){
        $boardImg1 = $_FILES['boardImg1'];
        array_push($imageArray, $boardImg1);
    }
    if(isset($_FILES['boardImg2'])){
        $boardImg2 = $_FILES['boardImg2'];
        array_push($imageArray, $boardImg2);
    }
    if(isset($_FILES['boardImg3'])){
        $boardImg3 = $_FILES['boardImg3'];
        array_push($imageArray, $boardImg3);
    }
    if(isset($_FILES['boardImg4'])){
        $boardImg4 = $_FILES['boardImg4'];
        array_push($imageArray, $boardImg4);
    }
    if(isset($_FILES['boardImg5'])){
        $boardImg5 = $_FILES['boardImg5'];
        array_push($imageArray, $boardImg5);
    }
    echo var_dump($imageArray);
    
    for($i=1; $i<=$count; $i++){
        $ii = $i-1;
        echo $imageArray[$ii]['name'];
    }

    // for($i=0; $i<$count; $i++){
    //     echo "<br>".$boardArray[$i]."<br>";
    // }

    $boardName = $connect -> real_escape_string($boardName);
    $boardTitle = $connect -> real_escape_string($boardTitle);
    $boardIngre = $connect -> real_escape_string($boardIngre);
    $boardPass = $connect -> real_escape_string($boardPass);

    $memberID = $_SESSION['memberID'];

    $sqlP = "SELECT memberID FROM onlyboard WHERE boardID = $boardID";
    $boardIDPa = $connect -> query($sqlP);
    $boardIDPaInfo = $boardIDPa -> fetch_array(MYSQLI_ASSOC);
    // echo $boardIDPaInfo['memberID'];
    
    $sqlPa = "SELECT youPass FROM member WHERE memberID = $boardIDPaInfo[memberID]";
    $boardIDPass = $connect -> query($sqlPa);
    $boardIDPassInfo = $boardIDPass -> fetch_array(MYSQLI_ASSOC);
    // echo $boardIDPassInfo['youPass'];
    
    // echo $boardID, $boardName, $boardTitle, $memberID, $boardIngre, $boardPass, $count;


    $sql = "SELECT * FROM member WHERE memberID = '$memberID'";
    $result = $connect -> query($sql);

    if($result){
        $info = $result -> fetch_array(MYSQLI_ASSOC);

        if($info['MemberID'] == $memberID && $boardIDPassInfo['youPass'] == $boardPass){
            $sql = "UPDATE onlyboard SET boardName = '$boardName', boardTitle = '$boardTitle', boardIngre = '$boardIngre' WHERE boardID='$boardID'";
            $connect -> query($sql);
            for($i=1; $i<=$count; $i++){
                $ii = $i-1;
                $sql = "UPDATE onlyboard SET boardContents$i = '$boardArray[$ii]' WHERE boardID = '$boardID'";
                $connect -> query($sql);
            }

            if($_FILES['boardImg1']['name'] != ""){
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
                $sql = "UPDATE onlyboard SET ImgSrc1 = '$boardImgName1', ImgSize1 = '$boardImgSize1' WHERE boardID = '$boardID'";
                $connect -> query($sql);
            }
            if(isset($_FILES['boardImg2'])){
                if($_FILES['boardImg2']['name'] != ""){
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
                    $sql = "UPDATE onlyboard SET ImgSrc2 = '$boardImgName2', ImgSize2 = '$boardImgSize2' WHERE boardID = '$boardID'";
                    $connect -> query($sql);
                }
            }
            if(isset($_FILES['boardImg3'])){
                if($_FILES['boardImg3']['name'] != ""){
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
                    $sql = "UPDATE onlyboard SET ImgSrc3 = '$boardImgName3', ImgSize3 = '$boardImgSize3' WHERE boardID = '$boardID'";
                    $connect -> query($sql);
                }
            }
            if(isset($_FILES['boardImg4'])){
                if($_FILES['boardImg4']['name'] != ""){
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
                    $sql = "UPDATE onlyboard SET ImgSrc4 = '$boardImgName4', ImgSize4 = '$boardImgSize4' WHERE boardID = '$boardID'";
                    $connect -> query($sql);
                }
            }
            if(isset($_FILES['boardImg5'])){
                if($_FILES['boardImg5']['name'] != ""){
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
                    $sql = "UPDATE onlyboard SET ImgSrc5 = '$boardImgName5', ImgSize5 = '$boardImgSize5' WHERE boardID = '$boardID'";
                    $connect -> query($sql);
                }
            }
            Header("Location: boardView.php?boardID=$boardID");
        } else {
            echo "<script>alert('비밀번호가 일치하지 않습니다.'); window.history.back();</script>";
            // echo $boardIDPaInfo['memberID'];
            // echo $boardIDPassInfo['youPass'];
        }
    }
?>