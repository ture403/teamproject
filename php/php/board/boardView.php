<?php
    include "../connect/connect.php";
    include "../connect/session.php";
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../assets/css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css"/>

    <title>요리방 보기</title>

</head>
<body>
    <?php include "../include/header.php" ?>
    <main id="main" class="aggro">
        <div class="boardV__inner">
            <div class="container">
                <h1>맛있는 우리네 레시피</h1>
                <div class="boardV__wrap">
<?php
    if(isset($_GET['boardID'])){
        $boardID = $_GET['boardID'];
        $memberID = $_SESSION['memberID'];

        $check = "SELECT * FROM onlyboard WHERE boardID = '$boardID'";
        $result = $connect -> query($check);
        $checkcount = $result -> num_rows;
        if($checkcount == 0){
            echo "<script>alert('삭제되었거나 존재하지 않는 게시물입니다.'); window.history.back();</script>";
        }

        $sql = "UPDATE onlyboard SET boardView = boardView + 1 WHERE boardID = {$boardID}";
        $connect -> query($sql);
        // boardView 증가

        $sql = "SELECT boardTitle, boardAuthor, regTime, boardView, boardName, boardIngre, memberID FROM onlyboard WHERE boardID = {$boardID}";
        // 제목, 작성자, 작성시간, 조회수, 음식이름, 음식재료 불러오는 쿼리문
        $contsql = "SELECT boardContents1, boardContents2, boardContents3, boardContents4, boardContents5 FROM onlyboard WHERE boardID = {$boardID}";
        // 게시글 본문내용(boardContents)불러오는 쿼리문
        $imgsql = "SELECT ImgSrc1, ImgSrc2, ImgSrc3, ImgSrc4, ImgSrc5 FROM onlyboard WHERE boardID = {$boardID}";
        $result = $connect -> query($sql);
        $contresult = $connect -> query($contsql);
        $imgresult = $connect -> query($imgsql);

        if ($contresult) {
            $continfo = $contresult->fetch_array(MYSQLI_ASSOC);
            $countcont = 0;
            $boardContents = array(
                $continfo['boardContents2'],
                $continfo['boardContents3'],
                $continfo['boardContents4'],
                $continfo['boardContents5'],
            );

            foreach($continfo as $value){
                if($value !== null) {
                    $countcont++;
                }
            }
            // echo $countcont;
            // null이 아닌 contents 개수

            // echo $continfo['boardContents1'], $continfo['boardContents2'], $continfo['boardContents3'], $continfo['boardContents4'], $continfo['boardContents5'];
        }
        
        if ($result) {
            $info = $result->fetch_array(MYSQLI_ASSOC);

            // echo $info['boardTitle'], $info['boardAuthor'], $info['boardView'], $info['boardName'], $info['boardIngre'];
        }

        if($imgresult) {
            $imginfo = $imgresult->fetch_array(MYSQLI_ASSOC);
            $imgSrc = array(
                $imginfo['ImgSrc2'],
                $imginfo['ImgSrc3'],
                $imginfo['ImgSrc4'],
                $imginfo['ImgSrc5']
            );
            // echo var_dump($imgSrc);
            // echo $imginfo['ImgSrc1'];
        }
    }
?>
                    <h2><?=$info['boardTitle']?></h2>
                    <div class="boardV__info">
                        <span><?=$info['boardAuthor']?></span>
                        <span><?=date('y. m. d',$info['regTime'])?></span>
                        <span>조회수 <?=$info['boardView']?></span>
                    </div>
                    <h3>음식종류</h3>
                    <div class="board__contents">
                        <h4><?=$info['boardName']?></h4>
                    </div>
                    <h3>재료</h3>
                    <div class="board__contents">
                        <span><?=$info['boardIngre']?></span>
                    </div>
                    <div class="board__contents">
                        <div class="swiper">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
<?php
    if($imginfo['ImgSrc1'] !== null && $imginfo['ImgSrc1'] != ""){
        echo "<img src='../img/board/".$imginfo['ImgSrc1']."' alt='업로드이미지'>";
    } else {
        echo "<img src='../img/board/default.png' alt='업로드이미지'>";
    }
?>
                                    <span>
                                        <?=$continfo['boardContents1']?>
                                    </span>
                                </div>
<?php
    if($countcont > 1){
        for($i=0; $i<$countcont-1; $i++){
            echo "<div class='swiper-slide'>";
            if($imgSrc[$i] !== null && $imgSrc[$i] != ""){
                echo "<img src='../img/board/".$imgSrc[$i]."' alt='업로드이미지'>";
            } else {
                echo "<img src='../img/board/default.png' alt='업로드이미지'>";
            }
            echo "<span>".$boardContents[$i]."</span>";
            echo "</div>";
        }
    }
?>
                            </div>
                            <div class="swiper-button-prev"></div>
                            <div class="swiper-button-next"></div>
                        </div>
                    </div>
                </div>
                <div class="board_btn mb100">
<?php
    if($info['memberID'] == $memberID){
        echo "<a href='boardRemove.php?boardID=$boardID' class='btnStyle4' onclick=\"return confirm('정말 삭제하시겠습니까?', '');\">삭제</a>";
        echo "<a href='boardModify.php?boardID=$boardID' class='btnStyle4'>수정</a>";
    }
?>
                    <!-- <a href="boardRemove.php?boardID=<?=$_GET['boardID']?>" class="btnStyle4" onclick="return confirm('정말 삭제하시겠습니까?', '')">삭제</a>
                    <a href="boardModify.php?boardID=<?=$_GET['boardID'] ?>" class="btnStyle4">수정</a> -->
                    <a href="board.php" class="btnStyle4">목록</a>
                </div>
            </div>
        </div>
    </main>
    <?php include "../include/footer.php" ?>
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
    <script>
        const swiper = new Swiper('.swiper', {
            // Optional parameters
            direction: 'horizontal',
            loop: false,

            pagination: {
                el: '.swiper-pagination',
            },

            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
        });
    </script>
</body>
</html>