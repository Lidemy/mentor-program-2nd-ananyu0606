<?php
include_once("./template/check_login.php");
include_once("./template/conn.php");

echo "<script>alert('刪除的留言是不會回頭的！')</script>";

$comment_id = $_GET["comment_id"];

$sql = "DELETE FROM ann_comments WHERE (id = '$comment_id' OR parent_id = '$comment_id') AND username = '$username' ";
if ($conn->query($sql) === TRUE){
    echo "<script>alert('留言已刪除'); window.location='./main.php'</script>";
} else{
    echo $sql . "<br>";
    echo "error message" . $conn->error;
}



?>