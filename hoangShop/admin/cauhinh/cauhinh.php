<?php
    include "../header.php";
    include "../slider.php";
    include "../class\chitiet_class.php";
?>
<?php
$chitiet = new chitiet;
if($_SERVER['REQUEST_METHOD'] === 'POST'){

  $insert_chitiet = $chitiet->insert_chitiet($_POST);
}
?>
<?php
$product = new product;
if($_SERVER['REQUEST_METHOD'] === 'POST'){

  $show_product = $product->show_product();
}
?>
<div class="cauhinh-add">
    <div class="cauhinh-add-main">
              <h2 style="color: red;">THÊM CẤU HÌNH</h2>
              <div class="cauhinh">
                <form action="" method="POST">
                  <div class="cauhinh-phu">
                  <div>
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
                    <select name="product_id" id="product_id">
                                <option>---chọn loại sản phẩm---</option>
                    </select><br>
                      <label for="">màn hình <span>*</span></label><br>
                      <input name="manhinh"  type="text"><br>
                      <label for="">Hệ điều hành <span>*</span></label><br>
                      <input name="hedieuhanh"  type="text"><br>
                      <label for="">camera sau <span>*</span></label><br>
                      <input name="cam_sau"  type="text"><br>
                      <label for="">camera trước <span>*</span></label><br>
                      <input name="cam_truoc" type="text"><br>
                      
                      
                  </div>
                  <div>
                      <!-- <label for="">Màu <span>*</span></label><br>
                      <input name="color"  type="text"><br> -->
                      <label for="">chip <span>*</span></label><br>
                      <input name="chip"  type="text"><br>
                      <label for="">ram <span>*</span></label><br>
                      <select class="cauhinh-sele" name="ram">
                          <option></option>
                          <option>2GB</option>
                          <option>4GB</option>
                          <option>6GB</option>
                          <option>8GB</option>
                      </select><br>
                      <label for="">dung lượng <span>*</span></label><br>
                      <select class="cauhinh-sele" name="dungluong">
                          <option></option>
                          <option>64GB</option>
                          <option>128GB</option>
                          <option>256GB</option>
                          <option>512GB</option>
                      </select><br>
                      <label for="">pin <span>*</span></label><br>
                      <input name="pin"  type="text"><br>
                    </div>
                  </div>
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
<script>
  $(document).ready(function(){
      $("#brand_id").change(function(){
        // alert($(this).val())
        var x = $(this).val()
        $.get("productadd_ajax.php",{brand_id:x}, function(data){
          $('#product_id').html(data);
        })
      })
  })
</script>
</html>