<?php 
/* 
這些檔案在 nav.php 被引入的 main.php 中都已經被引過了，故在 nav.php 中就不需要再重複引入。

require("check_login.php");
require_once("utils.php");
include_once("conn.php");
*/

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
                // echo $_SESSION['username'];
                echo escape($username);
                echo " (";
                echo escape(fetch_name($conn, "nickname"));
                echo ") ";
                ?>
            </span>
        </li>
        <li class="nav__item">
            <a href="./unset_session.php">登出</a>
        </li>
    </ul>
</nav>