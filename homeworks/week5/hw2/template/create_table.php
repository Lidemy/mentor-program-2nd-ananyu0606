<?php
function create_table() {
    require_once('./conn.php');
    
    if ($conn->connect_error) {
        die('connect failed:' . $conn->connect_error);
    } else {
        echo 'success!';
    };
    
    $sql = "CREATE TABLE IF NOT EXISTS ann_users (
            id INTEGER UNIQUE AUTO_INCREMENT,
            username VARCHAR(20),
            password VARCHAR(256),
            nickname VARCHAR(256)        
        ) COLLATE utf8_unicode_ci";
    
    if ($conn->query($sql) === true) {
        echo "users table built";
    } else {
        echo "error:" . $sql . "<br>" . $conn->error;
    };
    
    $sql = "CREATE TABLE IF NOT EXISTS ann_comments(
            id INTEGER UNIQUE AUTO_INCREMENT,
            parent_id INTEGER,
            username VARCHAR(20),
            content TEXT COLLATE utf8_unicode_ci, 
            created_at DATETIME default CURRENT_TIMESTAMP
        ) COLLATE utf8_unicode_ci";
    
    if ($conn->query($sql) === true) {
        echo "comments table built";
    } else {
        echo "error:" . $sql . "<br>" . $conn->error;
    }

    $sql = "CREATE TABLE IF NOT EXISTS ann_certificates(
        id INTEGER UNIQUE AUTO_INCREMENT,
        username VARCHAR(20) UNIQUE,
        token VARCHAR(256)
    ) COLLATE utf8_unicode_ci";

    if($conn->query($sql) === true){
        echo "certificates table built";
    } else {
        echo "error:" . $sql . "<br>" . $conn->error;
    }
}

create_table();

// header("Location:../main.php")
?>