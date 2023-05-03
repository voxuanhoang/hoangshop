<?php 
    // include "..\..\..\admin\database.php"

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
$show_product_cart = $product->show_product_cart();


     
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
  public function show_product_cart2(){
    $query ="SELECT * FROM tbl_product WHERE product_id IN (".implode(",", array_keys($_SESSION['cart'])).")";
     $result = $this ->db->select($query);
     return $result;
  }
  public function show_cart(){
    $query ="SELECT * FROM tbl_cart ORDER BY cart_id DESC";
    $result = $this ->db->select($query);
    return $result;
}
}
?>
<?php 

$cart_detail = new cart_detail;

$show_product_cart = $cart_detail->show_product_cart();

//   }
$sl=0;
$total1= 0;
                 
                 while($result = $show_product_cart->fetch_assoc()){
                //  var_dump($result)
                 
               ?><?php 
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
            


      // var_dump($total1);
if($_SERVER['REQUEST_METHOD'] === 'POST'){
  $insert_cart = $cart_detail->insert_cart($_POST);
}
class cart_detail{
 
  private $db;

   public function __construct(){
       $this->db = new Database();
   }
   public function show_product_cart(){
    $query ="SELECT * FROM tbl_product WHERE product_id IN (".implode(",", array_keys($_SESSION['cart'])).")";
     $result = $this ->db->select($query);
     return $result;
  }
 
   public function insert_cart(){
    
    // $user_name = $_POST['user_name'];
    // $phone = $_POST['phone'];
    // $address_user = $_POST['address_user'];
    // $thanhtoan = $_POST['thanhtoan'];
    // $ghichu = $_POST['ghichu'];
    // $total = $total1;
    $query ="INSERT INTO tbl_cart (
      user_name,
      phone,
      address_user,
      thanhtoan,
      total,
      ghichu
      ) 
      VALUES ('".$_POST['user_name']."', 
      '".$_POST['phone']."',
      '".$_POST['address_user']."',
      '".$_POST['thanhtoan']."',
      '".$_POST['total1']."',
      '".$_POST['ghichu']."'
      )";
    $result = $this->db->insert($query);
    return $result;
    }

    
}
if(isset($_POST['order'])){
  header('location:thanhtoan.php');
}
?>
<?php 
//  $test = mysqli_query($con, "SELECT * FROM tbl_product WHERE product_id ");
   if(!isset($_SESSION['cart'])){
      $_SESSION['cart'] = array();
   }
   if(isset($_GET['action']) ){
      //   var_dump($_POST);exit;
      $test = mysqli_query($con, "SELECT * FROM tbl_product WHERE product_id IN (".implode(",", array_keys($_SESSION['cart'])).")");
  var_dump($_POST);exit;
  
    $insertcart = mysqli_query($con, "INSERT INTO `tbl_cart` (`cart_id`, `user_name`, `phone`, `address_user`, `total`, `thanhtoan`, `ghichu`) VALUES (NULL, '".$_POST['user_name']."', 
  '".$_POST['phone']."',
  '".$_POST['address_user']."',
  '".$_POST['thanhtoan']."',
  '".$_POST['total1']."',
  '".$_POST['ghichu']."')");
  $cart_id = $con->insert_id;
  var_dump($cart_id);exit;
    // $cart_id = $con->insert_id;
    // var_dump($cart_id);exit;
   }
?>
<?php 
// if($_SERVER['REQUEST_METHOD'] === 'POST'){

//   // $insertcart($_POST);
// }
// $test = mysqli_query($con, "SELECT * FROM tbl_product WHERE product_id IN (".implode(",", array_keys($_SESSION['cart'])).")");
//   // var_dump($_POST);exit;
//   $insertcart = mysqli_query($con, "INSERT INTO `tbl_cart` (`cart_id`, `user_name`, `phone`, `address_user`, `total`, `thanhtoan`, `ghichu`) VALUES (NULL, '".$_POST['user_name']."', 
//   '".$_POST['phone']."',
//   '".$_POST['address_user']."',
//   '".$_POST['thanhtoan']."',
//   '".$_POST['total1']."',
//   '".$_POST['ghichu']."')");
//     var_dump($con->insert_id);exit;
?>