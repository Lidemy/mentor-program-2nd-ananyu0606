<?php
include_once("./template/conn.php");
include_once("./template/check_login.php")

$comment_id = $_POST["comment_id"];
$edited_comment = $_POST["edited_comment"];
$page = $_COOKIE["page"];

$edit_page = $_SERVER['HTTP_REFERER'];

if (isset($_POST["edited_comment"]) && empty($_POST["edited_comment"])) {
    // echo $edit_page;
    echo "<script>alert('請輸入留言'); window.location='$edit_page'</script>"; 
    
} else {

    $sql = "UPDATE ann_comments SET content = '$edited_comment' WHERE id = $comment_id AND username = '$username'";
// echo $sql;

    if ($conn->query($sql) === true) {
        // echo $page;
        echo "<script>alert('留言修改成功'); window.location='./main.php?page=" .$page. "'</script>";
    } else {
        echo $conn->error;
    }
}

?>