<?php session_start(); ?>
<?php
    include "../header.php";
    include "../slider.php";
    include "../class/product_class.php";
    include "../connect.php";
?> 

<?php
$product = new product;
// $show_product = $product->show_product();
// $show_product1 = $product->show_product1();
// var_dump($show_product);exit;
// $show_product_page1 = $product->show_product_page1();
// $show_product_page = $product->show_product_page();
?>
<?php 
if(!empty($_GET['action']) && $_GET['action'] == 'search' && !empty($_POST)){
  $_SESSION['search'] = $_POST;
}
if(!empty($_SESSION['search'])){
  // var_dump($_SESSION['search']);exit;
  $where ="";
  foreach ($_SESSION['search'] as $field => $value) {
    // var_dump($_SESSION['search']);
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
    $test= mysqli_query($con, "select tbl_product.*, tbl_cartegory.cartegory_name,tbl_brand.brand_name FROM tbl_product INNER JOIN tbl_cartegory ON tbl_product.cartegory_id = tbl_cartegory.cartegory_id INNER JOIN tbl_brand ON tbl_product.brand_id = tbl_brand.brand_id order by 'product_id ' asc LIMIT ".$items_page." OFFSET ".$offset."");

    $totalPage = ceil($totalRecord/$items_page) ;

 if(!empty($where)){
  $test= mysqli_query($con, "SELECT tbl_product.*, tbl_cartegory.cartegory_name,tbl_brand.brand_name FROM tbl_product INNER JOIN tbl_cartegory ON tbl_product.cartegory_id = tbl_cartegory.cartegory_id INNER JOIN tbl_brand ON tbl_product.brand_id = tbl_brand.brand_id WHERE (".$where.") order by 'product_id ' asc LIMIT ".$items_page." OFFSET ".$offset."");
  // var_dump($test);exit;
  } else {
    $test= mysqli_query($con, "SELECT tbl_product.*, tbl_cartegory.cartegory_name,tbl_brand.brand_name FROM tbl_product INNER JOIN tbl_cartegory ON tbl_product.cartegory_id = tbl_cartegory.cartegory_id INNER JOIN tbl_brand ON tbl_product.brand_id = tbl_brand.brand_id order by 'product_id ' asc LIMIT ".$items_page." OFFSET ".$offset."");
 }
 mysqli_close($con);
?>
<div class="list-product">
      <div class="list-product-main">
        <h2>Danh sách sản phẩm</h2>
                  <form id="search_product" action="productlist.php?action=search" method="POST">

                       <input class="search" type="search" name="product_name" value="<?php echo !empty($product_name)? $product_name:"" ?>" placeholder="nhập tên sản phẩm " >
                      <input class="button" type="submit" value="tìm kiếm">

                  </form>
                  <div >
                    <span>có tất cả <strong><?php echo $totalRecord ?></strong> sản phẩm trên <strong><?php echo $totalPage ?></strong> </span>
                  </div>
          <table>
            <tr>
              <th>Stt</th>
              <th>Danh mục</th>
              <th>Loại sản phẩm</th>
              <th>Sản phẩm</th>
              <th>Giá</th>
              <th>khuyến mãi</th>
              <th>Mô tả</th>
              <th>Ảnh trước</th>
              <th>Ảnh sau</th>
              <th>Tuỳ biến</th> 
            </tr>
            <?php 
            if($test){$i=0;
                // while($result = $show_product_page->fetch_assoc())
                while($row = mysqli_fetch_assoc($test))
                { $i++;
                  // var_dump($row);exit;
                    ?>
                    
                    <tr>
                      <td><?php echo $i ?></td>
                      <td><?php echo $row['cartegory_name']?></td>
                      <td><?php echo $row['brand_name'] ?></td>
                      <td><?php echo $row['product_name'] ?></td>
                      <td><?php echo $row['product_price'] ?></td>
                      <td><?php echo $row['product_discount'] ?></td>
                      <td><textarea cols="15" rows="10"><?php echo $row['product_dec'] ?></textarea></td>
                      <td><img src="../uploads/<?php echo $row['product_img'] ?>" width="80px" height="80px"></td>
                      <td><img src="../uploads/<?php echo $row['product_img_back'] ?>" width="80px" height="80px"></td>
                      <td>
                      <a href="productedit.php?product_id=<?php echo $row['product_id']?>" >sửa</a> 
                      <a href="productdelete.php?product_id=<?php echo $row['product_id']?>" >xoá</a>
                    </td>
                    </tr>
            <?php
                }
            }
            ?>
                
          </table>
          
        </div>
            <?php 
                include "../pages.php";
            ?>
        
    </div>
</div>        
        
    
</div>
</section>
</body>
</html>