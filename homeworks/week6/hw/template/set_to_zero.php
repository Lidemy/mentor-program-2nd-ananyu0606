<?php
// 測試時使用：將已經存在的資料洗掉，並讓 id AUTO_INCREMENT 歸 0
require('conn.php');

if (isset($_GET["comment_set_to_zero"])){
    $sql = "TRUNCATE TABLE ann_comments";
} elseif (isset($_GET["membership_set_to_zero"])){
    $sql = 'TRUNCATE TABLE ann_users';
}

if ($conn->query($sql) === true) {
    echo "歸零成功，請重新建立資料<br>";
};
?>

<div id='settimeout'></div>

<script type="text/javascript">
    var t = 5;
    
    //顯示倒數秒數
    function showTime(){
        document.getElementById('settimeout').innerHTML= t-- + "秒後跳回登入頁面";    
        if( t == -1 ){
            location.href='../login.php';
        }    
        //每秒執行一次,showTime()
        setTimeout("showTime()", 1000);
    }

    //執行showTime()
    showTime();
</script>