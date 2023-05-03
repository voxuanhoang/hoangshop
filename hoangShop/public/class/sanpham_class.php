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
$show_product_cart1 = $product->show_product_cart1();
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

   public function get_product($product_id){
       $query ="SELECT * FROM tbl_product WHERE product_id = '$product_id'";
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
 public function show_cart(){
   $query ="SELECT * FROM tbl_cart ORDER BY cart_id DESC";
   $result = $this ->db->select($query);
   return $result;
}
}
?>
<?php 

$cart_detail = new cart_detail;
// $insert_cart = $cart_detail->insert_cart();
      // var_dump($total1);
if($_SERVER['REQUEST_METHOD'] === 'POST'){
   
  $insert_cart_detail = $cart_detail->insert_cart_detail($_POST);
  
}

$show_cart_detail = $cart_detail->show_cart_detail();
class cart_detail{
   
  private $db;

   public function __construct(){
       $this->db = new Database();
   }
   public function show_cart_detail(){
      $query ="SELECT * FROM tbl_cart order by cart_id desc limit 1 ";
       $result = $this ->db->select($query);
       return $result;
    }

   
   public function insert_cart_detail(){
      $product = new product;
      $show_cart = $product->show_cart();
      $result = $show_cart->fetch_assoc();
      $cartid = $result['cart_id'];
      $insertString = "";
      $show_product_cart1 = $product->show_product_cart1();
      while($result = $show_product_cart1->fetch_assoc()){
      $insertString .= "($cartid,
      ".$result['product_id'].",
      ".$result['product_discount'].",
      ".$_SESSION['cart'][$result['product_id']].")";
   }

      $insertString = substr(trim(test()), 0, -1);

      // echo $result['product_discount'];

      $query ="INSERT INTO tbl_cart_detail (
      cart_id,
      product_id,
      product_price,
      quality
      ) 
      VALUES 
      $insertString";
    $result = $this->db->insert($query);
    return $result;
    }
    
}

?>