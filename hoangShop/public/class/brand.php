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