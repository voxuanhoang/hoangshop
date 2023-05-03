<?php 
    include "../database.php";
?>

<?php
class chitiet {
    private $db;

    public function __construct(){
        $this->db = new Database();
    }

    public function show_product(){
      $query = "SELECT tbl_product.*, tbl_cartegory.cartegory_name,tbl_brand.brand_name
        FROM tbl_product INNER JOIN tbl_cartegory ON tbl_product.cartegory_id = tbl_cartegory.cartegory_id INNER JOIN tbl_brand ON tbl_product.brand_id = tbl_brand.brand_id
        ORDER BY tbl_brand.brand_id DESC";
        $result = $this ->db->select($query);
        return $result;
    } 

    public function show_chitiet(){
      $query = "SELECT tbl_cauhinh.*, tbl_product.product_name
        FROM tbl_cauhinh INNER JOIN tbl_product ON tbl_cauhinh.product_id = tbl_product.product_id 
        ORDER BY tbl_product.product_id asc";
        $result = $this ->db->select($query);
        return $result;
    } 
    public function insert_chitiet(){
        $product_id = $_POST['product_id'];
        $manhinh = $_POST['manhinh'];
        $hedieuhanh = $_POST['hedieuhanh'];
        $cam_sau = $_POST['cam_sau'];
        $cam_truoc = $_POST['cam_truoc'];
        $chip = $_POST['chip'];
        $ram = $_POST['ram'];
        $dungluong = $_POST['dungluong'];
        $pin = $_POST['pin'];
        $query ="INSERT INTO tbl_cauhinh (
          product_id,
          manhinh,
          hedieuhanh,
          cam_sau,
          cam_truoc,
          chip,
          ram,
          dungluong,
          pin
          ) 
          VALUES ( 
            '$product_id',
          '$manhinh',
          '$hedieuhanh',
          '$cam_sau',
          '$cam_truoc',
          '$chip',
          '$ram',
          '$dungluong',
          '$pin'
          )";
          $result = $this->db->insert($query);
        return $result;
    }

    public function get_product($product_id){
        $query ="SELECT * FROM tbl_product WHERE product_id = '$product_id'";
        $result = $this ->db->select($query);
        return $result;
    }

    public function get_chitiet($product_id){
      $query ="SELECT * FROM tbl_cauhinh WHERE product_id = '$product_id'";
      $result = $this ->db->select($query);
      return $result;
    }

    public function update_chitiet($product_id){
      $product_name =$_POST['product_name'];
      $manhinh = $_POST['manhinh'];
      $hedieuhanh = $_POST['hedieuhanh'];
        $cam_sau = $_POST['cam_sau'];
        $cam_truoc = $_POST['cam_truoc'];
        $chip = $_POST['chip'];
        $ram = $_POST['ram'];
        $dungluong = $_POST['dungluong'];
        $pin = $_POST['pin'];
        $query ="UPDATE tbl_cauhinh SET
          manhinh ='$manhinh', 
          hedieuhanh = '$hedieuhanh',
          cam_sau ='$cam_sau',
          cam_truoc ='$cam_truoc',
          chip ='$chip',
          ram = '$ram',
          dungluong ='$dungluong',
          pin ='$pin'
           WHERE  product_id = '$_GET[product_id]'" ;
          $result = $this->db->update($query);
        //   header('location:chitietlist.php');
          return $result;
    }


    public function delete_chitiet($product_id){
        $query = "DELETE FROM tbl_cauhinh WHERE product_id = '$product_id'";
        $result = $this ->db->delete($query);
        // header('location:chitietlist.php');
        return $result;
    }

  
}
?>
<?php
class product {
    private $db;

    public function __construct(){
        $this->db = new Database();
    }

    public function show_product(){
      $query = "SELECT tbl_product.*, tbl_cartegory.cartegory_name,tbl_brand.brand_name
        FROM tbl_product INNER JOIN tbl_cartegory ON tbl_product.cartegory_id = tbl_cartegory.cartegory_id INNER JOIN tbl_brand ON tbl_product.brand_id = tbl_brand.brand_id
        ORDER BY tbl_brand.brand_id DESC";
        $result = $this ->db->select($query);
        return $result;
    } 

    public function insert_product(){
        $cartegory_id = $_POST['cartegory_id'];
        $brand_id = $_POST['brand_id'];
        $query ="INSERT INTO tbl_product (
          cartegory_id,
          brand_id
          ) 
          VALUES ('$cartegory_id', 
          '$brand_id'
          )";
      $result = $this->db->insert($query);
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
        
        $query ="UPDATE tbl_product SET
          cartegory_id ='$cartegory_id', 
          brand_id = '$brand_id',
          
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
}
?>