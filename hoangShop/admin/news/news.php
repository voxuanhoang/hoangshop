<?php
    include "../header.php";
    include "../slider.php";
    include "../class/test_class.php"
?> 
<?php
$tintuc = new tintuc;
if($_SERVER['REQUEST_METHOD'] === 'POST'){

  $insert_tintuc = $tintuc->insert_tintuc($_POST, $_FILES);

}
?>
<div class="product-add">
    <div class="product-add-main">
              <h2 style="color: red;">THÊM TIN TỨC</h2>
              <form action="" method="POST" enctype="multipart/form-data">
              <label for="">nhập tiêu đề tin tức <span>*</span></label><br>
              <input name="title_news" required type="text"><br>
              <label for="">Nhập nội dung tin tức <span>*</span></label><br>
              <textarea required name="noidung" id="editor1" cols="150" rows="10" placeholder="nội dung tin tức"></textarea><br>
              <label for="">nhập tóm tắt nội dung <span>*</span></label><br>
              <input name="tomtat_noidung" required type="text"><br>
              <label  for="">Ảnh<span>*</span></label><br>
              <input name="news_img" required multiple type="file"><br>
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
</html>