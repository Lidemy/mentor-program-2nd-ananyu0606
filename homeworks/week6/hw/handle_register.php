<?php
if (!isset($_SESSION)){
    session_start();
}
include_once('./template/conn.php');
include_once('./template/utils.php');

if (isset($_POST['username']) &&
    !empty($_POST['username']) &&
    isset($_POST['password']) &&
    !empty($_POST['password']) &&
    isset($_POST['nickname']) &&
    !empty($_POST['nickname'])) {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    // PASSWORD_DEFAULT - Use the bcrypt algorithm (default as of PHP 5.5.0). Note that this constant is designed to change over time as new and stronger algorithms are added to PHP. For that reason, the length of the result from using this identifier can change over time. Therefore, it is recommended to store the result in a database column that can expand beyond 60 characters (255 characters would be a good choice).
    $nickname = $_POST['nickname']; 

    $duplicate_flag = true;  //檢查帳號是否已經存在(false 表示已有相同帳號)

    $sql = 'SELECT * FROM ann_users';
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            if ($username === $row['username']) {
                echo $row['username'] . "帳號已存在";
                $duplicate_flag = false;
                break;
            }
        }
    }

    if ($duplicate_flag) {
        // $sql = "INSERT INTO ann_users (username, password, nickname) VALUES ( $username, $password, $nickname)";
        // if ($conn->query($sql) === true) {
        
        // prepare statement
        $sql = "INSERT INTO ann_users (username, password, nickname) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('sss', $username, $password, $nickname);
        $status = $stmt->execute();

        if ($status === true) {
            echo "歡迎加入";
            // set_token($conn, $username);
            $_SESSION['username']= $username;
            header("Location:./main.php");
        } else {
            echo "error message: " . $conn->error;
        }
    }
} else{
    echo "請輸入帳號、密碼或暱稱";
}

?>

<form action="login.php">
    <input type="submit" value="回到登入頁">
</form>
