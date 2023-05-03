<?php
    include "header.php";
   //  include "..\admin\database.php";
    include "..\admin\connect.php";
    $test= mysqli_query($con, "SELECT tbl_product.*, tbl_cartegory.cartegory_name,tbl_brand.brand_name FROM tbl_product INNER JOIN tbl_cartegory ON tbl_product.cartegory_id = tbl_cartegory.cartegory_id INNER JOIN tbl_brand ON tbl_product.brand_id = tbl_brand.brand_id order by 'product_id ' asc limit 4");
    $product= mysqli_query($con, "SELECT tbl_product.*, tbl_cartegory.cartegory_name,tbl_brand.brand_name FROM tbl_product INNER JOIN tbl_cartegory ON tbl_product.cartegory_id = tbl_cartegory.cartegory_id INNER JOIN tbl_brand ON tbl_product.brand_id = tbl_brand.brand_id order by 'product_id ' asc limit 8");
    $product_clone= mysqli_query($con, "SELECT * FROM `tbl_product` WHERE `cartegory_id` =40 limit 4");
   //  var_dump($test);
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
$tintuc = new tintuc;
$show_tintuc = $tintuc->show_tintuc();
$show_tintuc2 = $tintuc->show_tintuc2();
class tintuc {
  private $db;

  public function __construct(){
      $this->db = new Database();
  }

  public function show_tintuc(){
    $query ="SELECT * FROM tbl_news ORDER BY news_idd asc";
    $result = $this ->db->select($query);
    return $result;
  }
  public function show_tintuc2(){
    $query ="SELECT * FROM tbl_news ORDER BY news_idd DESC";
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
                       $show_cartegory = $cartegory->show_cartegory();
                       if($show_cartegory){
                           while($result = $show_cartegory->fetch_assoc()){
                           ?>
                  <li class="item-noti-1" name="cartegory_id" > 
                        <a href="sanpham_id.php?cartegory_id=<?php echo $result['cartegory_id'] ?>" class="item-noti-2"><?php echo $result['cartegory_name'] ?><a>
                     </li>
                     <?php     
                           }
                      }
                      ?>
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
<div class="container">
   <section class="slide">
    <div class="slide-content">
         <div class="slide-content-left">
            <div class="slide-content-left1">
               <img src="https://cdn.tgdd.vn/Products/Images/42/292770/Slider/samsung-galaxy-a14-6gb-tong-quan-1020x570.jpg">  
            </div>            
         </div>         
         <div class="slide-content-right">
            <div class="slide-content-right-ima">
               <div class="slide-content-right-top">
                     <a href=""><img src="http://mauweb.monamedia.net/laptoppro/wp-content/uploads/2017/12/100000_banner-vui-xmax-trung-x-phone-v2-400x200.jpg"></a> 
                     <a href=""><img src="http://mauweb.monamedia.net/laptoppro/wp-content/uploads/2017/12/100000_iphone8-8plus-2.jpg"></a>
                     <a href=""><img src="http://mauweb.monamedia.net/laptoppro/wp-content/uploads/2017/12/100000_banner-tra-gop-100pt-trung-qua-400x200.jpg"></a>
               </div>
               <div class="slide-right-top-btn">
                     <i class="fa-solid fa-chevron-left"></i>
                     <i class="fa-solid fa-chevron-right"></i>
               </div>
            </div>             
            <div class="slide-content-right-ima-1">
               <div class="slide-content-right-bottom">
                     <a href=""><img src="http://mauweb.monamedia.net/laptoppro/wp-content/uploads/2017/12/100000_banner-galaxy-c9-pro-a5-a7-400x200.jpg"></a> 
                     <a href=""><img src="http://mauweb.monamedia.net/laptoppro/wp-content/uploads/2017/12/100000_banner-sony-xa1-plus-400x200.jpg"></a>
                     <a href=""><img src="http://mauweb.monamedia.net/laptoppro/wp-content/uploads/2017/12/100000_banner-j7-prime-400x200.jpg"></a>
               </div>
               <div class="slide-right-bottom-btn">
                     <i id="left" class="fa-solid fa-chevron-left"></i>
                     <i id="right" class="fa-solid fa-chevron-right"></i>
               </div>            
            </div>   
         </div>
    </div>
   </section>
    <div class="items"> 
      <div class="items-top">
          <div class="items-new">
              <strong>SẢN PHẨM MỚI</strong>
              <div class="items-new-img">
                
                <div class="suggest_item">
                  <?php 
                     while($row = mysqli_fetch_assoc($test)){
                        // var_dump($row);exit;
                        ?>
                  <div class="suggest_item-flip">
                     
                     <a class="suggest_item-total" href="chitiet\chitietsanpham.php?product_id=<?php echo $row['product_id'] ?>">
                        <div class="flip-card">
                           <div class="flip-card-inner">
                              <div class="card-font">
                              <img src="../admin/uploads/<?php echo $row['product_img'] ?>">
                              </div>
                              <div class="card-back">
                              <img src="../admin/uploads/<?php echo $row['product_img_back'] ?>">
                              </div>
                           </div>
                        </div>
                           <div class="suggest_item-product-bottom">
                              <div class="suggest_item-product-name">
                              <small style="color:black;"><?php echo $row['product_name'] ?></small>
                              </div>
                              <div class="suggest_item-product-price">
                              <p style="color:red"><?php echo number_format($row['product_discount']) ?><sub>đ</sub></p>
                              <small><del><?php echo number_format($row['product_price']) ?>₫</del></small>
                                 </div>
                           </div>                     
                     </a> 
                                          
                  </div><?php } ?>
                           
                </div>
              </div>
          </div>

          <div class="news">
            <div class="news-top"> 
               <a href="news.php" style="color:white; font-weight:bold"><i class="fa-solid fa-bars"></i> TIN TỨC</a>
            </div>
            <div class="news-bottom">

               <div class="news-bottom-bottom">            
                  <?php 
                     while($result = $show_tintuc->fetch_assoc()){
                     ?>            
                  <a href="chitiet/chitietnews.php?news_idd=<?php echo $result['news_idd'] ?>" class="news-bottom-bottom-de">
        
                     <div class="news-bottom-bottom-de-img">
                        <img src="../admin/uploadsnews/<?php echo $result['news_img'] ?>">
                     </div>
                     <div>
                        <h><?php echo $result['title_news'] ?></h>
                     </div>  
                                     
                  </a>
                 <?php     
                         }
                    ?>  
                  <div class="news-bottom-bottom-about">
                     <a href="news.php"><h>xem thêm tin tức >></h></a>
                  </div>
               </div>
            </div>
          </div>
          
      </div> 
      <div class="items-sale">
         <div class="items-sale-new">
             <strong>SẢN PHẨM BÁN CHẠY</strong>
             <div class="items-new-img">
               <div class="suggest_item">
                  <?php 
                  while($row = mysqli_fetch_assoc($product)){
                     // var_dump($row);exit;
                     ?>
                  
                 <div class="suggest_item-flip">
                    <a class="suggest_item-total" href="chitiet\chitietsanpham.php?product_id=<?php echo $row['product_id'] ?>">
                       <div class="sale-flip-card">
                          <div class="flip-card-inner">
                             <div class="sale-card-font">
                             <img src="../admin/uploads/<?php echo $row['product_img'] ?>">
                             </div>
                             <div class="sale-card-back">
                             <img src="../admin/uploads/<?php echo $row['product_img_back'] ?>"> 
                             </div>
                          </div>
                       </div>
                          <div class="sale_item-product-bottom">
                           <div class="suggest_item-product-name">
                           <small style="color:black;"><?php echo $row['product_name'] ?></small>
                           </div>
                           <div class="suggest_item-product-price">
                           <p style="color:red"><?php echo number_format($row['product_discount']) ?><sub>đ</sub></p>
                              <small><del><?php echo number_format($row['product_price']) ?>₫</del></small>
                                 </div>
                          </div>                     
                    </a>                      
                 </div>
                 <?php } ?>
               </div>
             
             </div>
         </div>   
     </div>
     <div class="items-accessory">
      <div class="items-accessory-new">
         <div class="accessory-nav">
            <div class="accessory-nav-left">
               <strong>LINH PHỤ KIỆN</strong>
            </div>
            <div class="accessory-nav-right">            
                  <div class="accessory-nav-right-de">
                     <a href=""><p>Ốp lưng</p></a>
                     <span>/</span>
                     <a href=""><p>Kính cường lực</p></a>
                     <span>/</span>
                     <a href=""><p>Tai nghe</p></a>
                     <span>/</span>
                     <a href=""><p>Sạc dự phòng</p></a>
                     <span>/</span>
                     <a href=""><p>Móc điện thoại</p></a>
                  </div>             
            </div>
         </div>
         <div class="accessory-items">
           <div class="accessory-items-1">
               <div class="accessory-item-img">
                  <img src="http://mauweb.monamedia.net/laptoppro/wp-content/uploads/2017/12/100000_lpk-sac-khong-day-giam-25pt-380x262.jpg">
               </div>
               <div class="accessory-items-right">
                  <?php 
                     while($row = mysqli_fetch_assoc($product_clone)){
                  ?>    
                        
                     <a class="accessory_item-total" href="chitiet\chitietsanpham.php?product_id=<?php echo $row['product_id'] ?>">
                        <div class="suggest_item-product" style="background-image: url(../admin/uploads/<?php echo $row['product_img'] ?>); 
                        background-size: contain;
                        background-repeat: no-repeat;" >            
                           <div class="suggest_item-product-1">
                              <h>SALE</h>                    
                           </div>                                              
                        </div>
                       
                        <div class="accessory_item-product-bottom">
                           <div class="suggest_item-product-name">
                           <small style="color:black;"><?php echo $row['product_name'] ?></small>
                           </div>
                           <div class="suggest_item-product-price">
                           <p style="color:red"><?php echo number_format($row['product_discount']) ?><sub>đ</sub></p>
                              <small><del><?php echo number_format($row['product_price']) ?>₫</del></small>
                                 </div>
                        </div>                                    
                     </a>  
                  <?php } ?>                    
                    
               </div>
           </div>
         </div> 
      </div>   
  </div>     
    </div>
    
</div>
<?php 
  include "footer.php";
?>