<?php session_start() ?>
<?php 
  // print_r($_GET['name']);exit;
  $search = isset($_GET['name']) ? $_GET['name'] : "";
  if($search){
    $where = "where product_name like '% ".$search." %'";
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" 
  integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" 
  crossorigin="anonymous" 
  referrerpolicy="no-referrer" />
  <link rel='stylesheet prefetch' href='https://netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css'>
  <link rel="icon" type="image/x-icon" href="imgae\An Bùi.png" class="iconLogo">
  <link rel="stylesheet" href="chitiet.css">
</head>
<body>
  <header id="header">
    <div class="grid">
        <div class="two">
            <div>                
              <a href="..\main.php"><img class="logo" src="..\..\imgae\Phone_preview_rev_1.png" > </a>                
            </div>
            
                 
                 <form id="search_product" class="search_product" action="" method="GET">
                      <input class="search" type="search" name="name" value=""  placeholder="Nhập thông tin cần tin cần tìm kiếm">
                      <input class="button" type="submit" value="&#127859">
                  </form>
                <a class="giohang" href="giohang.php"><i class="fa-solid fa-cart-shopping"></i> Giỏ hàng
                 </a>             
                 <?php
                    if(empty($_SESSION['user_name'])){
                        ?>
                      <?php 
                     }else{ $user_name = $_SESSION['user_name'];
                        ?><div>
                        <strong>xin chao</strong>
                        <p><?php echo $user_name ?></p>
                        <a href="..\logout.php">dang xuat</a>
                        <!-- <a href="editpass.php">doi mat khau</a> -->
                      </div>
                        <?php
                     }
                      ?> 
        </div>
        
    </div>   
  </header>
  