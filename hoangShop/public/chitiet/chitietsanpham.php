<?php 
    include "header.php";
    include "..\..\admin\database.php";
?>
<?php 
$brand = new brand;
$show_brand = $brand->show_brand();

class brand {
   private $db;

   public function __construct(){
       $this->db = new Database();
   }

   public function show_brand(){
      // $query ="SELECT * FROM tbl_brand ORDER BY brand_id DESC";
      $query = "SELECT tbl_brand.*, tbl_cartegory.cartegory_name
      FROM tbl_brand INNER JOIN tbl_cartegory ON tbl_brand.cartegory_id = tbl_cartegory.cartegory_id
      ORDER BY tbl_brand.brand_id DESC";
      $result = $this ->db->select($query);
      return $result;
  }
}
?>
<?php 

$product = new product;
$show_product = $product->show_product();
$show_product1 = $product->show_product1();
$show_img = $product->show_img();
$show_imgdec = $product->show_imgdec();
$show_pro_dec = $product->show_pro_dec();
class product {
   private $db;

   public function __construct(){
       $this->db = new Database();
   }


   
   public function show_product(){
      $query ="SELECT * FROM tbl_product WHERE product_id = '$_GET[product_id]'";
       $result = $this ->db->select($query);
       return $result;
   }
   public function show_product1(){
    $query ="SELECT * FROM tbl_product WHERE product_id = '$_GET[product_id]'";
     $result = $this ->db->select($query);
     return $result;
 }

   public function show_img(){
      $query ="SELECT * FROM tbl_product_img_dec WHERE product_id = '$_GET[product_id]'";
       $result = $this ->db->select($query);
       return $result;
   }
   public function show_imgdec(){
      $query ="SELECT * FROM tbl_product_img_dec WHERE product_id = '$_GET[product_id]'";
       $result = $this ->db->select($query);
       return $result;
   }

   public function show_pro_dec(){
      $query ="SELECT * FROM tbl_product WHERE product_id = '$_GET[product_id]'";
       $result = $this ->db->select($query);
       return $result;
   }
}
?>
<?php
$chitiet = new chitiet;
$show_chitiet = $chitiet->show_chitiet(); 

class chitiet {
    private $db;

    public function __construct(){
        $this->db = new Database();
    }

    public function show_chitiet(){
      $query ="SELECT * FROM tbl_cauhinh WHERE product_id = '$_GET[product_id]'";
       $result = $this ->db->select($query);
       return $result;
    } 
    public function get_chitiet($product_id){
      $query ="SELECT * FROM tbl_cauhinh WHERE product_id = '$product_id'";
      $result = $this ->db->select($query);
      return $result;
    }

}
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

    <div class="navbar">
      <div class="item">
      <div class="item-has">
               <a href="..\sanpham.php" class="item-list" name="cartegory_id" ><i class="fa-solid fa-mobile-screen-button"></i> SẢN PHẨM</a>
               <div class="item-noti">
                  <ul class="item-noti-0">
                    <?php
                      
                           while($result = $show_cartegory->fetch_assoc()){
                           ?>
                  <li class="item-noti-1" name="cartegory_id" > 
                        <a href="..\sanpham_id.php?cartegory_id=<?php echo $result['cartegory_id'] ?>" class="item-noti-2"><?php echo $result['cartegory_name'] ?><a>
                     </li>
                     <?php     
                           
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
            <a href="#" class="item-list"><i class="fa-solid fa-newspaper"></i> TIN TỨC</a>
         </div>
         
         <div>
            <a href="#" class="item-list"><i class="fa-solid fa-right-to-bracket"></i> ĐĂNG NHẬP</a>
         </div>
         <div>
            <a href="#" class="item-list"><i class="fa-solid fa-user-plus"></i> ĐĂNG KÝ</a>
         </div>
      </div>
   </div>
   <main>
    <div class="chitiet">
        <div class="chitiet-right">
        
          <div class="chitiet-right-slide">
             <div class="chitiet-right-slide-top">
             <?php 
             while($result = $show_img->fetch_assoc()){
                  ?>
                   <a href=""><img src="../../admin/uploadsdec/<?php echo $result['product_img_dec'] ?>"></a>  
                   <?php
                }
            ?>
             </div>
             <div class="slide-right-top-btn">
               
                   <i class="fa-solid fa-chevron-left"></i>
                   <i class="fa-solid fa-chevron-right"></i>
             </div> 
          </div>
          <div class="chitiet-right-bottom">
            <?php 
               while($result = $show_imgdec->fetch_assoc()){
                  ?>
              <li class="active"><img src="../../admin/uploadsdec/<?php echo $result['product_img_dec'] ?>"> </li>
              <?php
                }
            ?>
          </div> 
        </div>
        <div class="slide-content-left">
          <div class="chitiet-left">
              <div class="chitiet-color">
                  <li>vàng</li>
                  <li>đỏ</li>
                  <li>xanh</li>
              </div>
              <?php 
                      while($result = $show_product->fetch_assoc()){
                          ?>
                <h1><?php echo $result['product_name'] ?></h1>
                <div class="chitiet-inf-price">
                  <div class="discount">
                      <h1><?php echo $result['product_discount'] ?>₫</h1>
                  </div>
                  <div class="price">
                      <h2><del><?php echo $result['product_price'] ?>₫</del></h2>
                  </div>
              </div>
              <?php
                    }
                ?>
           <div class="chitiet-inf-dec">
              <h2>cấu hình</h2>
              <?php 
             while($result = $show_product1->fetch_assoc()){
                  ?>
              <form class="chitiet-inf-buy" method="POST" action="giohang.php?action=add">              
                <table>
                  <?php 
                    while($result = $show_chitiet->fetch_assoc()){
                      ?>
                        <tr>
                          <td>màn hình:</td>
                          <Td><?php echo $result['manhinh'] ?></Td>
                        </tr>
                        <tr>
                          <td>hệ điều hành:</td>
                          <Td><?php echo $result['hedieuhanh'] ?></Td>
                        </tr> 
                        <tr>
                          <td>camera sau:</td>
                          <Td><?php echo $result['cam_sau'] ?></Td>
                        </tr> 
                        <tr>
                          <td>camera trước:</td>
                          <Td><?php echo $result['cam_truoc'] ?></Td>
                        </tr> 
                        <tr>
                          <td>chip:</td>
                          <Td><?php echo $result['chip'] ?></Td>
                        </tr>  
                        <tr>
                          <td>RAM:</td>
                          <Td><?php echo $result['ram'] ?></Td>
                        </tr> 
                        <tr>
                          <td>Dung lượng:</td>
                          <Td><?php echo $result['dungluong'] ?></Td>
                        </tr> 
                        <tr>
                          <td>Pin:</td>
                          <Td><?php echo $result['pin'] ?></Td>
                        </tr> 
                    
                </table><div class="quality"> 
                      <input type="number" name="quality[<?php echo $result['product_id'] ?>]" value="1" min="1"></input>
                    </div>
                    <?php
                    }
                  ?>
                    <div class="chitiet-inf-buy">
                        <button>THÊM VÀO GIỎ HÀNG</button>
                        <button>ĐẶT MUA</button>
                    </div>
              </form>
              <?php
                    }
                ?>
           </div>
         
        </div>         
      </div>
      </div>
      <div class="chitiet-bottom">
      
          <div class="chitiet-bottom-top">
              <div class="chitiet-mota">
                <li id="mota" class="activeA">MÔ TẢ</li>
                <li id="danhgia">ĐÁNH GIÁ</li>
              </div>
                  
          </div>
          <div class="chitiet-bottom-in">
            <div class="chitiet-bottom-dec">
                <div class="chitiet-bottom-dec-mota">
                  <h3>MÔ TẢ SẢN PHẨM</h3><br>
                  <?php 
             while($result = $show_pro_dec->fetch_assoc()){
                  ?>
                  <p><?php echo $result['product_dec'] ?></p>
                  <?php
                }
            ?>
                </div>
            <div class="chitiet-bottom-dec-danhgia">
              <h3>ĐÁNH GIÁ</h3>
              <div class="chitiet-bottom-dec-danhgia-in">
                  <h3>đánh giá điện thoại<span></span></h3>
                  <div class="danhgia">
                     <p>đánh giá của bạn</p>
                     <div class="stars">
                        <form action="">
                           <input class="star star-5" id="star-5" type="radio" name="star"/>
                           <label class="star star-5" for="star-5"></label>
                           <input class="star star-4" id="star-4" type="radio" name="star"/>
                           <label class="star star-4" for="star-4"></label>
                           <input class="star star-3" id="star-3" type="radio" name="star"/>
                           <label class="star star-3" for="star-3"></label>
                           <input class="star star-2" id="star-2" type="radio" name="star"/>
                           <label class="star star-2" for="star-2"></label>
                           <input class="star star-1" id="star-1" type="radio" name="star"/>
                           <label class="star star-1" for="star-1"></label>
                         </form>
                     </div>
                  </div>
                  <p>nhận xét của bạn</p>
                     <textarea cols="100%" rows="10"></textarea><br>
                     <button>GỬI ĐI</button>
              </div> 
              
              
            </div>
          </div>
      </div>
    </div>
  </main>
<?php 
    include "footer.php"
?>  