<?php
include_once("./template/conn.php");
include_once("./template/check_login.php");

echo "<script>alert('刪除的留言是不會回頭的！')</script>";

$comment_id = $_GET["comment_id"];

// $sql = "DELETE FROM ann_comments WHERE (id = '$comment_id' OR parent_id = '$comment_id') AND username = '$username' ";
// if ($conn->query($sql) === TRUE){

// prepare statemnet
$sql = "DELETE FROM ann_comments WHERE (id = ? OR parent_id = ?) AND username = ? ";
$stmt = $conn->prepare($sql);
$stmt->bind_param('iis', $comment_id, $parent_id, $username);
$status = $stmt->execute();


if ($status === TRUE){
    echo "<script>alert('留言已刪除'); window.location='./main.php'</script>";
} else{
    echo $stmt . "<br>";
    echo "error message" . $conn->error;
}



?>