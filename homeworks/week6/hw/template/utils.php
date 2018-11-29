<?php
if (!isset($_SESSION)){
    session_start();
}
include_once("conn.php");
function set_token($conn, $username)
{
    $token = uniqid();
    // 刪除前次登入建立的 token
    $sql = "DELETE FROM ann_certificates WHERE username = '$username'";
    $conn->query($sql);
    // echo "step1:" . $sql;    

    $sql = "INSERT INTO ann_certificates(username, token) VALUE('$username', '$token')";
    // echo "step2:" . $sql;    
    
    if ($conn->query($sql) === true) {
        // echo "登入成功";
        header("Location: ./login.php");
    } else {
        echo "error message: " . $conn->error;
    }
    setcookie("token", $token, time() + 3600 * 24);
}

function escape($str){
    return htmlspecialchars($str, ENT_QUOTES, 'utf-8');
}

function fetch_name($conn, $a){

    if (isset($_SESSION['username'])) {
        $username = $_SESSION['username'];

        $sql = "SELECT * FROM ann_users WHERE username = '$username'";

        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()){
                // echo $row[$a];
                return $row[$a];
            }
        } else {
            echo 'login result: <br>';
            echo '帳號不存在或密碼錯誤';
        }
    } else {
        echo "使用者未登入";
    }    
}
// fetch_name($conn, 'nickname');

function render_edit_button($conn, $username, $id){
    $fetch_name = fetch_name($conn, "username");
    if($username === $fetch_name){
        // 為了實現「編輯留言如為空字串則反回原編輯頁，而直接跳非主頁」，這裡的 form 要用 GET 送出，後面才能夠讀取到 $_SERVER['HTTP_REFERER']
        echo "
        <div class='delete-comment'>
            <form action='./handle_delete_comment.php' method='GET'>            
                <input type='hidden' value=$id name='comment_id'>
                <button class='delete-button' type='submit'>刪除</button>
            </form>
        </div>
        <div class='edit-comment'>
            <form action='./edit_comment.php' method='GET'>
                <input type='hidden' value=$id name='comment_id'>                
                <button class='edit-button' type='submit'>編輯</button>
            </form>
        </div>";
    }
}


?>