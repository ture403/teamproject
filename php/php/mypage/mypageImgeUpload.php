<?php
    include "../connect/connect.php";
    include "../connect/session.php";
    
    $MemberID= $_SESSION["memberID"];

    $blogImgFile = $_FILES['blogFile'];
    $blogImgSize = $_FILES['blogFile']["size"];
    $blogImgType = $_FILES['blogFile']["type"];
    $blogImgName = $_FILES['blogFile']["name"];
    $blogImgTmp = $_FILES['blogFile']["tmp_name"];



    echo "<pre>";
    var_dump($blogImgFile);
    echo "</pre>";

    if($blogImgType){
        $fileTypeExtension = explode("/",$blogImgType);
        $fileType = $fileTypeExtension[0]; //image
        $fileExtension = $fileTypeExtension[1]; //jpeg

        //이미지 타입 확인
        if($fileType == "image"){
            if($fileExtension == "jpg" ||  $fileExtension == "png" || $fileExtension == "gif"){
                $blogImgDir = "../img/profile/";
                $blogImgName = "Img_".time().rand(1,99999)."."."{$fileExtension}";

                echo "이미지 파일이 맞습니다.";
                $sql = "UPDATE member SET imgSrc ='$blogImgName', imgSize ='$blogImgSize' WHERE memberID ='$MemberID'";
                echo "<script>alert('저장되었습니다.')</script>";
            } else {
                echo "<script>alert('이미지파일이 아닙니다.')</script>";
            }
        } else {
            echo "<script>alert('이미지파일이 아닙니다.')</script>";
        }
    } else {
        echo "이미지 파일을 첨부하지 않았습니다.";
    }

    //이미지 사이즈 확인
    if($blogImgSize > 10000000) {
        echo "<script>alert('이미지 파일 용량이 1메가를 초과했습니다.')</script>";
    }

    $result = $connect ->query($sql);
    $result = move_uploaded_file($blogImgTmp, $blogImgDir.$blogImgName);

    Header("Location:mypage.php");
?>