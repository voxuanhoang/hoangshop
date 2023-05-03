 <?php
    include "../header.php";
    include "../slider.php";
    include "../class/cartegory_class.php"
?> 
<?php
$cartegory = new cartegory;
if($_SERVER['REQUEST_METHOD'] === 'POST'){
  $cartegory_name = $_POST['cartegory_name'];
  $insert_cartegory = $cartegory->insert_cartegory($cartegory_name);
  
}
?>
<div class="cartegory-add-product">
        <div class="add-product">
          <h2>THÊM DANH MỤC</h2>
          <form action="" method="POST">
            <input required name="cartegory_name" type="search" placeholder="nhập tên danh mục" class="search"><br>
            <button>Thêm</button>
          </form>
        </div>
    </div>
  </section>
</body>
</html>
