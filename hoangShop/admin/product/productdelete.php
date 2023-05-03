<?php ob_start(); ?>
<?php
    include "../header.php";
    include "../slider.php";
    include "../class/product_class.php"
?> 
<?php 
$product = new product;
    $product_id = $_GET['product_id'];
    $delete_product = $product -> delete_product($product_id);
    header('location:productlist.php');
?>
<?php ob_end_flush(); ?>