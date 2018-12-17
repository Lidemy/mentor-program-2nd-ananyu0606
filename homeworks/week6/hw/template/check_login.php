<?php

if (!isset($_SESSION)){
    session_start();
}
$username = $_SESSION['username'];

// echo $username;

?>