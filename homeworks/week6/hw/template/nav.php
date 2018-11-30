<?php 
require("check_login.php");

/* 
   為什麼在 main.php 及 edit_comment.php 中已經 require 過 check_login.php 這個檔案
   在 nav.php 中還是必須 require 一次，否則就無法使用 $username 這個變數？
   如果不在 nav.php 中 require("check_login.php")， $username 就會印出 root ，而非使用者帳號。
   
   但是 utils.php 以及 conn.php 這兩個檔案卻不需要在 nav.php 中再 require，
   卻可以在main.php 及 edit_comment.php 頁面中正確的顯示 escape() 的成果 及 $conn 變數？
*/

// require_once("utils.php");
// include_once("conn.php");

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
                echo $username;
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