<?php

function logout() {
    setcookie('token', '', time()- 3600*24);
    header('LOCATION: login.php');
}

logout()
?>