<?php session_start(); ?>
<?php // 
  include "phanquyen.php";
  include "connect.php";
?>
<?php
                    if(empty($_SESSION['user_name1'])){
                        ?>
                      <?php 
                     }else{ $user_name1 = $_SESSION['user_name1'];
                        ?><div>
                        <strong>Xin chào</strong>
                        <p><?php echo $user_name1 ?></p>
                        <a href="logout.php">đăng xuất</a>
                        <!-- <a href="editpass.php">doi mat khau</a> -->
                      </div>
                        <?php
                     }
                      ?>
<section>
    <div class="danhmuc">
      <div class="danhmuc-t">
        <label class="danhmuc-top" for="toggle">DANH MỤC</label>
           <input type="checkbox" id="toggle">
              <div class="close">
                  <ul>
                     <li><a href="../cartegory/cartegoryadd.php">Thêm danh mục</a></li>
                      <li><a href="../cartegory/cartegorylist.php">Danh sách thêm danh mục</a></li>
                  </ul>
              </div><br>
      </div>
      <div class="danhmuc-t">
        <label class="danhmuc-top" for="toggle1">LOẠI SẢN PHẨM</label>
            <input type="checkbox" id="toggle1">
                <div class="close1">
                    <ul>
                      <Li><a href=../brand/brandadd.php>Thêm loại sản phẩm</a></Li>
                      <Li><a href=../brand/brandlist.php>Danh sách loại sản phẩm</a></Li>
                    </ul>
                </div><br>
      </div>
      <div class="danhmuc-t">          
        <label class="danhmuc-top" for="toggle2">SẢN PHẨM</label>
            <input type="checkbox" id="toggle2">
                <div class="close2">
                  <ul>
                    <Li><a href=../product/productadd.php>Thêm sản phẩm</a></Li>
                    <Li><a href=../product/productlist.php>Danh sách sản phẩm</a></Li>
                  </ul>
                </div>  <br>
        </div>
        <div class="danhmuc-t">        
        <label class="danhmuc-top" for="toggle3">CẤU HÌNH</label>
            <input type="checkbox" id="toggle3">
                <div class="close3">
                  <ul>
                    <Li><a href=../cauhinh/cauhinh.php>Thêm cấu hình</a></Li>
                    <Li><a href=../cauhinh/chitietlist.php>Danh sách cấu hình</a></Li>
                  </ul>
                </div><br>
        </div>
        <div class="danhmuc-t">
        <label class="danhmuc-top" for="toggle4">TIN TỨC</label>
            <input type="checkbox" id="toggle4">
                <div class="close4">
                  <ul>
                    <Li><a href=../news/news.php>Thêm tin tức</a></Li>
                    <Li><a href=../news/newslist.php>Danh sách tin tức</a></Li>
                  </ul>
                </div><br>
        </div>
        <div class="danhmuc-t">
        <label class="danhmuc-top" for="toggle5">TÀI KHOẢN</label>
            <input type="checkbox" id="toggle5">
                <div class="close5">
                  <ul>
                    <Li><a href=../account/accountadd.php>Thêm tài khoản</a></Li>
                    <Li><a href=../account/accountlist.php>Danh sách tài khoản</a></Li>
                  </ul>
                </div><br>
        </div>        
        <div class="danhmuc-t">
          <label class="danhmuc-top" for="toggle6">ĐƠN HÀNG</label>
              <input type="checkbox" id="toggle6">
                  <div class="close6">
                    <ul>
                      <Li><a href=../donhang/donhanglist.php>Danh sách đơn hàng</a></Li>
                    </ul>
                  </div>
        </div>        
  </div>
    