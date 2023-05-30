<?php
    include "../connect/connect.php";

    $type = $_POST['type'];
    $jsonResult = "bad";

    if( $type == "isIDCheck"){
        $ID = $_POST['youID'];
        $youID = $connect -> real_escape_string(trim($ID));
        $sql = "SELECT youID FROM member WHERE youID = '{$youID}'";
    }

    if( $type == "isPwCheck"){
        $ID = $_POST['youID'];
        $Pw = $_POST['youPw'];
        $youID = $connect -> real_escape_string(trim($ID));
        $youPw = $connect -> real_escape_string(trim($Pw));
        $sql = "SELECT youPass FROM member WHERE youID = '{$youID}' AND youPass = '{$youPw}'";
    }

    $result = $connect -> query($sql);

    if($result -> num_rows == 0){
        $jsonResult = "good";
    }

    echo json_encode(array("result" => $jsonResult));
?>