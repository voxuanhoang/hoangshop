<?php
    include "../header.php";
    include "../slider.php";
    include "../class/chitiet_class.php"
?> 
<?php
$chitiet = new chitiet;
$show_chitiet = $chitiet->show_chitiet();
?>
<div class="list-chitiet">
        <div class="list-chitiet-main">
        <h2>Danh sách cấu hình sản phẩm</h2>
          <table>
            <tr>
              <th>Stt</th>
              <th>Sản phẩm</th>
              <th>Màn hình</th>
              <th>Hệ điều hành</th>
              <th>Camera sau</th>
              <th>Cammera trước</th>
              <th>Chip</th>
              <th>RAM</th>
              <th>Dung lượng</th>
              <th>PIN</th>
              <th>Tuỳ biến</th> 
            </tr>
            <?php 
            if($show_chitiet){$i=0;
                while($result = $show_chitiet->fetch_assoc()){ $i++;
                    ?>
                    
                    <tr>
                      <td><?php echo $i ?></td>
                      <td><?php echo $result['product_name']?></td>
                      <td><?php echo $result['manhinh'] ?></td>
                      <td><?php echo $result['hedieuhanh'] ?></td>
                      <td><?php echo $result['cam_sau'] ?></td>
                      <td><?php echo $result['cam_truoc'] ?></td>
                      <td><?php echo $result['chip'] ?></td>
                      <td><?php echo $result['ram'] ?></td>
                      <td><?php echo $result['dungluong'] ?></td>
                      <td><?php echo $result['pin'] ?></td>
                      <td>
                      <a href="cauhinhedit.php?product_id=<?php echo $result['product_id']?>" >sửa</a> 
                      <a href="cauhinhdelete.php?product_id=<?php echo $result['product_id']?>" >xoá</a>
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