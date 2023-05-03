<?php
    include "../header.php";
    include "../slider.php";
    include "../class/cartegory_class.php"
?> 
<?php
$cartegory = new cartegory;
$show_cartegory = $cartegory->show_cartegory();
?>
<div class="cartegory-list-product">
        <div class="list-product">
        <h2>Danh sách danh mục</h2>
        <table>
            <tr>
              <th>Stt</th>
              <th>Id</th>
              <th>Danh mục</th>
              <th>Ngày thêm</th>
              <th>Ngày chỉnh sửa</th>
              <th>Tuỳ biến</th>
            </tr>
            <?php 
            if($show_cartegory){$i=0;
                while($result = $show_cartegory->fetch_assoc()){ $i++;
                    ?>
                    
                    <tr>
                      <td><?php echo $i ?></td>
                      <td><?php echo $result['cartegory_id'] ?></td>
                      <td><?php echo $result['cartegory_name'] ?></td>
                      <td><?php echo $result['create_at']?></td>
                      <td><?php echo $result['update_at']?></td>
                      <td><a href="cartegoryedit.php?cartegory_id=<?php echo $result['cartegory_id']?>" >sửa</a> 
                      <a href="cartegorydelete.php?cartegory_id=<?php echo $result['cartegory_id']?>" >xoá</a></td>
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