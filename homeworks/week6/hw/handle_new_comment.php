<?php
// echo "welcome to the message processor <br>";

include_once("./template/conn.php");
include_once("./template/utils.php");


if (isset($_POST["new_comment"]) && empty($_POST["new_comment"])){
    echo "<script>alert('請輸入留言'); window.location='./main.php'</script>";
    // echo "空字串"; 
} else{
    $username = fetch_name($conn, "username");
    $comment = $_POST["new_comment"];
    $parent_id = $_POST["parent_id"];
    
    // 暫時 ok 的寫法：但是還沒處理 sql injection 的問題，還沒導入 prepared statement 的處理，comment 的內容不能有 ' 單引號
    $sql = "INSERT INTO ann_comments (parent_id, username, content) VALUES ('$parent_id', '$username', '$comment')";
    
    // sql debug 用
    // echo $sql;
    // echo $conn->query($sql);
    
    if ($conn->query($sql) === true) {
        echo "<script>alert('留言新增成功');</script>"; 
        
        if ($parent_id == 0){
            echo "<script>window.location='./main.php'</script>";
        }else {
            $sub_comment_page = $_SERVER['HTTP_REFERER'];
            // echo $sub_comment_page;
            echo "<script>window.location='$sub_comment_page'</script>";
        }
    } else {
        echo "error message: " . $conn->error;
    }
}


?>