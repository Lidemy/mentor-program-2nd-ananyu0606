<?php
// echo "welcome to the message processor <br>";
include_once("./template/check_login.php");
include_once("./template/conn.php");
include_once("./template/utils.php");


if (isset($_POST["new_comment"]) && empty($_POST["new_comment"])){
    echo "<script>alert('請輸入留言'); window.location='./main.php'</script>";
    // echo "空字串"; 
} else{
    $username = $_SESSION["username"];
    $comment = $_POST["new_comment"];
    $parent_id = $_POST["parent_id"];
    
    // $sql = "INSERT INTO ann_comments (parent_id, username, content) VALUES ('$parent_id', '$username', '$comment')";  
    // if ($conn->query($sql) === true) {
    
    // prepare statemen
    $sql = "INSERT INTO ann_comments (parent_id, username, content) VALUES (? ,? ,? )";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('iss', $parent_id, $username, $comment);
    $status = $stmt->execute();
    
    if ($status === true) {
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