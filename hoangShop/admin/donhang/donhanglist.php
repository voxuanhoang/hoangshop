<?php
    include "../header.php";
    include "../slider.php";
    include "../class/cart_class.php"
?> 
<?php
$cart = new cart;
$show_cart = $cart->show_cart();
?>
<div class="list-cart">
        <div class="list-cart-main">
        <h2>DANH SÁCH ĐƠN HÀNG</h2>
          <table>
            <tr>
              <th>Stt</th>
              <th>Tên người nhận</th>
              <th>Số điện thoại</th>
              <th>Địa chỉ</th>
              <th>tổng cộng</th>
              <th>phương thức thanh toán</th>
              <th>Ngày lên đơn</th>
              <th>Tuỳ biến</th> 
            </tr>
            <?php 
            if($show_cart){$i=0;
                while($result = $show_cart->fetch_assoc()){ $i++;
                    ?>
                    
                    <tr>
                      <td><?php echo $i ?></td>
                      <td><?php echo $result['user_name']?></td>
                      <td><?php echo $result['phone'] ?></td>
                      <td><?php echo $result['address_user'] ?></td>
                      <td><?php echo $result['total'] ?></td>
                      <td><?php echo $result['thanhtoan'] ?></td>
                      <td><?php echo $result['create_at'] ?></td>
                      <td>
                      <a href="donhangdetail.php?cart_id=<?php echo $result['cart_id']?>" >chi tiết</a> 
                      <a href="donhangdelete.php?cart_id=<?php echo $result['cart_id']?>" >xoá</a>
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