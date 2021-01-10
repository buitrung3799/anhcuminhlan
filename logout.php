<?php 
require('connect.php');
session_start();

if(ISSET($_SESSION['username']) && $_SESSION['username'] != NULL){
    unset($_SESSION['username']);
    echo 'đăng xuất thành công';
    header('Location: login.php');
}

?>