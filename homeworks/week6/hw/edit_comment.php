<?php
if (!isset($_SESSION)){
    session_start();
}
include_once("./template/conn.php");
include_once("./template/utils.php");
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link type="text/css" rel="stylesheet" href="./css/main_style.css">
    <title>編輯留言</title>
</head>
<body>

<?php
    if (!isset($_SESSION['username'])) {
        echo "請先登入";
        header("Location: login.php");
    }
    ?>
    <?php 
    include_once("./template/nav.php");
    $comment_id = $_GET["comment_id"];    
    
    $sql = "SELECT * FROM ann_comments WHERE id= $comment_id";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();    
    
    ?>
    <div class="container">
            <div class="form_wrapper">
                <form class="comments_form" action="./handle_edit_comment.php" method="POST">
                    <input type="hidden" value=<?php echo $comment_id ?> name="comment_id">
                    <div class="form_row">
                    留言人：
                        <?php echo fetch_name($conn, "username"); ?>
                    </div>
                    <div class="form_row">
                        暱稱：
                        <?php echo escape(fetch_name($conn, "nickname")); ?>
                    </div>
                    <textarea class="comments_area" cols="60" placeholder="請輸入留言" name="edited_comment"><?php echo $row['content'];?></textarea>
                    <div class="form_submit">
                        <button type="submit" class="submit_button">送出</button>
                    </div>
                </form>
                <form action="./main.php" style="position: relative;">
                    <button type="submit" style="position: absolute; top: 5px; right: 3px;">放棄編輯</button>
                </form>
            </div>
        </div>
    
</body>
</html>