<?php
    include "../connect/connect.php";

    // SELECT youEmail FROM adminMembers WHERE youEmail = {}

    $type = $_POST['type'];
    $jsonResult = "bad";

    if($type == "isEmailCheck"){
        $youEmail = $connect -> real_escape_string(trim($_POST['youEmail']));
        $sql = "SELECT youEmail FROM member WHERE youEmail = '{$youEmail}'";
    }

    if($type == "isNickCheck"){
        $youNick = $connect -> real_escape_string(trim($_POST['youNick']));
        $sql = "SELECT youNick FROM member WHERE youNick = '{$youNick}'";
    };

    if( $type == "isIDCheck"){
        $ID = $_POST['youID'];
        $youID = $connect -> real_escape_string(trim($ID));
        $sql = "SELECT youID FROM member WHERE youID = '{$youID}'";
    }

    if( $type == "isPhoneCheck"){
        $Phone = $_POST['youPhone'];
        $youPhone = $connect -> real_escape_string(trim($Phone));
        $sql = "SELECT youPhone FROM member WHERE youPhone = '{$youPhone}'";
    }

    $result = $connect -> query($sql);

    if($result -> num_rows == 0){
        $jsonResult = "good";
    }

    echo json_encode(array("result" => $jsonResult));
?>