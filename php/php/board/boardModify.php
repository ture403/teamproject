<?php 
    include "../connect/connect.php";
    include "../connect/session.php";
    include "../connect/sessionCheck.php";

    // echo "<pre>";
    // var_dump($_SESSION);
    // echo "</pre>";
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../assets/css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css">

    <style>
        form input::file-selector-button {
            display: none;
            align-items: flex-end;
        }
    </style>
    <title>Only For You</title>
</head>
<body>
    <?php include "../include/header.php" ?>
    <main id="main" class="aggro">
        <div class="container">
            <div class="boardW__inner mb100">
                <h1>요리방 공유 레시피 수정하기</h1>
                <div class="boardW__write">
                    <form action="boardModifySave.php" name="boardModify" method="post" enctype="multipart/form-data">
                        <fieldset class="field1">
                            <legend class="blind">게시글 작성하기</legend>
<?php
    $boardID = $_GET['boardID'];
    $countcont = 0;

    $sql = "SELECT * FROM onlyboard WHERE boardID = {$boardID}";
    $contsql = "SELECT boardContents1, boardContents2, boardContents3, boardContents4, boardContents5 FROM onlyboard WHERE boardID = {$boardID}";
    $imgsql = "SELECT ImgSrc1, ImgSrc2, ImgSrc3, ImgSrc4, ImgSrc5 FROM onlyboard WHERE boardID = {$boardID}";
    $result = $connect -> query($sql);
    $contresult = $connect -> query($contsql);
    $imgresult = $connect -> query($imgsql);

    if($result){
        $info = $result -> fetch_array(MYSQLI_ASSOC);
        echo "<div style='display:none'><label for='boardID'>번호</label><input type='text' id='boardID' name='boardID' class='inputStyle' value='".$info['boardID']."'></div>";
    }
    if($contresult){
        $continfo = $contresult -> fetch_array(MYSQLI_ASSOC);
        $boardContents = array(
            $continfo['boardContents1'],
            $continfo['boardContents2'],
            $continfo['boardContents3'],
            $continfo['boardContents4'],
            $continfo['boardContents5']
        );
        foreach($continfo as $value){
            if($value !== null) {
                $countcont++;
            }
        }
    }
    if($imgresult) {
        $imginfo = $imgresult->fetch_array(MYSQLI_ASSOC);
        $imgSrc = array(
            $imginfo['ImgSrc1'],
            $imginfo['ImgSrc2'],
            $imginfo['ImgSrc3'],
            $imginfo['ImgSrc4'],
            $imginfo['ImgSrc5']
        );
    }
?>
                            <div>
                                <label for="boardName">음식종류</label>
                                <input type="text" id="boardName" name="boardName" class="inputStyle boardName" placeholder="음식 이름이 무엇인가요 ?" required value="<?=$info['boardName']?>">
                            </div>
                            <div>
                                <label for="boardTitle">제목</label>
                                <input type="text" id="boardTitle" name="boardTitle" class="inputStyle" placeholder="레시피에 어울리는 제목을 입력해주세요." required value="<?=$info['boardTitle']?>">
                            </div>
                            <div>
                                <label for="boardIngre">재료</label>
                                <input type="text" id="boardIngre" name="boardIngre" class="inputStyle" placeholder="요리에 필요한 재료를 입력해주세요." required value="<?=$info['boardIngre']?>">
                            </div>
                            <!-- <div>
                                <label for="boardImg1" class="img__upload">사진 첨부하기</label>
                                <input type="file" id="boardImg1" name="boardImg1" class="inputStyle2" accept=".jpg, .jpeg, .png, .gif" placeholder="jpg, png, gif 파일만 가능합니다. 이미지 용량은 1MB를 넘길 수 없습니다.">
                                <p>사진을 변경하실 수 있습니다.</p>
                            </div>
                            <div>
                                <label for="boardContents1">레시피</label>
                                <textarea name="boardContents1" id="boardContents1" rows="20" class="inputStyle" placeholder="구체적인 레시피의 내용을 적어주세요. 최대 다섯 장까지 가능합니다." required><?=$info['boardContents1']?></textarea>
                            </div> -->
<?php
    // echo var_dump($boardContents);
    for($i=1; $i<=$countcont; $i++){
        $contents = $i - 1;
        if($imgSrc[$contents] !== null && $imgSrc[$contents] != ""){
            echo "<img src='../img/board/".$imgSrc[$contents]."' alt='업로드이미지' class='modi__img'>";
        } else {
            echo "<img src='../img/board/default.png' alt='업로드이미지' class='modi__img'>";
        }
        echo "
            <div>
                <label for='boardImg$i' class='img__upload'>사진 첨부하기</label>
                <input type='file' id='boardImg$i' name='boardImg$i' class='inputStyle2' accept='.jpg, .jpeg, .png, .gif' placeholder='jpg, png, gif 파일만 가능합니다. 이미지 용량은 1MB를 넘길 수 없습니다.'>
                <p>사진을 변경하실 수 있습니다.</p>
            </div>
            <div>
                <label for='boardContents$i'>레시피</label>
                <textarea name='boardContents$i' id='boardContents$i' rows='20' class='inputStyle' placeholder='구체적인 레시피의 내용을 적어주세요. 최대 다섯 장까지 가능합니다.' required>$boardContents[$contents]</textarea>
            </div>
        ";
    }
?>
                        </fieldset>
                        <!-- <div class="contents__addbox"></div>
                        <div class="contents__btn">
                            <span class="contents__plus">내용 추가하기</span>
                            <span class="contents__minus hide">내용 삭제하기</span>
                        </div> -->
                        <div class="modi__pass">
                            <label for="modiPass">비밀번호</label>
                            <input type="password" id="modiPass" name="modiPass" class="inputStyle3" placeholder="비밀번호를 입력하세요." required>
                            <input type="text" id="count" name="count" class="inputStyle3" value="<?= $countcont ?>" style='display:none'>
                        </div>
                        <div class="save__btn mt50">
                            <button type="submit" class="btnStyle3 aggro">저장</button>
                            <a href="board.php" class="btnStyle3">취소</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
    <?php include "../include/footer.php" ?>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.5/gsap.min.js"></script>
    <script>
        // const contentsPlus = document.querySelector(".contents__plus");
        // const contentsMinus = document.querySelector(".contents__minus");
        // const contentsAdd = document.querySelector(".contents__addbox");
        // let fieldsetCount = 1;

        // contentsPlus.addEventListener("click", () => {
        //     fieldsetCount++;
        //     if(fieldsetCount <= 5){
        //         if(fieldsetCount > 1){
        //             contentsMinus.classList.remove("hide");
        //         }
        //         if(fieldsetCount == 5){
        //             contentsPlus.classList.add("hide");
        //         }
        //         const newFieldSet = document.createElement("fieldset");
        //         newFieldSet.className = `field${fieldsetCount}`;
        //         newFieldSet.innerHTML = `
        //             <legend class="blind">게시글 추가하기</legend>
        //             <div>
        //                 <label for="boardImg${fieldsetCount}" class="img__upload">사진 첨부하기</label>
        //                 <input type="file" id="boardImg${fieldsetCount}" name="boardImg${fieldsetCount}" class="inputStyle2">
        //                 <p>과정을 알 수 있는 사진이 있다면 올려주세요.</p>
        //             </div>
        //             <div>
        //                 <label for="boardContents${fieldsetCount}">레시피 -${fieldsetCount}단계</label>
        //                 <textarea name="boardContents${fieldsetCount}" id="boardContents${fieldsetCount}" rows="20" class="inputStyle" placeholder="구체적인 레시피의 내용을 적어주세요. 최대 다섯 장까지 가능합니다."></textarea>
        //             </div>
        //         `
        //         contentsAdd.appendChild(newFieldSet);
        //         document.querySelector(`.field${fieldsetCount}`).scrollIntoView({behavior: "smooth"});
        //     }
        // });

        // contentsMinus.addEventListener("click", () => {
        //     contentsAdd.removeChild(document.querySelector(`.field${fieldsetCount}`))
        //     fieldsetCount--;
        //     if(fieldsetCount == 1){
        //         contentsMinus.classList.add("hide");
        //     }
        //     if(fieldsetCount < 5){
        //         contentsPlus.classList.remove("hide");
        //     }
        //     document.querySelector(`.field${fieldsetCount}`).scrollIntoView({behavior: "smooth"});
        // });

    </script>
</body>
</html>