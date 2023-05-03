<?php
    include "../header.php";
    include "../slider.php";
    include "../class/product_class.php"
?> 
<?php
$product = new product;
if($_SERVER['REQUEST_METHOD'] === 'POST'){

  $insert_product = $product->insert_product($_POST, $_FILES);
}
?>
<div class="product-add">
    <div class="product-add-main">
              <h2 style="color: red;">THÊM SẢN PHẨM</h2>
              <form action="" method="POST" enctype="multipart/form-data">
              <select name="cartegory_id" id="cartegory_id">
                    <option value="">---chọn danh mục---</option>
                      <?php
                      $show_cartegory = $product->show_cartegory();
                          if($show_cartegory){
                              while($result = $show_cartegory->fetch_assoc()){
                              ?>
                              <option value="<?php echo $result['cartegory_id'] ?>"><?php echo $result['cartegory_name'] ?></option>
                              <?php     
                        }
                      }
                      ?>
                    </select><br>
                    <select name="brand_id" id="brand_id">
                      <option>---chọn loại sản phẩm---</option>
                      
                    </select><br>
              <label for="">nhập tên sản phẩm <span>*</span></label><br>
              <input name="product_name" required type="text"><br>
              <label for="">giá sản phẩm <span>*</span></label><br>
              <input name="product_price" required type="text"><br>
              <label for="">giá khuyến mãi <span>*</span></label><br>
              <input name="product_discount" required type="text"><br>
              <label  for="">mô tả sản phẩm <span>*</span></label><br>
              <textarea required name="product_dec" id="editor1" cols="150" rows="10" placeholder="mô tả sản phẩm"></textarea><br>
              <label for="">ảnh trước <span>*</span></label><br>
              <input name="product_img" required multiple type="file"><br>
              <label for="">ảnh sau <span>*</span></label><br>
              <input name="product_img_back" required multiple type="file"><br>
              <label for="">ảnh mô tả <span>*</span></label><br>
              <input name="product_img_dec[]" required multiple type="file"><br>
              <button>Thêm</button>
          </form>
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