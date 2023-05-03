<?php ob_start(); ?>
<?php
    include "../header.php";
    include "../slider.php";
    include "../class/account_class.php"
?> 
<?php 
$account = new account;
    $id_user = $_GET['id_user'];
    $delete_account = $account -> delete_account($id_user);
    header('location:accountlist.php');
?>
<?php ob_end_flush(); ?>
