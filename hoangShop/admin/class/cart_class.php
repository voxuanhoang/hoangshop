<?php 
    include "../database.php";
?>

<?php
class cart {
    private $db;

    public function __construct(){
        $this->db = new Database();
    }

    public function show_cart(){
      $query ="SELECT * FROM tbl_cart ORDER BY cart_id DESC";
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
        $product_img_back = $_FILES['product_img_back']['name'];
        move_uploaded_file($_FILES['product_img_back']['tmp_name'],"uploads/".$_FILES['product_img_back']['name']);
        $query ="INSERT INTO tbl_product (
          cartegory_id,
          brand_id,
          product_name,
          product_price,
          product_discount,
          product_dec,
          product_img,
          product_img_back
          ) 
          VALUES ('$cartegory_id', 
          '$brand_id',
          '$product_name',
          '$product_price',
          '$product_discount',
          '$product_dec',
          '$product_img',
          '$product_img_back'
          )";
      $result = $this->db->insert($query);
      if($result){
        $query = "SELECT * FROM tbl_product ORDER BY product_id DESC LIMIT 1";
        $result = $this ->db->select($query)->fetch_assoc();
        $product_id = $result['product_id']; //lay id moi nhat 
        $filename = $_FILES['product_img_dec']['name'];
        $filetmp = $_FILES['product_img_dec']['tmp_name'];
        foreach($filename as $key => $value)
        {
            move_uploaded_file($filetmp[$key],"uploadsdec/".$value);
            $query = "INSERT INTO tbl_product_img_dec (product_id,product_img_dec)VALUES ('$product_id','$value')";
            $result = $this->db->insert($query);
        }
      }
        return $result;
    }

    public function show_cart_detail(){
        $query ="SELECT tbl_cart_detail.*, tbl_product.product_img,tbl_product.product_name,tbl_product.product_discount
        FROM tbl_cart_detail INNER JOIN tbl_product ON tbl_cart_detail.product_id = tbl_product.product_id   WHERE cart_id = '$_GET[cart_id]'";
        $result = $this ->db->select($query);
        return $result;
    }
    // $cartegory_id,$brand_id,$product_name,$product_price,$product_discount,$product_dec,$product_img
    public function delete_cart($cart_id){
        $query = "DELETE FROM tbl_cart WHERE cart_id = '$cart_id'";
        $result = $this ->db->delete($query);
        header('location:donhanglist.php');
        return $result;
    }
}
?>