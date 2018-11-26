<?php 
include_once("./template/utils.php");
include_once("./template/conn.php")

?>

<nav class="nav">
    <ul class="nav__list nav__left">
        <li class="nav__item">
            <!-- <a href="./login.php">回登入頁</a> -->
            <a href="./main.php" style="margin-left: 20px;">回留言板首頁</a>
        </li>
    </ul>
    <ul class="nav__list nav__right">
        <li class="nav__item">
            <span>
                <?php
                echo "哈囉，";
                echo fetch_name($conn, "username");
                echo " (";
                echo fetch_name($conn, "nickname");
                echo ") ";
                ?>
            </span>
        </li>
        <li class="nav__item">
            <a href="./clear_cookie.php">登出</a>
        </li>
    </ul>
</nav>