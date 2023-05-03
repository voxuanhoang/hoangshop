<?php ob_start(); ?>
<?php
    include "../header.php";
    include "../slider.php";
    include "../class/chitiet_class.php";
?> 
<?php 
$chitiet = new chitiet;
    $product_id = $_GET['product_id'];
    $get_chitiet = $chitiet -> get_chitiet($product_id);
    if($get_chitiet) {
        $resultD = $get_chitiet->fetch_assoc();
    }
  
?>

<?php

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $update_chitiet = $chitiet-> update_chitiet($_POST);
    header('location:chitietlist.php');
}
?>
<div class="cauhinh-add">
    <div class="cauhinh-add-main">
              <h2 style="color: red;">THÊM CẤU HÌNH</h2>
              <div class="cauhinh">
                <form action="" method="POST">
                  <div>
                            <select name="product_id" id="product_id">
                              <option>---nhập tên sản phẩm---</option>
                              <?php
                              $show_product = $chitiet->show_product();
                               if($show_product){
                              while($result = $show_product->fetch_assoc()){
                              ?>
                              <option <?php if($resultD['product_id']==$result['product_id'])
                        {echo "SELECTED";} ?> value="<?php echo $result['product_id'] ?>"><?php echo $result['product_name'] ?></option>
                              <?php     
                              }
                            }
                          ?>
                            </select><br>
                      <label for="">màn hình <span>*</span></label><br>
                      <input name="manhinh" required type="text" value="<?php echo $resultD['manhinh']?>"><br>
                      <label for="">Hệ điều hành <span>*</span></label><br>
                      <input name="hedieuhanh" required type="text" value="<?php echo $resultD['hedieuhanh']?>"><br>
                      <label for="">camera sau <span>*</span></label><br>
                      <input name="cam_sau" required type="text" value="<?php echo $resultD['cam_sau']?>"><br>
                      <label for="">camera trước <span>*</span></label><br>
                      <input name="cam_truoc" required type="text" value="<?php echo $resultD['cam_truoc']?>"><br>
                      
                      
                  </div>
                  <div>
                      <label for="">chip <span>*</span></label><br>
                      <input name="chip" required type="text" value="<?php echo $resultD['chip']?>"><br>
                      <label for="">ram <span>*</span></label><br>
                      <select class="cauhinh-sele" name="ram" value="<?php echo $resultD['ram']?>">
                          <option>2GB</option>
                          <option>4GB</option>
                          <option>6GB</option>
                          <option>8GB</option>
                      </select><br>
                      <label for="">dung lượng <span>*</span></label><br>
                      <select class="cauhinh-sele" name="dungluong" value="<?php echo $resultD['dungluong']?>">
                          <option>64GB</option>
                          <option>128GB</option>
                          <option>256GB</option>
                          <option>512GB</option>
                      </select><br>
                      <label for="">pin <span>*</span></label><br>
                      <input name="pin" required type="text" value="<?php echo $resultD['pin']?>"><br>
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
</html>
<?php ob_end_flush(); ?>