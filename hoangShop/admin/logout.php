<?php session_start(); 

unset($_SESSION['user_name1']);
header('location:../public/login_user.php');
?>