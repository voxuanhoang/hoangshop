<?php ob_start(); ?>
<?php
    include "../header.php";
    include "../slider.php";
    include "../class/brand_class.php"
?> 
<?php 
$brand = new brand;
    $brand_id = $_GET['brand_id'];
    $delete_brand = $brand -> delete_brand($brand_id);
    header('location:brandlist.php');
?>
<?php ob_end_flush(); ?>