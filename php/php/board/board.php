<?php
    include "../connect/connect.php";
    include "../connect/session.php";
?>

<!DOCTYPE html>
<html lang="ko">
<head>
<?php include "../include/head.php"; ?>
    <title>요리방 메인</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css"/>

    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
    <style>
        /* board */
        .board {
            margin-top: 100px;
            background-color: blanchedalmond;
            width: 100%;
            height: 500px;
            text-align: center;
            min-height: 500px;
            
        }
        .board .container {
            width: 1160px;
            height: 400px;
            position: relative;
        }
        .board__inner {
            height: 195px;
            text-align: center;
        }
        .board__inner h1 {
            font-size: 50px;
            font-weight: 500;
            padding-top: 90px;
        }
        .board__inner form {
            margin-top: 100px;
            display: flex;
            justify-content: space-between;
        }
        .board__inner input {
            width: 80%;
            height: 90px;
            background-color: #ffffffbb;
            font-size: 24px;
            border: 0;
            border-radius: 10px; 
            padding: 0 30px;
            font-family: SBAggro;
            font-weight: lighter;
        }
        .board__inner button {
            position: relative;
            width: 12%;
            height: 90px;
            border-radius: 10px;
            background-color: #ffffffbb;
            cursor: pointer;
        }
        .board__inner button::before {
            content: '';
            width: 55px;
            height: 55px;
            position: absolute;
            left: 50%;
            top: 50%;
            transform: translate(-50%, -50%);
            background-image: url("data:image/svg+xml,%0A%3Csvg width='60' height='60' viewBox='0 0 60 60' fill='none' xmlns='http://www.w3.org/2000/svg' xmlns:xlink='http://www.w3.org/1999/xlink'%3E%3Crect width='60' height='60' fill='url(%23pattern0)'/%3E%3Cdefs%3E%3Cpattern id='pattern0' patternContentUnits='objectBoundingBox' width='1' height='1'%3E%3Cuse xlink:href='%23image0_1_15' transform='translate(0.0333333 0.05) scale(0.00716146)'/%3E%3C/pattern%3E%3Cimage id='image0_1_15' width='128' height='128' xlink:href='data:image/png;base64,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'/%3E%3C/defs%3E%3C/svg%3E%0A");
            background-size: cover;
            background-position: center;
        }
         /* content */
        .board_slider {
            margin-top: 100px;
            min-height: 500px;
        }
        .board_slider .title {
            font-size: 50px;
            font-weight: 500;
            text-align: center;
            /* margin-bottom: 70px; */
        }
        .content__inner {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
            align-items: center;
            width: 100%;
            height: 100%;
            margin: 0 auto;
            margin-top: 30px;
        }
        .content__inner > div {
            width: 18%;
            padding: 2px;
            text-align: center;
            background-color: rgba(231, 231, 231, 0.27);
            border-radius: 10px;
        }
        .content__inner > div img {
            width: 50%;
            height: 150px;
        }
        .content__inner > div p {
            display: block;
            font-size: 30px;
            font-weight: 500;
            padding-bottom: 25px;
        }
        .swiper {
            width: 100%;
            height: 400px;
        }
        .swiper-slide .wrap {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        .swiper-slide .inner {
            width: 30%;
            height: 12vw;
            border: 1px solid red;
        }
        /* board_table */
        .board_table {
            margin-top: 100px;
        }
        .board_desc {
            display: flex;
            justify-content: space-between;
        }
        .board_desc h2 {
            font-size: 24px;
            font-weight: 500;
        }
        .board_table table {
            margin-top: 10px;
            margin-bottom: 60px;
            border-top: 2px solid #000;
            border-bottom: 2px solid #000;
            text-align: center;
            width: 100%;
            font-weight: 100;
        }
        .board_table table tr:hover{
            background-color: #efefef;
        }
        .board_table table th {
            /* background-color: #aaa; */
            border-bottom: 1px solid #000;
            padding: 15px 5px;
            font-weight: 500;
        }
        .board_table table td {
            padding: 15px 5px;
            border-bottom: 1px solid #000;
        }
        .board_table table td span {
            font-weight: 500;
        }
        .board_table table td h4 {
            font-weight: 100;
        }
        .board_table table td a {
            text-align: left;
        }
        .board_table table td a:hover {
            text-decoration: underline;
            text-underline-position: under;
        }
        .board_table table tbody tr td:nth-of-type(2) {
            padding-left: 100px; 
            text-align: left;
        }
        .board_table table tbody tr td:nth-of-type(2) a {
            margin-bottom: 5px; 
            display: block; 
            font-size: 24px; 
        }
        .board_table table tbody tr td:nth-of-type(2) p {
            color:#aaa;
        }
        .board_pages {
            margin-top: 120px;
            margin-bottom: 140px;
        }
        .board_pages ul {
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .board_pages ul li.active a {
            background-color: #000;
            color: #fff;
        }
        .board_pages ul li a {
            border: 1px solid #bbb;
            padding: 10px 13px;
            margin-left: -1px;
        }
        .board_pages ul li a:hover{
            background-color: #efefef;
            color: #000;
        }
        .board_view {
            margin-top: 40px;
            border-top: 2px solid #000;
            border-bottom: 2px solid #000;
        }
        .board_view table td,
        .board_view table th {
            border-bottom: 1px solid #000;
            padding: 15px;
        }
        .board_view table tr:last-child td {
            height: 500px;
            vertical-align: top;
        }
        .board_view table th {
            background-color: #aaa;
        }
        .board_btn {
            margin-top: 20px;
            text-align: right;
        }
        .board_write {
            padding: 50px 0 100px;
        }
        .board_write label {
            width: 100%;
            font-size: 20px;
            display: block;
            margin-bottom: 10px;
        }
        .board_write input {
            margin-bottom: 50px;
        }
        .board_write textarea {
            padding: 2em;
            resize: none;
        }
        .board_write button {
            float: right;
            margin-top: 10px;
        }
        .board__name {
            font-size: 14px;
            background-color: #FFEBCD;
            padding: 2px 7px;
            border-radius: 20px;
        }
        #viwrap{
            width: 100%;
            height: 700px;
            background-color: #ffae7f96;
            margin-top: 50px;
        }
        .vicontainer {
            width: 1217px;
            height: 460px;
            margin: 0 auto;
            background-color: #ffffff56;
            border-radius: 20px;
            box-shadow: 4px 4px 10px rgba(0, 0, 0, 0.3);
            margin-top: 30px;
            display: flex;
        }
        .vaside {
            width: 550px;
            height: 397px;
            margin-left: 50px;
            margin-top: 30px;
        }
        .vaside h1 {
            font-size: 35px;
            font-weight: bold;
            text-align: center;
            padding-top: 50px;
            word-break: keep-all;
        }
        .vaside h3 {
            font-size: 25px;
            text-align: center;
            padding-top: 30px;
        }
        .vaside p {
            font-size: 16px;
            font-weight: lighter;
            color: #666;
            text-align: center;
            padding-top: 50px;
        }
        .vaside h4 {
            font-size: 18px;
            font-weight: lighter;
            text-align: center;
            padding-top: 80px;
        }
        .vcontent {
            width: 566px;
            height: 397px;
            background-color: #ffe1a075;
            margin-right: 50px;
            margin-top: 30px;
            border-radius: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            box-shadow: 4px 4px 10px rgba(0, 0, 0, 0.3);
        }
        .vcontent img {
            max-width: 200%;
            max-height: 200%;
            cursor: pointer;
        }
        .vi1  {
            display: flex;
            align-items: center;
            justify-content: center;
            flex-wrap: wrap
        }
        .vi1 h1 {
            font-size: 60px;
            text-align: center;
            padding-top: 80px;
        }
        .vi1 .left-image {
            margin-right: 10px;
            width: 100px;
            height: 100px;
            margin-top: 70px;
        }
        .vi1 .right-image {
            margin-left: 10px;
            margin-top: 70px;
            width: 100px;
            height: 100px;
        }
        .boardtable__contents {
            overflow: hidden;
            word-wrap: break-word;
            display: -webkit-box;
            -webkit-line-clamp: 1;
            -webkit-box-orient: vertical;
        }
        @keyframes rotate {
            0% {
                transform: rotateY(0deg);
        }
            100% {
                transform: rotateY(720deg);
        }
        }

        .vi1 img {
            animation: rotate 2s linear infinite;
        }
    </style>
</head>
<body>
    <?php include "../include/header.php" ?>
    <main id="main" class="aggro">
        <div id="viwrap">
            <div class="vi1">
                <img src="../../assets/img/victory.png" alt="" class="left-image"> 
                <h1>요리방 상금 백만 원의 주인공</h1>
                <img src="../../assets/img/victory.png" alt="" class="right-image">
            </div>
            <div class="vicontainer">
                <div class="vaside">
<?php
    $sql = "SELECT * FROM onlyboard ORDER BY boardView DESC LIMIT 1";
    $result = $connect -> query($sql);

    $info = $result -> fetch_array(MYSQLI_ASSOC);
    // echo "<pre>";
    // echo var_dump($info);
    // echo "</pre>";
?>
                    <h3>🍒 맛있는 우리네 레시피 🍒</h3>
                    <h1><?=$info['boardTitle']?></h1>
                    <p><?=$info['boardAuthor']?>님  |  <?=date('y. m. d', $info['regTime'])?> |  조회수 <?=$info['boardView']?></p>
                    <h4>언제든지 레시피를 올려보세요. <br> 여러분의 이야기가 많은 분들께 도움이 됩니다 !</h4>
                </div>
                <div class="vcontent">
                    <a href="boardView.php?boardID=<?=$info['boardID']?>"><img src="../img/board/<?=$info['ImgSrc1']?>" alt="게시판 첫 번째 이미지"></a>
                </div>
            </div>
        </div>
        <div class="board_slider">
            <div class="container">
                <h2 class="title">많이 찾고 있는 레시피</h2>
                <div class="swiper">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="content__inner">
                                <div>
                                    <a href="boardView.php?boardID=20">
                                        <img src="../../assets/img/board01.svg" alt="당근스프">
                                        <p>당근스프</p>
                                    </a>
                                </div>
                                <div>
                                    <a href="boardView.php?boardID=19">
                                        <img src="../../assets/img/board02.svg" alt="당근주스">
                                        <p>당근주스</p>
                                    </a>
                                </div>
                                <div>
                                    <a href="boardView.php?boardID=18">
                                        <img src="../../assets/img/board03.svg" alt="당근카레">
                                        <p>당근카레</p>
                                    </a>
                                </div>
                                <div>
                                    <a href="boardView.php?boardID=17">
                                        <img src="../../assets/img/board04.svg" alt="생성구이">
                                        <p>생선구이</p>
                                    </a>
                                </div>
                                <div>
                                    <a href="boardView.php?boardID=16">
                                        <img src="../../assets/img/board05.svg" alt="양송이스프">
                                        <p>양송이스프</p>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="content__inner">
                                <div>
                                    <a href="#">
                                        <img src="../../assets/img/board06.svg" alt="샐러드">
                                        <p>샐러드</p>
                                    </a>
                                </div>
                                <div>
                                    <a href="boardView.php?boardID=15">
                                        <img src="../../assets/img/board07.svg" alt="아보카도">
                                        <p>아보카도</p>
                                    </a>
                                </div>
                                <div>
                                    <a href="boardView.php?boardID=13">
                                        <img src="../../assets/img/board08.svg" alt="마녀스프">
                                        <p>마녀스프</p>
                                    </a>
                                </div>
                                <div>
                                    <a href="boardView.php?boardID=12">
                                        <img src="../../assets/img/board09.svg" alt="과일">
                                        <p>과일</p>
                                    </a>
                                </div>
                                <div>
                                    <a href="#">
                                        <img src="../../assets/img/board10.svg" alt="아침사과">
                                        <p>아침사과</p>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="content__inner">
                                <div>
                                    <a href="#">
                                        <img src="../../assets/img/board11.svg" alt="고기">
                                        <p>고기</p>
                                    </a>
                                </div>
                                <div>
                                    <a href="#">
                                        <img src="../../assets/img/board12.svg" alt="브로콜리">
                                        <p>브로콜리</p>
                                    </a>
                                </div>
                                <div>
                                    <a href="#">
                                        <img src="../../assets/img/board13.svg" alt="요거트">
                                        <p>요거트</p>
                                    </a>
                                </div>
                                <div>
                                    <a href="#">
                                        <img src="../../assets/img/board14.svg" alt="비빔밥">
                                        <p>비빔밥</p>
                                    </a>
                                </div>
                                <div>
                                    <a href="#">
                                        <img src="../../assets/img/board15.svg" alt="레디쉬">
                                        <p>레디쉬</p>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- <div class="board">
            <div class="container">
                <div class="board__inner">
                    <h1>COOKING FOR YOU</h1>
                    <form action="#">
                        <input type="text" placeholder="찾고싶은 음식을 검색해보세요" required>
                        <button type="submit"></button>
                    </form>
                </div>
            </div>
        </div> -->
        <div class="board_table">
            <div class="container">
                <div class="board_desc">
                    <h2>최근레시피 목록</h2>
                    <a href="boardWrite.php" class="btnStyle3">글쓰기</a>
                </div>
                <table class="aggro">
                    <colgroup>
                        <col style="width: 15%;">
                        <col>
                        <col style="width: 10%;">
                        <col style="width: 15%;">
                        <col style="width: 7%;">
                    </colgroup>
                    <thead>
                        <tr>
                            <th>번호</th>
                            <th>제목</th>
                            <th>등록자</th>
                            <th>동록일</th>
                            <th>조회수</th>
                        </tr>
                    </thead>
                    <tbody>
<?php
    if(isset($_GET['page'])){
        $page = (int)$_GET['page'];
    } else {
        $page = 1;
    }

    $viewNum = 10;
    $viewLimit = ($viewNum * $page) - $viewNum;

    $sql = "SELECT boardID, boardName, boardAuthor, boardTitle, boardView, boardContents1, regTime FROM onlyboard ORDER BY boardID DESC LIMIT {$viewLimit}, {$viewNum}";
    $result = $connect -> query($sql);

    if($result){
        $count = $result -> num_rows;
        // echo $count;

        if($count > 0){
            for($i=0; $i<$count; $i++){
                $info = $result -> fetch_array(MYSQLI_ASSOC);

                echo "<tr>";
                echo "<td>";
                echo "<span>".$info['boardID']."</span>";
                echo "<h4 class='board__name'>".$info['boardName']."</h4>";
                echo "</td>";
                echo "<td>";
                echo "<a href='boardView.php?boardID={$info['boardID']}'>".$info['boardTitle']."</a>";
                echo "<p class='boardtable__contents'>".$info['boardContents1']."</p>";
                echo "</td>";
                echo "<td>".$info['boardAuthor']."</td>";
                echo "<td>".date('y. m. d', $info['regTime'])."</td>";
                echo "<td>".$info['boardView']."</td>";
            }
        }
    }
?>
                        <!-- <tr>
                            <td>
                                <span>10</span>
                                <h4 class="board__name">당근스프</h4>
                            </td>
                            <td>
                                <a href="boardView.html">달래를 이용해 요리를 해보았어요.</a>
                                <p>요즘에 자주 해먹는 달래를 재료로 달래무침을 만들어 보았습니다. <br>역시 재철이라 그런지 향기도 너무 좋고 봄이 온 느낌도 들어서 너무 맛있게 ...</p>
                            </td>
                            <td>홍길동</td>
                            <td>2023-05-08</td>
                            <td>100</td>
                        </tr>
                        <tr>
                            <td>6</td>
                            <td>
                                <a href="boardView.html">달래를 이용해 요리를 해보았어요.</a>
                                <p>요즘에 자주 해먹는 달래를 재료로 달래무침을 만들어 보았습니다. <br>역시 재철이라 그런지 향기도 너무 좋고 봄이 온 느낌도 들어서 너무 맛있게 ...</p>
                            </td>
                            <td>홍길동</td>
                            <td>2023-05-08</td>
                            <td>100</td>
                        </tr><tr>
                            <td>5</td>
                            <td>
                                <a href="boardView.html">달래를 이용해 요리를 해보았어요.</a>
                                <p>요즘에 자주 해먹는 달래를 재료로 달래무침을 만들어 보았습니다. <br>역시 재철이라 그런지 향기도 너무 좋고 봄이 온 느낌도 들어서 너무 맛있게 ...</p>
                            </td>
                            <td>홍길동</td>
                            <td>2023-05-08</td>
                            <td>100</td>
                        </tr><tr>
                            <td>4</td>
                            <td>
                                <a href="boardView.html">달래를 이용해 요리를 해보았어요.</a>
                                <p>요즘에 자주 해먹는 달래를 재료로 달래무침을 만들어 보았습니다. <br>역시 재철이라 그런지 향기도 너무 좋고 봄이 온 느낌도 들어서 너무 맛있게 ...</p>
                            </td>
                            <td>홍길동</td>
                            <td>2023-05-08</td>
                            <td>100</td>
                        </tr><tr>
                            <td>3</td>
                            <td>
                                <a href="boardView.html">달래를 이용해 요리를 해보았어요.</a>
                                <p>요즘에 자주 해먹는 달래를 재료로 달래무침을 만들어 보았습니다. <br>역시 재철이라 그런지 향기도 너무 좋고 봄이 온 느낌도 들어서 너무 맛있게 ...</p>
                            </td>
                            <td>홍길동</td>
                            <td>2023-05-08</td>
                            <td>100</td>
                        </tr><tr>
                            <td>2</td>
                            <td>
                                <a href="boardView.html">달래를 이용해 요리를 해보았어요.</a>
                                <p>요즘에 자주 해먹는 달래를 재료로 달래무침을 만들어 보았습니다. <br>역시 재철이라 그런지 향기도 너무 좋고 봄이 온 느낌도 들어서 너무 맛있게 ...</p>
                            </td>
                            <td>홍길동</td>
                            <td>2023-05-08</td>
                            <td>100</td>
                        </tr><tr>
                            <td>1</td>
                            <td>
                                <a href="boardView.html">달래를 이용해 요리를 해보았어요.</a>
                                <p>요즘에 자주 해먹는 달래를 재료로 달래무침을 만들어 보았습니다. <br>역시 재철이라 그런지 향기도 너무 좋고 봄이 온 느낌도 들어서 너무 맛있게 ...</p>
                            </td>
                            <td>홍길동</td>
                            <td>2023-05-08</td>
                            <td>100</td>
                        </tr> -->
                    </tbody>
                </table>
            </div>
        </div>
        <div class="board_pages">
            <ul>
<?php
    // 게시글의 총 개수 + 나오는 페이지 수 -> 둘 다 알아야함

    $sql = "SELECT count(boardID) FROM onlyboard";
    $result = $connect -> query($sql);

    $boardTotalCount = $result -> fetch_array(MYSQLI_ASSOC);
    $boardTotalCount = $boardTotalCount['count(boardID)'];

    //총 페이지 개수
    $boardTotalCount = ceil($boardTotalCount/$viewNum);
    
    $pageView = 4;
    $startPage = $page - $pageView;
    $endPage = $page + $pageView;

    // 처음 페이지 초기화
    if($startPage < 1) $startPage = 1;

    // 마지막 페이지 초기화
    if($endPage >= $boardTotalCount) $endPage = $boardTotalCount;

    // 처음으로, 이전페이지
    if($page > 1 && $page <= $boardTotalCount){
        $prev = $page - 1;
        echo "<li><a href='board.php?page=1'>처음으로</a></li>";
        echo "<li><a href='board.php?page={$prev}'>이전</a></li>";
    }

    // 페이지
    for($i=$startPage; $i<=$endPage; $i++){
        if($page >0 && $page <= $boardTotalCount){
            $active = "";
            if($i == $page) $active = "active";
            echo "<li class='{$active}'><a href='board.php?page={$i}'>{$i}</a></li>";
        }
    }

    // 다음페이지, 마지막페이지
    if($page > 0 && $page < $boardTotalCount){
        $next = $page + 1;
        echo "<li><a href='board.php?page={$next}'>다음</a></li>";
        echo "<li><a href='board.php?page={$boardTotalCount}'>마지막으로</a></li>";
    }
?>
                <!-- <li><a href="#">처음으로</a></li>
                <li><a href="#">이전으로</a></li>
                <li class="active"><a href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">4</a></li>
                <li><a href="#">5</a></li>
                <li><a href="#">6</a></li>
                <li><a href="#">7</a></li>
                <li><a href="#">8</a></li>
                <li><a href="#">다음</a></li>
                <li><a href="#">마지막으로</a></li> -->
            </ul>
        </div>
    </main>
    <!-- main -->
    <?php include "../include/footer.php" ?>

    <script>
        const swiper = new Swiper('.swiper', {
        
        direction: 'horizontal',
        loop: true,

        autoplay: {
            delay: 2500,
        },
        });
    </script>
</body>
</html>