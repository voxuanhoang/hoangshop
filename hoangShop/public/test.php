<?php
  include "header.php";
  // include "..\admin\database.php";
  include "class\sanpham_class.php";
  // include "brand_ajax.php";
?>

<div class="navbar">
      <div class="item">
            <div class="item-has">
               <a href="test.php" class="item-list" name="cartegory_id" ><i class="fa-solid fa-mobile-screen-button"></i> SẢN PHẨM</a>
               <div class="item-noti">
                  <ul class="item-noti-0">
                    <?php
                       $show_cartegory = $cartegory->show_cartegory();
                       if($show_cartegory){
                           while($result = $show_cartegory->fetch_assoc()){
                           ?>
                  <li class="item-noti-1" name="cartegory_id" > 
                        <a href="test.php?<?php echo $result['cartegory_id'] ?>" class="item-noti-2"><?php echo $result['cartegory_name'] ?><a>
                     </li>
                     <?php     
                           }
                      }
                      ?>
                  </ul>
               </div>
            </div>
            <div class="item-has">
               <a href="#" class="item-list"><i class="fa-solid fa-phone"></i> LIÊN HỆ</a>
            </div>
            <div>
               <a href="login_user.php" class="item-list">ĐĂNG NHẬP</a>
            </div>
            <div>
               <a href="create_account.php" class="item-list">ĐĂNG KÝ</a>
            </div>
      </div>
</div>
<div class="main">
  
  <div class="main-title">
    <a href="index.html"><b>TRANG CHỦ</b></a>
  </div>
  <div class="main-top">
      <div class="main-nav">
        <div class="main-nav-loc">
          <b><i class="fa-solid fa-bars"></i> LỌC</b>
        </div>
      <div class="main-nav-left">
        <div class="main-nav-left-show">
          <h>Hiển thị kết quả</h>
        </div>
        <div class="main-nav-left-search">
          <select class="left-select">
            <option value="all">all</option>
            <option value="samsung">samsung</option>
            <option value="apple">apple</option>
            <option value="nokia">nokia</option>
          </select>
        </div>
      </div>
  </div>
  <div class="main-items">
    <div class="items-new">
      <div class="items-new-img">
        <div class="suggest_item">
         <?php 
               while($result = $show_product->fetch_assoc()){
                  ?>
          <div class="suggest_item-flip">
             <a class="suggest_item-total" href="chitiet\chitietsanpham.php?product_id=<?php echo $result['product_id'] ?>">
               
                <div class="flip-card-s">
                   <div class="flip-card-inner-s">
                      <div class="card-font-s">
                         <img src="../admin/uploads/<?php echo $result['product_img'] ?>">
                      </div>
                      <div class="card-back-s">
                         <img src="../admin/uploads/<?php echo $result['product_img_back'] ?>"> 
                      </div>
                   </div>
                </div>
                <div class="suggest_item-product-bottom-s">
                     <small style="color:black;"><?php echo $result['product_name'] ?></small>
                     <div class="suggest_item-product-price-s">
                         <p style="color:red"><?php echo $result['product_discount'] ?><sub>đ</sub></p>
                         <small><del><?php echo $result['product_price'] ?>₫</del></small>
                     </div>
                </div>  
                              
             </a>                      
          </div>    <?php
                }
            
            ?> 
        </div>
        
      </div>
  </div>
  </div>
</div>
</div>
<?php 
  include "footer.php"
?>