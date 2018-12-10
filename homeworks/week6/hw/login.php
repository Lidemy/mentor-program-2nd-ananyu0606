<?php
    if (!isset($_SESSION)){
        session_start();
    }
    include_once('./template/utils.php');
    include_once('./template/conn.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Welcome to the login page</title>
    <!-- 思源字體 -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/earlyaccess/notosanstc.css">
    <!-- css -->
    <link type="text/css" rel="stylesheet" href="./css/login_style.css">
    <script tyep="text/javascript" src="./js/login_script.js"></script>
</head>

<body>
    <div class="welcome_message">
        <div class="cookie_set">
            <?php
                if (isset($_SESSION['username'])) {
                    echo "你好，歡迎回來！";
                    echo $_SESSION['username'];
                } 
                else {
            ?>
        </div>
        <div class="<?php echo "no_cookie"; ?>">
            <div>
                <?php 
                echo "親愛的訪客您好，請先登入或註冊 </br>(v3 加入 session 機制、防止 SQL injection)";
            } 
            ?>
            </div>
        </div>
    </div>

    <div class="login">
        <div class="loginblock">
            <div class="loginblock_title">登入區</div>
            <div class="wrapper">
                <form action="handle_login.php" method="POST">
                    <div class="input username">
                        帳號: <input type="text" name="username">
                    </div>
                    <div class="input password">
                        密碼: <input type="password" name="password">
                    </div>
                    <div class="submit">
                        <!-- <input type="submit" value="登入"> -->
                        <button class="login_submit" type="submit"> 登入 </button>
                    </div>
                </form>
            </div>
        </div>

        <div class="loginblock">
            <div class="loginblock_title">註冊區</div>
            <div class="wrapper">
                <form action="handle_register.php" method="POST">
                    <div class="input username">
                        帳號: <input type="text" name="username">
                    </div>
                    <div class="input password">
                        密碼: <input type="password" name="password">
                    </div>
                    <div class="input nickname">
                        暱稱: <input type="text" name="nickname">
                    </div>
                    <div class="submit">
                        <!-- <input type="submit" value="快速註冊"> -->
                        <button class="login_submit" type="submit">快速註冊</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="logged_in">
        <div class="goto_comments">
            <form action="main.php">
                <button class="logged_in_button" type="submit">前往留言板</button>
            </form>
        </div>
        <div class="logout">
            <form action="./unset_session.php">
                <button class="logged_in_button" type="submit">登出</button>
            </form>
        </div>
    </div>


    <!-- <div class="test">
        <div class="test_wrapper">
            <div>測試區</div>
            <form action="./template/set_to_zero.php" method="GET">
                <input type="submit" value="將會員資料清空並歸零" name="membership_set_to_zero">
            </form>
            <form action="./template/create_table.php">
                <input type="submit" value="建立新資料庫">
            </form>
        
        </div>
    </div> -->


</body>

</html>