<?php ob_start(); ?>
<?php
    include "../header.php";
    include "../slider.php";
    include "../class/brand_class.php";
?> 
<?php
$brand = new brand;
    $brand_id = $_GET['brand_id'];
    $get_brand = $brand -> get_brand($brand_id);
    if($get_brand) {
        $resultA = $get_brand->fetch_assoc();
    }

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $cartegory_id =$_POST['cartegory_id'];
    $brand_name = $_POST['brand_name'];
    $update_brand = $brand->update_brand($cartegory_id,$brand_name,$brand_id);
    header('location:brandlist.php');
}
?>
<div class="cartegory-add-product">
        <div class="add-product">
          <h3>THÊM LOẠI SẢN PHẨM</h3>
          <form action="" method="POST">
            <select name="cartegory_id" id="">
                <option value="">---chọn sản phẩm---</option>
                <?php
                $show_cartegory = $brand->show_cartegory();
                    if($show_cartegory){
                        while($result = $show_cartegory->fetch_assoc()){
                        ?>
                        <option <?php if($resultA['cartegory_id']==$result['cartegory_id'])
                        {echo "SELECTED";} ?> value="<?php echo $result['cartegory_id'] ?>"><?php echo $result['cartegory_name'] ?></option>
                        <?php     
                   }
                }
                ?>
            </select><br>
            <input required name="brand_name" type="search" placeholder="nhập tên loại sản phẩm" class="search"
            value="<?php echo $resultA['brand_name'] ?>"><br>
            <button>sửa</button>
          </form>
        </div>
    </div>
  </section>
</body>
</html>
<?php ob_end_flush(); ?>
