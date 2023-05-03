<?php ob_start(); ?>
<?php
    include "../header.php";
    include "../slider.php";
    include "../class/product_class.php"
?> 
<?php 
$product = new product;
if(!isset($_GET['product_id']) || $_GET['product_id']==NULL){
    // echo "<script>window.location = 'productlist.php'</script>";
}
else {
    $product_id = $_GET['product_id'];
}
    $get_product = $product -> get_product($product_id);
    if($get_product) {
        $resultB = $get_product->fetch_assoc();
    }
  
?>
<?php 
  $product_id = $_GET['product_id'];
    $get_img = $product -> get_img($product_id);
    if($get_img) 
        $resultC = $get_img->fetch_assoc();
?>
<?php

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $update_product = $product-> update_product($_POST, $_FILES);
    header('location:productlist.php');
    // echo '<pre>';
    // echo print_r($_FILES['product_img']['name']);
    // echo '</pre>';
}
?>
<div class="product-add">
    <div class="product-add-main">
              <h2 style="color: red;">THÊM SẢN PHẨM</h2>
              <form method="POST" enctype="multipart/form-data">
              <select name="cartegory_id" id="cartegory_id">
                    <option value="">---chọn danh mục---</option>
                      <?php
                      $show_cartegory = $product->show_cartegory();
                          if($show_cartegory){
                              while($result = $show_cartegory->fetch_assoc()){
                              ?>
                              <option <?php if($resultB['cartegory_id']==$result['cartegory_id'])
                        {echo "SELECTED";} ?> value="<?php echo $result['cartegory_id'] ?>"><?php echo $result['cartegory_name'] ?></option>
                              <?php  
                               
                        }
                      }
                      ?>
                    </select><br>
                    <select name="brand_id" id="brand_id">
                      <option>---chọn loại sản phẩm---</option>
                      <?php
                      $show_brand = $product->show_brand();
                          if($show_brand){
                              while($result = $show_brand->fetch_assoc()){
                              ?>
                              <option <?php if($resultB['brand_id']==$result['brand_id'])
                        {echo "SELECTED";} ?> value="<?php echo $result['brand_id'] ?>"><?php echo $result['brand_name'] ?></option>
                              <?php  
                               
                        }
                      }
                      ?>
                    </select><br>

                        <label for="">nhập tên sản phẩm <span>*</span></label><br>
                        <input  name="product_name" required type="text" value="<?php echo $resultB['product_name']?>"><br>
                        <label for="">giá sản phẩm <span>*</span></label><br>
                        <input value="<?php echo $resultB['product_price']?>" name="product_price" required type="text"><br>
                        <label for="">giá khuyến mãi <span>*</span></label><br>
                        <input value="<?php echo $resultB['product_discount']?>" name="product_discount" required type="text"><br>
                        <label  for="">mô tả sản phẩm <span>*</span></label><br>
                        <textarea required name="product_dec" id="editor1" cols="150" rows="10" placeholder="mô tả sản phẩm"><?php echo $resultB['product_dec']?></textarea><br>
                        <label for="">ảnh trước<span>*</span></label><br>
                        <input value="<?php echo $resultB['product_img'] ?>" name="product_img" required multiple type="file"><br>
                        <label for="">ảnh sau<span>*</span></label><br>
                        <input value="<?php echo $resultB['product_img_back'] ?>" name="product_img_back" required multiple type="file"><br>
                        <label for="">ảnh mô tả<span>*</span></label><br>
                        <input value="<?php echo $resultC['product_img_dec'] ?>" name="product_img_dec[]" required multiple type="file"><br>
                        <button>sửa</button>
                                
        </div>
    </div>
  </section>
</body>
<script>
    CKEDITOR.replace( 'editor1', {
    filebrowserBrowseUrl: 'ckfinder/ckfinder.html',
    filebrowserUploadUrl: 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
    filebrowserWindowWidth: '1000',
    filebrowserWindowHeight: '700'
} );
</script>
<script>
  $(document).ready(function(){
      $("#cartegory_id").change(function(){
        var x = $(this).val()
        $.get("productadd_ajax.php",{cartegory_id:x}, function(data){
          $('#brand_id').html(data);
        })
      })
  })
</script>
</html>
<?php ob_end_flush(); ?>
