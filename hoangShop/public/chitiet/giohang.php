
<?php 
    include "header.php";
    include "..\..\admin\database.php";
    include "..\..\admin\connect.php";
    include "..\class\brand.php";
?>

<?php 
   if(!isset($_SESSION['cart'])){
      $_SESSION['cart'] = array();
   }
   if(isset($_GET['action']) ){
      function update_cart($add = false) {
         foreach($_POST['quality'] as $product_id => $quality){
              if($add){
                   $_SESSION['cart'][$product_id] += $quality;
              }else {
               $_SESSION['cart'][$product_id] = $quality;
              }
            }
      }
      switch($_GET['action']){
         case "add":
            update_cart(true);
            header('location:giohang.php');
         break;
         case "delete":
            if($_GET['product_id']){
               unset($_SESSION['cart'][$_GET['product_id']]);
               
            }
            header('location:giohang.php');
         break;
         case "submit":
            if(isset($_POST['update'])){
               update_cart();
               header('location:giohang.php');
            }elseif($_POST['order']){
               header('location:giaohang.php'); 
            }
            break;
      } }
   if(!empty($_SESSION['cart'])){
      $test = mysqli_query($con, "SELECT * FROM tbl_product WHERE product_id IN (".implode(",", array_keys($_SESSION['cart'])).")");
      $test1 = mysqli_query($con, "SELECT * FROM tbl_product WHERE product_id IN (".implode(",", array_keys($_SESSION['cart'])).")");
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
<div class="cart">
   <div class="cart-main">
      <div class="cart-container"> 
         <?php 
            if(!empty($test)){
         ?>
            <form method="POST" action="giohang.php?action=submit"> 
               <table>
                  <tr></tr>
                     <th>SẢN PHẨM</th>
                     <th>TÊN SẢN PHẨM</th>
                     <th>GIÁ</th>
                     <th>SL</th>
                     <th>TỔNG CỘNG</th>
                     <th>XOÁ </th>
                  </tr>
                  <?php
                     while($row = mysqli_fetch_assoc($test))
                     {
                  ?>
                  <tr>
                     <td><img src="../../admin/uploads/<?php echo $row['product_img'] ?>"></td>
                     <td><p><?php echo $row['product_name'] ?></p></td>
                     <td><?php echo number_format($row['product_discount'])?>
                     </td>
                     <td><input type="number" name="quality[<?php echo $row['product_id'] ?>]" value="<?php echo $_SESSION['cart'][$row['product_id']] ?>" min="1"></input></td>
                     <td><?php echo number_format($row['product_discount'] * $_SESSION['cart'][$row['product_id']]) ?> </td>
                     <td><a href="giohang.php?action=delete&product_id=<?php echo $row['product_id'] ?>" type="button" class="xoa" >x
                     </td>
                  </tr>
                  <?php
                     } 
                  }else{
                     ?>
                        <div class="cart_rong">
                           <p>GIỎ HÀNG TRỐNG</p>
                           <a href="../main.php">quay lại trang chủ</a>
                        </div>
                  <?php
                     }
                  ?> 
                  <?php 
                     if(!empty($test))
                        {
                  ?>
               </table>
                  <div>
                     <input class="update" type="submit" name="update" value="cập nhật giỏ hàng">
                  </div>
               <?php } ?>
            </form> 
      </div>      
                  <?php 
                     $sl= 0;
                     $total= 0;
                     if(!empty($test1))
                        {
                        while($row = mysqli_fetch_assoc($test1)){
                  ?>
                  <?php 
                     $total  += $row['product_discount'] * $_SESSION['cart'][$row['product_id']];
                  ?>
                  <?php $sl += $_SESSION['cart'][$row['product_id']] ?>;
                  <?php 
                     }
                  ?>
                  <?php
                     $ship = 5000000;
                     $free = "";
                     if($total > $ship){
                        $free = "Đơn hàng của bạn được FREE SHIP";
                     }else{
                        $add = $ship - $total;
                        $add1 = number_format($add);
                        $free ="Mua thêm $add1 đ để được miễn phí ship";
                     }
                  ?>
      <div class="cart-sum">
         <form method="POST" action="giohang.php?action=submit"> 
            <table>
               <tr>
                  <th colspan="2">TỔNG TIỀN GIỎ HÀNG</th>
               </tr>
               <tr>
                  <td>Tổng sản phâm</td>
                  <td><p><?php echo $sl ?></p></td>
               </tr>
               <tr>
                  <td>Tổng tiền</td>
                  <td><p ><?php echo number_format($total) ?></p></td>
               </tr>
               <tr>
                  <td>Tổng cộng</td>
                  <td><p><?php echo number_format($total) ?></p></td>
               </tr>
            </table>
            <div class="cart-sum-text">
               <p style="font-size: 13px;">Bạn sẽ được miễn phí ship nếu đơn hàng của bạn có tổng giá trị trên 5.000.000 đ</p>
               <p style="color:red; font-weight:bold;font-size:20"> <span style="font-size: 20px;"><?php echo (isset($free))?$free: '' ?></span></p>
            </div>
            <div class="cart-sum-text-button">
               <a href="..\main.php" >TIẾP TỤC MUA SẮM</a>
               <input type="submit" name="order" value="ĐẶT HÀNG">
            </div>
         </form> 
      </div>
                  <?php
                     }
                  ?>            
   </div>
</div> 
<?php 
    include "footer.php";
?>
