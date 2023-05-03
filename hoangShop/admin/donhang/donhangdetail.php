<?php
    include "../header.php";
    include "../slider.php";
    include "../class/cart_class.php"
?> 
<?php
$cart = new cart;
$show_cart_detail = $cart->show_cart_detail();
?>
<div class="list-cart-detail">
        <div class="list-cart-detail-main">
        <h2>CHI TIẾT ĐƠN HÀNG</h2>
          <table>
            <tr>
              <th>Stt</th>
              <th>Mã đơn hàng</th>
              <th>Ảnh</th>
              <th>Tên sản phẩm</th>
              <th>Giá sản phẩm</th>
              <th>Số lượng</th>
              <th>Xoá</th> 
            </tr>
            <?php 
            if($show_cart_detail){$i=0;
                while($result = $show_cart_detail->fetch_assoc()){ $i++;
                  // var_dump($result['product_discount']);
                    ?>
                    
                    <tr>
                      <td><?php echo $i ?></td>
                      <td><?php echo $result['cart_id'] ?></td>
                      <td><img src="../uploads/<?php echo $result['product_img'] ?>" width="80px" height="80px"></td>
                      <td><?php echo $result['product_name'] ?></td>
                      <td><?php echo $result['product_discount'] ?></td>
                      <td><?php echo $result['quality'] ?></td>
                      <td>
                      <a href="cartdelete.php?cart_id=<?php echo $result['cart_id']?>" >xoá</a>
                    </td>
                    </tr>
            <?php
                }
            }
            ?>
          </table>
        </div>
    </div>
  </section>
</body>
</html>