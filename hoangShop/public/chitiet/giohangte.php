<?php session_start(); ?>
<?php 
    include "header.php";
    include "..\..\admin\database.php";
    include "..\..\admin\connect.php";
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
$product = new product;
$show_product = $product->show_product();
// $show_product_cart = $product->show_product_cart();
// $show_product_cart1 = $product->show_product_cart1();
class product {
   private $db;

   public function __construct(){
       $this->db = new Database();
   }


   public function show_product(){
     $query = "SELECT tbl_product.*, tbl_cartegory.cartegory_name,tbl_brand.brand_name
       FROM tbl_product INNER JOIN tbl_cartegory ON tbl_product.cartegory_id = tbl_cartegory.cartegory_id INNER JOIN tbl_brand ON tbl_product.brand_id = tbl_brand.brand_id
       ORDER BY tbl_brand.brand_id asc";
       $result = $this ->db->select($query);
       return $result;
   } 
   public function show_product_cart(){
      $query ="SELECT * FROM tbl_product WHERE product_id IN (".implode(",", array_keys($_SESSION['cart'])).")";
       $result = $this ->db->select($query);
       return $result;
    }
    public function show_product_cart1(){
      $query ="SELECT * FROM tbl_product WHERE product_id IN (".implode(",", array_keys($_SESSION['cart'])).")";
       $result = $this ->db->select($query);
       return $result;
    }

   public function insert_product(){
       $cartegory_id = $_POST['cartegory_id'];
       $brand_id = $_POST['brand_id'];
       $product_name = $_POST['product_name'];
       $product_price = $_POST['product_price'];
       $product_discount = $_POST['product_discount'];
       $product_dec = $_POST['product_dec'];
       $product_img = $_FILES['product_img']['name'];
       move_uploaded_file($_FILES['product_img']['tmp_name'],"uploads/".$_FILES['product_img']['name']);
       $query ="INSERT INTO tbl_product (
         cartegory_id,
         brand_id,
         product_name,
         product_price,
         product_discount,
         product_dec,
         product_img
         ) 
         VALUES ('$cartegory_id', 
         '$brand_id',
         '$product_name',
         '$product_price',
         '$product_discount',
         '$product_dec',
         '$product_img'
         )";
     $result = $this->db->insert($query);
       return $result;
   }

   public function get_product($product_id){
       $query ="SELECT * FROM tbl_product WHERE product_id = '$product_id'";
       $result = $this ->db->select($query);
       return $result;
   }
   // $cartegory_id,$brand_id,$product_name,$product_price,$product_discount,$product_dec,$product_img
   public function update_product($product_id){
       $cartegory_id = $_POST['cartegory_id'];
       $brand_id = $_POST['brand_id'];
       $product_name = $_POST['product_name'];
       $product_price = $_POST['product_price'];
       $product_discount = $_POST['product_discount'];
       $product_dec = $_POST['product_dec'];
       $product_img = $_FILES['product_img']['name'];
       move_uploaded_file($_FILES['product_img']['tmp_name'],"uploads/".$_FILES['product_img']['name']);
       $query ="UPDATE tbl_product SET
         cartegory_id ='$cartegory_id', 
         brand_id = '$brand_id',
         product_name ='$product_name',
         product_price ='$product_price',
         product_discount ='$product_discount',
         product_dec = '$product_dec',
         product_img ='$product_img'
          WHERE  product_id = '$_GET[product_id]'" ;
       
        $result = $this->db->update($query);
       header('location:productlist.php');
       return $result;
   }


   public function delete_product($product_id){
       $query = "DELETE FROM tbl_product WHERE product_id = '$_GET[product_id]'";
       $result = $this ->db->delete($query);
       header('location:productlist.php');
       return $result;
   }
}
?>

<?php 
$brand = new brand;
$show_brand = $brand->show_brand();
// $show_brandname= $brand->show_brandname();

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
      // $query ="SELECT * FROM tbl_brand ORDER BY brand_id DESC";
      $query = "SELECT tbl_brand.*, tbl_cartegory.cartegory_name
      FROM tbl_brand INNER JOIN tbl_cartegory ON tbl_brand.cartegory_id = tbl_cartegory.cartegory_id 
      ORDER BY tbl_brand.brand_id ASC";
      $result = $this ->db->select($query);
      return $result;
  }
//   public function show_brandname($cartegory_id){
//    $query ="SELECT * FROM tbl_brand WHERE cartegory_id = '$_GET[cartegory_id]'";
//    $result = $this ->db->select($query);
//    return $result;
//  }

}
?>
<?php 
// var_dump(implode(",", array_keys($_SESSION['cart'])));exit;
  
   // var_dump($test);exit;
?>
<?php 
//  $test = mysqli_query($con, "SELECT * FROM tbl_product WHERE product_id ");
   if(!isset($_SESSION['cart'])){
      $_SESSION['cart'] = array();
   }
   if(isset($_GET['action']) ){
      //   var_dump($_POST);exit;
      
      switch($_GET['action']){
         case "add":
            // var_dump($_POST);exit;
            foreach($_POST['quality'] as $product_id => $quality){
              
                   $_SESSION['cart'][$product_id] = $quality;
               
            }
            // var_dump($_SESSION['cart']);exit;
            // header('location:giohang.php'); 
         break;
         case "delete":
            if($_GET['product_id']){
               unset($_SESSION['cart'][$_GET['product_id']]);
               
            }
            header('location:giohangte.php');
         break;
         case "submit":
            if(isset($_POST['update'])){
               // var_dump($_POST);exit;
               update_cart();
               header('location:giohangte.php');
            }elseif($_POST['order']){
               header('location:giaohangte.php'); 
               // var_dump($_POST);exit;
            }
            break;
      } }
      // var_dump(implode(",", array_keys($_SESSION['cart'])));exit;
      // $test = mysqli_query($con, "SELECT * FROM tbl_product WHERE product_id IN (82,84,91)");
   if(!empty($_SESSION['cart'])){
      // var_dump(implode(",", array_keys($_SESSION['cart'])));exit;
      // var_dump($_SESSION['cart']);
      $test = mysqli_query($con, "SELECT * FROM tbl_product WHERE product_id IN (".implode(",", array_keys($_SESSION['cart'])).")");
      $test1 = mysqli_query($con, "SELECT * FROM tbl_product WHERE product_id IN (".implode(",", array_keys($_SESSION['cart'])).")");
      // var_dump($test);
   //   var_dump("SELECT * FROM tbl_product WHERE product_id IN (".implode(",", array_keys($_SESSION['cart'])).")");
   // var_dump($_SESSION['cart']);exit;
      // SELECT * FROM `tbl_product` WHERE `product_id` IN (81,82,84
      // $show_product_cart=$product->show_product_cart();
      // var_dump($show_product_cart);
      
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
               if(!empty($test))
                     {
               ?>
               <form method="POST" action="giohangte.php?action=submit"> 
                  
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
                                 // while($result = $show_product_cart->fetch_assoc()){
                                    while($row = mysqli_fetch_assoc($test))
                                 {
                                       // var_dump($row);exit;
                              ?>
                              <tr>
                              <td><img src="../../admin/uploads/<?php echo $row['product_img'] ?>"></td>
                              <td><p><?php echo $row['product_name'] ?></p></td>
                              <td><?php echo number_format($row['product_discount']) ?></td>
                              <td><input type="text" name="quality[<?php echo $row['product_id'] ?>]" value="<?php echo $_SESSION['cart'][$row['product_id']] ?>" min="1"></input></td>
                              <td><?php echo number_format($row['product_discount'] * $_SESSION['cart'][$row['product_id']]) ?> </td>
                              <td><span><a href="giohangte.php?action=delete&product_id=<?php echo $row['product_id'] ?>" type="button" >x</span></td>
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
                                 
                     ?> </table>
                        <div>
                           <input type="submit" name="update" value="cap nhat">
                        </div>
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
                  <form method="POST" action="giohangte.php?action=submit"> 
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
                        <button>TIẾP TỤC MUA SẮM</button>
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
