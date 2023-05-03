<?php
  include "header.php";
//   include "..\admin\database.php";
  include "..\admin\connect.php";
?>
<?php 
$cartegory = new cartegory;
$show_cartegory = $cartegory->show_cartegory();
class cartegory {
   private $db;

   public function __construct(){
       $this->db = new Database();
   }

   public function show_cartegory(){
      $query ="SELECT * FROM tbl_cartegory ORDER BY cartegory_id ASC";
      $result = $this ->db->select($query);
      return $result;
  }
}
?>
<?php 
$brand = new brand;
$show_brand = $brand->show_brand();
class brand {
   private $db;

   public function __construct(){
       $this->db = new Database();
   }

   public function get_brand($cartegory_id){
      $query ="SELECT * FROM tbl_brand WHERE cartegory_id = '$cartegory_id'";
      $result = $this ->db->select($query);
      return $result;
  }

   public function show_brand(){
      $query = "SELECT tbl_brand.*, tbl_cartegory.cartegory_name
      FROM tbl_brand INNER JOIN tbl_cartegory ON tbl_brand.cartegory_id = tbl_cartegory.cartegory_id 
      ORDER BY tbl_brand.brand_id ASC";
      $result = $this ->db->select($query);
      return $result;
  }
}
?>
<div class="navbar">
      <div class="item">
         <div class="item-has">
               <a href="sanpham.php" class="item-list" name="cartegory_id" ><i class="fa-solid fa-mobile-screen-button"></i> SẢN PHẨM</a>
               <div class="item-noti">
                  <ul class="item-noti-0">
                    <?php
                        while($result = $show_cartegory->fetch_assoc()){
                     ?>
                        <li class="item-noti-1" name="cartegory_id" > 
                           <a href="sanpham_id.php?cartegory_id=<?php echo $result['cartegory_id'] ?>" class="item-noti-2"><?php echo $result['cartegory_name'] ?><a>
                        </li>
                     <?php   }  ?>
                  </ul>
               </div>
         </div>
         <div class="item-has">
               <a href="#" class="item-list"><i class="fa-solid fa-gift"></i> KHUYẾN MÃI</a>
         </div>
         <div class="item-has">
               <a href="#" class="item-list"><i class="fa-solid fa-phone"></i> LIÊN HỆ</a>
         </div>
         <div class="item-has">
               <a href="news.php" class="item-list"><i class="fa-solid fa-newspaper"></i> TIN TỨC</a>
         </div>
         <div>
               <a href="login_user.php" class="item-list"><i class="fa-solid fa-right-to-bracket"></i> ĐĂNG NHẬP</a>
         </div>
         <div>
               <a href="create_account.php" class="item-list"><i class="fa-solid fa-user-plus"></i> ĐĂNG KÝ</a>
         </div>
      </div>
</div>
<div class="main">
    <div class="main-title">
      <a href="main.php"><b>TRANG CHỦ</b></a>
    </div>
    <div class="main-top">
      <div class="main-nav">
         <div class="main-nav-loc">
            <b class="loc"><i class="fa-solid fa-bars"></i>LỌC</b>
            <div class="menu-nav">
                  <strong>DANH MỤC SẢN PHẨM</strong>
                  <div class="menu-nav-danhmuc">
                  <?php
                     while($result = $show_brand->fetch_assoc()){
                  ?>
                     <a href=""><?php echo $result['brand_name'] ?></a>
                  <?php     
                     }
                  ?>
                  </div>
            </div>
         </div>
         <div class="main-nav-left">
            <div class="main-nav-left-search"><h>Hiển thị kết quả</h>
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
               <div class="suggest_item_pri">
                  <?php 
                     if($totalRecord == 0){
                  ?>
                     <div class="error-search">
                     <h2><strong>Không tìm thấy sản phẩm</strong> </h2>
                     </div>
                  <?php } ?>
                  <?php 
                     while($row = mysqli_fetch_assoc($test)){
                  ?>
                     <div class="suggest_item-flip">
                        <a class="suggest_item-total" href="chitiet\chitietsanpham.php?product_id=<?php echo $row['product_id'] ?>">
                           <div class="flip-card-s">
                              <div class="flip-card-inner-s">
                                 <div class="card-font-s">
                                    <img src="../admin/uploads/<?php echo $row['product_img'] ?>">
                                 </div>
                                 <div class="card-back-s">
                                    <img src="../admin/uploads/<?php echo $row['product_img_back'] ?>"> 
                                 </div>
                              </div>
                           </div>
                           <div class="suggest_item-product-bottom-s">
                              <small style="color:black;"><?php echo $row['product_name'] ?></small>
                              <div class="suggest_item-product-price-s">
                                 <p style="color:red"><?php echo $row['product_discount'] ?><sub>đ</sub></p>
                                 <small><del><?php echo $row['product_price'] ?>₫</del></small>
                              </div>
                           </div>  
                        </a>                      
                     </div>    
                  <?php
                     }
                  ?> 
               </div>
            </div>
         </div>
      </div>
      <?php 
            include "pages.php";
      ?>
    </div>
</div>
<?php 
  include "footer.php"
?>