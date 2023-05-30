<?php
    include "../connect/connect.php";
    include "../connect/session.php";
    include "../connect/sessionCheck.php";

    $boardID = $_GET['boardID'];
    $boardID = $connect -> real_escape_string($boardID);

    $check = "SELECT memberID FROM onlyboard WHERE boardID = '$boardID'";
    $result = $connect -> query($check);
    $sss = $result -> fetch_array(MYSQLI_ASSOC);
    
    echo $_SESSION['memberID'];
    echo $sss['memberID'];

    if($sss['memberID'] == $_SESSION['memberID']){
        $sql = "DELETE FROM onlyboard WHERE boardID = {$boardID}";
        $connect -> query($sql);
    } else {
        echo "<script>alert('작성자 본인만 삭제할 수 있습니다.'); window.history.back();</script>";
    }

?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>레시피 삭제 완료</title>
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
        .upcontainer .a {
            width: 33%;
            display: flex;
            justify-content: space-between;
            margin: 0 auto;
        }
    </style>
</head>
<body>
<?php include "../include/header.php" ?>
    <div id="upmain">
        <div class="upcontainer">
            <h1>레시피가 삭제 되었습니다.</h1>
            <p>다른 분들의 레시피도 둘러보세요. 🙌🏻</p>
            <div class="a">
                <a href="boardWrite.php">레시피 작성하기</a>
                <a href="board.php">게시판 돌아가기</a>
            </div>
        </div>
    </div>
<?php include "../include/footer.php" ?>
</body>
</html>

<!-- <script>
    location.href = "board.php";
</script> -->