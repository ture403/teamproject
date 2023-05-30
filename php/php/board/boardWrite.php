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
                <h1>요리방 공유 레시피 작성하기</h1>
                <div class="boardW__write">
                    <form action="boardWriteSave.php" name="boardWrite" method="post" enctype="multipart/form-data">
                        <fieldset class="field1">
                            <legend class="blind">게시글 작성하기</legend>
                            <div>
                                <label for="boardName">음식종류</label>
                                <input type="text" id="boardName" name="boardName" class="inputStyle boardName" placeholder="음식 이름이 무엇인가요 ?" required>
                            </div>
                            <div>
                                <label for="boardTitle">제목</label>
                                <input type="text" id="boardTitle" name="boardTitle" class="inputStyle" placeholder="레시피에 어울리는 제목을 입력해주세요." required>
                            </div>
                            <div>
                                <label for="boardIngre">재료</label>
                                <input type="text" id="boardIngre" name="boardIngre" class="inputStyle" placeholder="요리에 필요한 재료를 입력해주세요." required>
                            </div>
                            <div>
                                <label for="boardImg1" class="img__upload">사진 첨부하기</label>
                                <input type="file" id="boardImg1" name="boardImg1" class="inputStyle2" accept=".jpg, .jpeg, .png, .gif" placeholder="jpg, png, gif 파일만 가능합니다. 이미지 용량은 1MB를 넘길 수 없습니다.">
                                <p>과정을 알 수 있는 사진이 있다면 올려주세요.</p>
                            </div>
                            <div>
                                <label for="boardContents1">레시피</label>
                                <textarea name="boardContents1" id="boardContents1" rows="20" class="inputStyle" placeholder="구체적인 레시피의 내용을 적어주세요. 최대 다섯 장까지 가능합니다." required></textarea>
                            </div>
                        </fieldset>
                        <div class="contents__addbox"></div>
                        <div class="contents__btn">
                            <span class="contents__plus">내용 추가하기</span>
                            <span class="contents__minus hide">내용 삭제하기</span>
                        </div>
                        <div class="save__btn">
                            <button type="submit" class="btnStyle3 aggro">저장</button>
                            <a href="board.html" class="btnStyle3">취소</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
    <?php include "../include/footer.php" ?>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.5/gsap.min.js"></script>
    <script>
        const contentsPlus = document.querySelector(".contents__plus");
        const contentsMinus = document.querySelector(".contents__minus");
        const contentsAdd = document.querySelector(".contents__addbox");
        let fieldsetCount = 1;

        contentsPlus.addEventListener("click", () => {
            fieldsetCount++;
            if(fieldsetCount <= 5){
                if(fieldsetCount > 1){
                    contentsMinus.classList.remove("hide");
                }
                if(fieldsetCount == 5){
                    contentsPlus.classList.add("hide");
                }
                const newFieldSet = document.createElement("fieldset");
                newFieldSet.className = `field${fieldsetCount}`;
                newFieldSet.innerHTML = `
                    <legend class="blind">게시글 추가하기</legend>
                    <div>
                        <label for="boardImg${fieldsetCount}" class="img__upload">사진 첨부하기</label>
                        <input type="file" id="boardImg${fieldsetCount}" name="boardImg${fieldsetCount}" class="inputStyle2">
                        <p>과정을 알 수 있는 사진이 있다면 올려주세요.</p>
                    </div>
                    <div>
                        <label for="boardContents${fieldsetCount}">레시피 -${fieldsetCount}단계</label>
                        <textarea name="boardContents${fieldsetCount}" id="boardContents${fieldsetCount}" rows="20" class="inputStyle" placeholder="구체적인 레시피의 내용을 적어주세요. 최대 다섯 장까지 가능합니다." required></textarea>
                    </div>
                `
                contentsAdd.appendChild(newFieldSet);
                document.querySelector(`.field${fieldsetCount}`).scrollIntoView({behavior: "smooth"});
            }
        });

        contentsMinus.addEventListener("click", () => {
            contentsAdd.removeChild(document.querySelector(`.field${fieldsetCount}`))
            fieldsetCount--;
            if(fieldsetCount == 1){
                contentsMinus.classList.add("hide");
            }
            if(fieldsetCount < 5){
                contentsPlus.classList.remove("hide");
            }
            document.querySelector(`.field${fieldsetCount}`).scrollIntoView({behavior: "smooth"});
        });

    </script>
</body>
</html>