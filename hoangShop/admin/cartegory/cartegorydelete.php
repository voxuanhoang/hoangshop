<?php ob_start(); ?>
<?php
    include "../header.php";
    include "../slider.php";
    include "../class/cartegory_class.php"
?> 
<?php 
$cartegory = new cartegory;
if(!isset($_GET['cartegory_id']) || $_GET['cartegory_id']==NULL){
    echo "<script>window.location = 'cartegorylist.php'</script>";
}
else {
    $cartegory_id = $_GET['cartegory_id'];
}
    $delete_cartegory = $cartegory -> delete_cartegory($cartegory_id);
    header('location:cartegorylist.php');
?>
<?php ob_end_flush(); ?>