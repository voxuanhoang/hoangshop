
<?php 
    include "header.php";
    include "..\..\admin\database.php";
    include "..\..\admin\connect.php";
    include "..\class\sanpham_class.php";
?>


<?php 
  if(isset($_GET['cart'])){
    $_SESSION['cart'] = array();
 }
 if(isset($_POST['order'])){
   header('location:../sanpham.php');
 }
        
?>
<?php 
    
         function test(){
            $product = new product;
            $show_cart = $product->show_cart();
            $result = $show_cart->fetch_assoc();
            $cartid = $result['cart_id'];
            $insertString = "";
            // $insertString1 = array();
            $show_product_cart1 = $product->show_product_cart1();
            while($result = $show_product_cart1->fetch_assoc()){
               // $insertString1[] = $result;
            $insertString .= "
            ($cartid,
            ".$result['product_id'].",
            ".$result['product_price'].",
            ".$_SESSION['cart'][$result['product_id']]."),"; 
 }
            
         return  $insertString;
    }
    test();
?>
<?php 
   if(!isset($_SESSION['cart'])){
      $_SESSION['cart'] = array();
   }
   if(isset($_GET['action']) ){
      //   var_dump($_POST);exit;
      $test = mysqli_query($con, "SELECT * FROM tbl_product WHERE product_id IN (".implode(",", array_keys($_SESSION['cart'])).")");
      unset($_SESSION['cart']);
   }
$sl=0;
$total1= 0;
while($result = $show_product_cart->fetch_assoc()){
?>
<?php 
$total1  += $result['product_discount'] * $_SESSION['cart'][$result['product_id']];
?>
<?php $sl += $_SESSION['cart'][$result['product_id']] ?>           
<?php
} 
   $ship = 5000000;
   $free = "";
   $total = "";
   if($total1 > $ship){
      $free = 0;
   }else{
      $free = 50000;
   }
   if($free >0){
      $total = $total1 + $free;
   }else {
       $total = $total1;
   }
?>

<div class="navbar">
      <div class="item">
         <div class="item-has">
               <a href="../sanpham.php" class="item-list" name="cartegory_id" ><i class="fa-solid fa-mobile-screen-button"></i> SẢN PHẨM</a>
               <div class="item-noti">
                  <ul class="item-noti-0">
                    <?php
                      
                           while($result = $show_cartegory->fetch_assoc()){
                           ?>
                  <li class="item-noti-1" name="cartegory_id" > 
                        <a href="../sanpham_id.php?cartegory_id=<?php echo $result['cartegory_id'] ?>" class="item-noti-2"><?php echo $result['cartegory_name'] ?><a>
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
            <a href="../news.php" class="item-list"><i class="fa-solid fa-newspaper"></i> TIN TỨC</a>
         </div>
          
            <div>
            <a href="../login_user.php" class="item-list"><i class="fa-solid fa-right-to-bracket"></i> ĐĂNG NHẬP</a>
         </div>
         <div>
            <a href="../create_account.php" class="item-list"><i class="fa-solid fa-user-plus"></i> ĐĂNG KÝ</a>
         </div>
      </div>
</div>
   
<div class="payment">
   <div class="payment-container">
      <div class="payment-decript">
         <form method="POST" action="thanhtoan.php?action=submit">
               <table>
                  <?php 
                     $show_cart = $product->show_cart();
                     $result = $show_cart->fetch_assoc();
                     $cartid = $result['cart_id'];
                     ?>
                     <tr>
                        <th colspan="2">CHI TIẾT ĐƠN HÀNG</th>
                     </tr>
                     <tr>
                        <td><p>MÃ ĐƠN HÀNG</p></td>
                        <td><input type="hidden" name="cart_id" value="<?php echo $cartid ?>" /><?php echo $cartid ?></td>
                     </tr>
                     <tr>
                        <td><p>SẢN PHẨM</p></td>
                        <td>TỔNG CỘNG</td>
                     </tr>
                  <?php 
                     if($show_product_cart1)
                           while($result = $show_product_cart1->fetch_assoc()){
                  ?>
                     <tr>
                        <td><span><input type="hidden" name="product_id" value="<?php echo $result['product_id'] ?>" /><?php echo $result['product_name'] ?> x <input type="hidden" name="quality" value="<?php echo $_SESSION['cart'][$result['product_id']] ?>" /><?php echo $_SESSION['cart'][$result['product_id']] ?></span></td>
                        <td><input type="hidden" name="product_discount" value="<?php echo $result['product_discount'] ?>" /><?php echo number_format($result['product_discount'] * $_SESSION['cart'][$result['product_id']]) ?></td>
                     </tr>
                  <?php 
                     }
                  ?>
                     <tr>
                        <td>Phí ship</td>
                        <td><p><?php echo number_format($free) ?></p></td>
                     </tr>
                    
                     <tr>
                        <td>Tổng cộng</td>
                        <td><p><?php echo number_format($total) ?></p></td>
                     </tr>
               </table>
               <div class="back-cart">
                  <a href="giaohang.php" style="color:white;"><i class="fa-solid fa-backward-step"></i> Quay lại</a>
               </div>
               
      </div>
      <div class="payment-inf">
         <table>
            <tr>
               <th colspan="2">THÔNG TIN THANH TOÁN</th>
            </tr>
            <?php 

               while($result = $show_cart_detail->fetch_assoc()){
            ?>
            <tr>
               <td><p>Họ và tên</p></td>
               <td><?php echo $result['user_name'] ?></td>
            </tr>
            <tr>
               <td>Địa chỉ</td>
               <td><p><?php echo $result['address_user'] ?></p></td>
            </tr>
            <tr>
               <td>Số điện thoại</td>
               <td><p><?php echo $result['phone'] ?></p></td>
            </tr>
            <tr>
               <td>Ngày</td>
               <td><p><?php echo $result['create_at'] ?></p></td>
            </tr>
            <tr>
               <td>Tổng cộng</td>
               <td><p><?php echo number_format($total) ?></p></td>
            </tr>
            <tr>
               <td>Phương thức thanh toán</td>
               <td><p><?php echo $result['thanhtoan'] ?></p></td>
            </tr>
            <?php 
               }
            ?>
         </table>
         <div class="payment-inf-accept">
                  <!-- <button>XÁC NHẬN THANH TOÁN</button> -->
                  
            <input type="submit" name="order" value="XÁC NHẬN THANH TOÁN">
         </div>
      </div>
      </form>
   </div>
</div>

<?php 
    include "footer.php";
?>