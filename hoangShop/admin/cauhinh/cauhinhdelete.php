<?php ob_start(); ?>
<?php
    include "../header.php";
    include "../slider.php";
    include "../class/chitiet_class.php"
?> 
<?php 
$chitiet = new chitiet;
    $product_id = $_GET['product_id'];
    $delete_chitiet = $chitiet -> delete_chitiet($product_id);
    header('location:chitietlist.php')
?>
<?php ob_end_flush(); ?>