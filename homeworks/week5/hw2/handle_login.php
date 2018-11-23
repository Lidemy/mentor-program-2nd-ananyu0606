<?php
include_once('./template/conn.php');
include_once('./template/utils.php');

$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT * FROM ann_users WHERE username = '$username'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        // 從資料庫中將 hash 過的密碼提取出來
        $hash_password = $row['password'];
        // 以 password_verify 比對使用者輸入的密碼以及從資料庫中提取出來的 hash 密碼，如果比對成功就設定 cookie
        if (password_verify($password, $hash_password)){
            set_token($conn, $username);
            echo '登入成功！<br>';
            // header("Location: ./login.php");
        }else{
            echo 'login result: <br>';
            echo '帳號不存在或密碼錯誤';
        }

        }
} else {
    echo 'login result: <br>';
    echo '帳號不存在或密碼錯誤';
}

?>

<form action="login.php">
    <input type="submit" value="回到登入頁">
</form>