<?php
  include "header.php";
  include "..\..\admin\database.php";
//   include "..\admin\class\product_class.php";
   // include "..\admin\productadd_ajax.php";
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
       $query = "DELETE FROM tbl_product WHERE product_id = '$product_id'";
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
$tintuc = new tintuc;
$show_tintuc = $tintuc->show_tintuc();
$show_tintuc2 = $tintuc->show_tintuc2();
$show_tintuc3 = $tintuc->show_tintuc3();
class tintuc {
  private $db;

  public function __construct(){
      $this->db = new Database();
  }

  public function show_tintuc2(){
    $query ="SELECT * FROM tbl_news ORDER BY news_idd DESC";
    $result = $this ->db->select($query);
    return $result;
  }
  public function show_tintuc(){
    $query ="SELECT * FROM tbl_news WHERE news_idd = '$_GET[news_idd]'";
     $result = $this ->db->select($query);
     return $result;
 }
 public function show_tintuc3(){
  $query ="SELECT * FROM tbl_news WHERE news_idd = '$_GET[news_idd]'";
  $result = $this ->db->select($query);
  return $result;
}
}
?>
<div class="navbar">
    <div class="item">
    <div class="item-has">
             <a href="../sanpham.php" class="item-list" name="cartegory_id" ><i class="fa-solid fa-mobile-screen-button"></i> SẢN PHẨM</a>
             <div class="item-noti">
                <ul class="item-noti-0">
                  <?php
                     $show_cartegory = $cartegory->show_cartegory();
                     if($show_cartegory){
                         while($result = $show_cartegory->fetch_assoc()){
                         ?>
                <li class="item-noti-1" name="cartegory_id" > 
                      <a href="../sanpham_id.php?cartegory_id=<?php echo $result['cartegory_id'] ?>" class="item-noti-2"><?php echo $result['cartegory_name'] ?><a>
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
          <a href="../news.php" class="item-list"><i class="fa-solid fa-newspaper"></i> TIN TỨC</a>
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
  <div class="container-title">
  <?php 
         while($result = $show_tintuc3->fetch_assoc()){
          ?>
      <h1><?php echo $result['title_news'] ?></h1>
      <?php     
                         }
                    ?>
  </div>
  <div class="container-tintuc">
    <section class="container-tintuc-left">
    <?php 
         while($result = $show_tintuc->fetch_assoc()){
          ?>
      <div class="container-tintuc-main">
        
          <p><?php echo $result['noidung'] ?></p>
      </div>
      <?php     
                         }
                    ?>
    </section>
    <section class="container-tintuc-right">
        <div class="container-tintuc-right-title">
            <h3>BÀI VIẾT MỚI NHẤT</h3>
        </div>
        <?php 
         while($result = $show_tintuc2->fetch_assoc()){
          ?>
          <a href="chitietnews.php?news_idd=<?php echo $result['news_idd'] ?>" class="container-tintuc-right-bottom">
      
            <img src="../../admin/uploadsnews/<?php echo $result['news_img'] ?>">
            <p><?php echo $result['title_news'] ?></p>
            
          </a><?php     
                         }
                    ?>
    </section>
  </div>
</div>
<?php 
  include "footer.php";
?>