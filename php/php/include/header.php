<header id="header">
    <div class="container">
        <a href="../main/main.php"><img src="../../assets/img/logo.png" alt="로고이미지"></a>
        <ul>
            <li><a href="../cate/cate.php">카테고리</a></li>
            <li><a href="../board/board.php">요리방</a></li>
            <?php
                if(isset($_SESSION['memberID'])){   ?>
                        <li><a href="../mypage/mypage.php"><?=$_SESSION['youNick']?>님 🍊</a></li>
                        <li><a href="../login/logout.php">로그아웃</a></li>
                <?php } else { ?>
                        <li><a href="../login/login.php">로그인</a></li>
                        <li><a href="../join/join.php">회원가입</a></li>
                <?php } ?>
        </ul>
    </div>
</header>