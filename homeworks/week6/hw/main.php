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
    <title>來留言吧 v3</title>
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
    ?>
    <div class="container">
        <div class="left">
            <div class="form_wrapper">
                <form class="comments_form" action="handle_new_comment.php" method="POST">
                    <input type="hidden" value="0" name="parent_id">
                    <div class="form_row">
                        留言人：
                        <?php echo $_SESSION['username']; ?>
                    </div>
                    <div class="form_row">
                        暱稱：
                        <?php echo escape(fetch_name($conn, "nickname")); ?>
                    </div>
                    <textarea class="comments_area" cols="60" placeholder="請輸入留言" name="new_comment"></textarea>
                    <div class="form_submit">
                        <button type="submit" class="submit_button">送出</button>
                    </div>
                </form>
            </div>
             <!-- 分頁wrapper -->
            <div class="page_wrapper">
                跳至第<?php
                $counts_per_page = 10;
                $count_sql = "SELECT count(*) as count FROM ann_comments WHERE parent_id = 0";
                $count_result = $conn->query($count_sql);
                $total_counts = $count_result->fetch_assoc()['count'];
                                                        
                if ($count_result &&  $count_result->num_rows>0){                                               
                    // 強制進位
                    $total_pages = ceil($total_counts / $counts_per_page);
                    for ($i=1; $i<=$total_pages; $i++){?>

                <span class="page">
                    <a href="./main.php?page=<?php echo $i; ?>"><?php echo $i;?></a>        
                </span>
                    
                <?php
                    }
                }
                if (isset($_GET['page']) && !empty($_GET['page'])){
                    $page = $_GET['page'];
                    $page_cookie = setcookie("page", $page);
                }else {
                    $page = 1;
                }?>
                頁 (每頁顯示 <?php echo  $counts_per_page;?> 筆留言)  
            </div>
        </div>

        <div class="right">
            <div class="comment_wrapper">
                
           

            <!-- 顯示留言內容 -->
                <?php
                $offset_count = ($page-1) * $counts_per_page;                
                $sql = "SELECT c.id, c.content, c.created_at, c.parent_id, c.username, u.nickname 
                FROM ann_comments as c 
                LEFT JOIN ann_users as u 
                ON c.username = u.username
                WHERE c.parent_id = 0
                ORDER BY id DESC
                LIMIT $offset_count, $counts_per_page";
                $result = $conn->query($sql);?>

                <?php if ($result->num_rows > 0) {
                    $message_count = -1; 
                    while ($row = $result->fetch_assoc()) {
                        ?>
    
                <div class="comment">

                    <?php                    
                    $username = $row['username'];
                    $id = $row['id'];
                    render_edit_button($conn, $username, $id);
                    ?>

                    <div class="comment__author"><?php echo  $total_counts - (($page-1) * $counts_per_page + $message_count += 1); echo" 樓";?>作者：
                        <?php echo escape($row['nickname']);
                              ?>
                    </div>
                    <div class="comment__time">時間：
                        <?php echo $row['created_at']; ?>
                    </div>
                    <div class="comment__content">留言內容：
                        <?php echo "<br>" . escape($row['content']); ?>
                    </div>
    
                    <?php
                    $parent_id = $row['id'];
                    $sub_sql = "SELECT c.id, c.content, c.created_at, c.parent_id, c.username, u.nickname 
                    FROM ann_comments as c 
                    LEFT JOIN ann_users as u 
                    ON c.username = u.username
                    WHERE c.parent_id = $parent_id
                    ORDER BY id DESC";
                    $sub_result = $conn->query($sub_sql);
                    if ($sub_result->num_rows > 0) {
                        while ($sub_row = $sub_result->fetch_assoc()) {
                            ?>
    
                    <div class="sub-comments">
                        <?php                    
                        $username = $sub_row['username'];
                        $id = $sub_row['id'];
                        render_edit_button($conn, $username, $id);
                        ?>
                        <div class="comment__author">作者：
                            <?php echo escape($sub_row['nickname']); ?>
                        </div>
                        <div class="comment__time">時間：
                            <?php echo $sub_row['created_at']; ?>
                        </div>
                        <div class="comment__content">留言內容：
                            <?php echo "<br>" . escape($sub_row['content']); ?>
                        </div>
                    </div>
    
                    <?php    
                        }
                    }
                    ?>
    
                    <div class="add-sub-commnet">
                        <div class="form_wrapper">
                            <form class="add-comments_form" action="handle_new_comment.php" method="POST">
                                <h3>新增留言</h3>
                                <input type="hidden" value="<?php echo $parent_id; ?>" name="parent_id">
                                <div class="form_row">
                                    留言人：
                                    <?php echo fetch_name($conn, "username"); ?>
                                </div>
                                <div class="form_row">
                                    暱稱：
                                    <?php echo escape(fetch_name($conn, "nickname")); ?>
                                </div>
                                <textarea class="comments_area" cols="40" placeholder="請輸入留言" name="new_comment"></textarea>
                                <div class="form_submit">
                                    <button type="submit" class="submit_button">送出</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <?php    
                    }
                }
                ?>
            </div>
        </div>
    </div>    

    <div class="test">
        <div class="test_wrapper">
            <div>測試區</div>
            <form action="./template/set_to_zero.php" method="GET">
                <input type="submit" value="將留言資料清空並歸零" name="comment_set_to_zero">
            </form>
        </div>
    </div>

</body>

</html>