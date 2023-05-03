<?php session_start(); 

unset($_SESSION['user_name']);
header('location:login_user.php');
?>
