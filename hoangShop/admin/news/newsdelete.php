<?php ob_start(); ?>
<?php
    include "../header.php";
    include "../slider.php";
    include "../class/test_class.php"
?> 
<?php 
$tintuc = new tintuc;
    $news_idd = $_GET['news_idd'];
    $delete_tintuc = $tintuc -> delete_tintuc($news_idd);
    header('location:newslist.php');
?>
<?php ob_end_flush(); ?>