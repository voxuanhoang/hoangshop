<?php ob_start(); ?>
<?php

    include "../header.php";
    include "../slider.php";
    include "../class/cartegory_class.php"
?> 
<?php 
$cartegory = new cartegory;
if(!isset($_GET['cartegory_id']) || $_GET['cartegory_id']==NULL){
    // echo "<script>window.location = 'cartegorylist.php'</script>";
}
else {
    $cartegory_id = $_GET['cartegory_id'];
}
    $get_cartegory = $cartegory -> get_cartegory($cartegory_id);
    if($get_cartegory) {
        $result = $get_cartegory->fetch_assoc();
    }
?>
<?php
if($_SERVER['REQUEST_METHOD'] === 'POST'){
  $cartegory_name = $_POST['cartegory_name'];
  // $cartegory_id = $_POST['cartegory_id'];
  $update_cartegory = $cartegory->update_cartegory($cartegory_name,$cartegory_id);
  
  header('location:cartegorylist.php');
  
}

?>
<div class="cartegory-add-product">
        <div class="add-product">
          <h3>SỬA DANH MỤC</h3>
          <form action="" method="POST">
            <input name="cartegory_name" type="search" placeholder="nhập tên danh mục" class="search"
            value="<?php echo $result['cartegory_name']?>"><br>
            <button>SỬA</button>
          </form>
        </div>
    </div>
  </section>
</body>
</html>
<?php ob_end_flush(); ?>