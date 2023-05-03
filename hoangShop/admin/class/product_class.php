<?php 
    include "../database.php";
?>

<?php
class product {
    private $db;

    public function __construct(){
        $this->db = new Database();
    }
   
    public function show_product_page(){
        $items_page = $_GET['per_page'];
        $current_page= $_GET['page'];
        $offset = ($current_page - 1) * $items_page;
      $query = "SELECT tbl_product.*, tbl_cartegory.cartegory_name,tbl_brand.brand_name
        FROM tbl_product INNER JOIN tbl_cartegory ON tbl_product.cartegory_id = tbl_cartegory.cartegory_id INNER JOIN tbl_brand ON tbl_product.brand_id = tbl_brand.brand_id
        ORDER BY tbl_brand.brand_id asc LIMIT ".$items_page." OFFSET ".$offset."";
        $result = $this ->db->select($query);
        return $result;
    } 
        // public function show_product(){
            
        // $query = "SELECT tbl_product.*, tbl_cartegory.cartegory_name,tbl_brand.brand_name
        //     FROM tbl_product INNER JOIN tbl_cartegory ON tbl_product.cartegory_id = tbl_cartegory.cartegory_id INNER JOIN tbl_brand ON tbl_product.brand_id = tbl_brand.brand_id where (".$where.")
        //     ORDER BY tbl_brand.brand_id asc ";
        //     $result = $this ->db->select($query);
        //     return $result;
        // } 
    public function show_product1(){
        
      $query = "SELECT tbl_product.*, tbl_cartegory.cartegory_name,tbl_brand.brand_name
        FROM tbl_product INNER JOIN tbl_cartegory ON tbl_product.cartegory_id = tbl_cartegory.cartegory_id INNER JOIN tbl_brand ON tbl_product.brand_id = tbl_brand.brand_id
        ORDER BY tbl_brand.brand_id asc ";
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
        move_uploaded_file($_FILES['product_img']['tmp_name'],"../uploads/".$_FILES['product_img']['name']);
        $product_img_back = $_FILES['product_img_back']['name'];
        move_uploaded_file($_FILES['product_img_back']['tmp_name'],"../uploads/".$_FILES['product_img_back']['name']);
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
            move_uploaded_file($filetmp[$key],"../uploadsdec/".$value);
            $query = "INSERT INTO tbl_product_img_dec (product_id,product_img_dec)VALUES ('$product_id','$value')";
            $result = $this->db->insert($query);
        }
      }
        return $result;
    }

    public function get_product($product_id){
        $query ="SELECT * FROM tbl_product WHERE product_id = '$product_id'";
        $result = $this ->db->select($query);
        return $result;
    }
    public function get_img($product_id){
        $query ="SELECT * FROM tbl_product_img_dec WHERE product_id = '$product_id'";
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
        move_uploaded_file($_FILES['product_img']['tmp_name'],"../uploads/".$_FILES
        ['product_img']['name']);
        $product_img_back = $_FILES['product_img_back']['name'];
        move_uploaded_file($_FILES['product_img_back']['tmp_name'],"../uploads/".$_FILES['product_img_back']['name']);
        $product_img_dec = $_FILES['product_img_dec']['name'];
        $query ="UPDATE tbl_product SET
          cartegory_id ='$cartegory_id', 
          brand_id = '$brand_id',
          product_name ='$product_name',
          product_price ='$product_price',
          product_discount ='$product_discount',
          product_dec = '$product_dec',
          product_img ='$product_img',
          product_img_back ='$product_img_back'
           WHERE  product_id = '$_GET[product_id]'" ;
        
         $result = $this->db->update($query);
        // header('location:productlist.php');
        
        return $result;
    }


    public function delete_product($product_id){
        $query = "DELETE FROM tbl_product WHERE product_id = '$product_id'";
        $result = $this ->db->delete($query);
        // header('location:productlist.php');
        return $result;
    }

    public function insert_brand($cartegory_id, $brand_name){
        $query =" INSERT INTO tbl_brand (cartegory_id, brand_name) VALUES ('$cartegory_id', '$brand_name')";
        $result = $this->db->insert($query);
        return $result;
      }

      public function delete_brand($brand_id){
        $query = "DELETE FROM tbl_brand WHERE brand_id = '$brand_id'";
        $result = $this ->db->delete($query);
        header('location:brandlist.php');
        return $result;
    }

    public function update_brand($cartegory_id,$brand_name,$brand_id){
        $query = "UPDATE tbl_brand SET brand_name = '$brand_name',cartegory_id='$cartegory_id'
        WHERE brand_id = '$brand_id'";
        $result = $this ->db->update($query);
        header('location:brandlist.php');
        return $result;
    }

    public function get_brand($brand_id){
        $query ="SELECT * FROM tbl_brand WHERE brand_id = '$brand_id'";
        $result = $this ->db->select($query);
        return $result;
    }

    public function update_cartegory($cartegory_name,$cartegory_id){
        $query = "UPDATE tbl_cartegory SET cartegory_name = '$cartegory_name'
        WHERE cartegory_id = '$cartegory_id'";
        $result = $this ->db->update($query);
        header('location:cartegorylist.php');
        return $result;
    }

    public function delete_cartegory($cartegory_id){
        $query = "DELETE FROM tbl_cartegory WHERE cartegory_id = '$cartegory_id'";
        $result = $this ->db->delete($query);
        header('location:cartegorylist.php');
        return $result;
    }

    public function show_cartegory(){
        $query ="SELECT * FROM tbl_cartegory ORDER BY cartegory_id DESC";
        $result = $this ->db->select($query);
        return $result;
    }

    public function show_brand(){
        // $query ="SELECT * FROM tbl_brand ORDER BY brand_id DESC";
        $query = "SELECT tbl_brand.*, tbl_cartegory.cartegory_name
        FROM tbl_brand INNER JOIN tbl_cartegory ON tbl_brand.cartegory_id = tbl_cartegory.cartegory_id
        ORDER BY tbl_brand.brand_id DESC";
        $result = $this ->db->select($query);
        return $result;
    }

    public function get_cartegory($cartegory_id){
        $query ="SELECT * FROM tbl_cartegory WHERE cartegory_id = '$cartegory_id'";
        $result = $this ->db->select($query);
        return $result;
    }

    public function show_brand_ajax($cartegory_id){
        $query ="SELECT * FROM tbl_brand WHERE cartegory_id = '$cartegory_id'";
        $result = $this ->db->select($query);
        return $result;
    } 

    public function show_product_ajax($brand_id){
        $query ="SELECT * FROM tbl_product WHERE brand_id = '$brand_id'";
        $result = $this ->db->select($query);
        return $result;
    } 
}
?>