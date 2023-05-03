<?php ob_start(); ?>
<?php
    include "../header.php";
    include "../slider.php";
    include "../class/test_class.php";
?> 
<?php
$tintuc = new tintuc;
  $news_idd = $_GET['news_idd'];
  $get_tintuc = $tintuc -> get_tintuc($news_idd);
  if($get_tintuc) {
      $resultT = $get_tintuc->fetch_assoc();
  }
?>
<?php

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $update_tintuc = $tintuc-> update_tintuc($_POST, $_FILES);
    header('location:newslist.php');
    // echo '<pre>';
    // echo print_r($_FILES['tieude']['name']);
    // echo '</pre>';
}
?>
<div class="product-add">
    <div class="product-add-main">
              <h2 style="color: red;">THÊM SẢN PHẨM</h2>
              <form method="POST" enctype="multipart/form-data">
                    <label for="">nhập tiêu đề tin tức <span>*</span></label><br>
                    <input name="title_news" required type="text" value="<?php echo $resultT['title_news']?>"><br>
                    <label for="">Nhập nội dung tin tức <span>*</span></label><br>
                    <textarea required name="noidung" id="editor1" cols="150" rows="10" placeholder="nội dung tin tức" ><?php echo $resultT['noidung']?></textarea><br>
                    <label for="">nhập tóm tắt nội dung <span>*</span></label><br>
                    <input name="tomtat_noidung" required type="text" value="<?php echo $resultT['tomtat_noidung']?>"><br>
                    <label  for="">Ảnh<span>*</span></label><br>
                    <input name="news_img" required  type="file" value="<?php echo $resultT['news_img'] ?>"><br>
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

</html>
<?php ob_end_flush(); ?>
