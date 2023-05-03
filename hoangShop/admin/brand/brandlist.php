<?php
    include "../header.php";
    include "../slider.php";
    include "../class/brand_class.php"
?> 
<?php
$brand = new brand;
$show_brand = $brand->show_brand();
?>
<div class="brand-list-product">
        <div class="list-brand">
        <h2>Danh sách loại sản phẩm</h2>
          <table>
            <tr>
              <th>Stt</th>
              <th>Id</th>
              <th>Tên danh mục</th>
              <th>Loại sản phẩm</th>
              <th>Ngày thêm</th>
              <th>Ngày chỉnh sửa</th>
              <th>Tuỳ biến</th>
            </tr>
            <?php
            if($show_brand){$i=0;
                while($result = $show_brand->fetch_assoc()){ $i++;
                    ?>
            <tr>
              <td><?php echo $i ?></td>
              <td><?php echo $result['brand_id'] ?></td>
              <td><?php echo $result['cartegory_name'] ?></td>
              <td><?php echo $result['brand_name'] ?></td>
              <td><?php echo $result['create_at']?></td>
              <td><?php echo $result['update_at']?></td>
              <td><a href="brandedit.php?brand_id=<?php echo $result['brand_id']?>" >sửa</a>
              <a href="branddelete.php?brand_id=<?php echo $result['brand_id']?>" >xoá</a></td>
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