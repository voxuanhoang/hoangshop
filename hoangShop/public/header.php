<?php session_start(); ?>
<?php
    // include "class\class.php";
    include "..\admin\database.php";
    Include "..\admin\connect.php";
?> 
<?php 
 
  if(!empty($_GET['action']) && $_GET['action'] == 'search' && !empty($_POST)){
  $_SESSION['search'] = $_POST;
}

if(!empty($_SESSION['search'])){

  $where ="";
  foreach ($_SESSION['search'] as $field => $value) {

    if(!empty($value)){
      switch ($field) {
        case 'product_name':
          // $where .= (!empty($where)) ? " AND "."`".$field."` LIKE '% ".$value." %'" :"`".$field."` LIKE '% ".$value." %'" ;
          $where .= "`" .$field."` LIKE '%".$value."%'";
          break;
        
        default:
        $where .= (!empty($where)) ? " AND "."`".$field."` =  ".$value."": "`".$field."` = ".$value."";
          break;
      }
    }
  }
  extract($_SESSION['search']);
  }
  $items_page = !empty($_GET['per_page']) ? $_GET['per_page'] :4;
    $current_page= !empty($_GET['page']) ? $_GET['page'] :1;
    $offset = ($current_page - 1) * $items_page;
    if(!empty($where)){
    $totalRecord = mysqli_query($con, "select * from tbl_product where (".$where.")"); 
  }else { 
    
    $totalRecord = mysqli_query($con, "select * from tbl_product ");
  }
    $totalRecord = $totalRecord->num_rows;
    $totalPage = ceil($totalRecord/$items_page) ;

 if(!empty($where)){
  $test= mysqli_query($con, "SELECT tbl_product.*, tbl_cartegory.cartegory_name,tbl_brand.brand_name FROM tbl_product INNER JOIN tbl_cartegory ON tbl_product.cartegory_id = tbl_cartegory.cartegory_id INNER JOIN tbl_brand ON tbl_product.brand_id = tbl_brand.brand_id WHERE (".$where.") order by 'product_id ' asc LIMIT ".$items_page." OFFSET ".$offset."");
  } else {
    $test= mysqli_query($con, "SELECT tbl_product.*, tbl_cartegory.cartegory_name,tbl_brand.brand_name FROM tbl_product INNER JOIN tbl_cartegory ON tbl_product.cartegory_id = tbl_cartegory.cartegory_id INNER JOIN tbl_brand ON tbl_product.brand_id = tbl_brand.brand_id order by 'product_id ' asc LIMIT ".$items_page." OFFSET ".$offset."");
 }
//  $result= $checkuser->fetch_assoc();
//  var_dump($result);exit;
?>
<?php
$user= mysqli_query($con, "SELECT *FROM tbl_user ORDER BY id_user asc ");
$row = mysqli_fetch_assoc($user);
  // var_dump($row);exit;

?>

<?php 
// $account = new account;
// if($_SERVER['REQUEST_METHOD'] === 'POST'){
//   $user_name = $_POST['user_name'];
//   $pass_word = $_POST['pass_word'];
  
// }
// $checkuser = $account->checkuser();
// class account {
//   private $db;

//   public function __construct(){
//       $this->db = new Database();
//   }

//   public function checkuser(){
//     $query =" SELECT *FROM tbl_user ORDER BY id_user asc";
//     $result = $this->db->insert($query);
//     return $result;
//   }
// }
// $user_name = $_SESSION['user_name'];
// var_dump($user_name);exit;
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="main.css">
  <link rel="icon" type="image/x-icon" href="imgae\shoang.png" class="iconLogo">
  <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
  <title>Shop Hoang</title>
</head>
<body>
<div class="shop">
   <header id="header">
     <div class="grid">
         <div class="two">
             <div>                
               <a href="main.php"><img class="logo" src="..\imgae\Phone_preview_rev_1.png" > </a>                
             </div>
              <form id="search_product" action="sanpham.php?action=search" method="post">
                    <input class="search" type="search" name="product_name" value="<?php echo !empty($product_name)? $product_name:"" ?>" placeholder="nhập tên sản phẩm " >
                    <input class="button" type="submit" value="&#127859">
                </form>
                  <a class="giohang" href="chitiet\giohang.php"><i class="fa-solid fa-cart-shopping"></i> Giỏ hàng</a>
                  <?php
                    if(empty($_SESSION['user_name'])){
                        ?>
                      <?php 
                     }else{ $user_name = $_SESSION['user_name'];
                        ?><div>
                        <strong>Xin chào</strong>
                        <p><?php echo $user_name ?></p>
                        <a href="logout.php">dang xuat</a>
                        <!-- <a href="editpass.php">doi mat khau</a> -->
                      </div>
                        <?php
                     }
                      ?> 
         </div>
     </div>   
   </header>