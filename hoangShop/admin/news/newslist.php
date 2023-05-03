<?php
    include "../header.php";
    include "../slider.php";
    include "../class/test_class.php"
?> 
<?php
$tintuc = new tintuc;
$show_tintuc = $tintuc->show_tintuc();
?>
<div class="list-tintuc">
        <div class="list-tintuc-main">
        <h2>Danh sách tin tức</h2>
        <table>
            <tr>
              <th>Stt</th>
              <th>Tiêu đề</th>
              <th>Nội dung</th>
              <th>tóm tắt nội dung</th>
              <th>Ảnh</th>
              <th>Ngày thêm</th>
              <th>Ngày chỉnh sửa</th>
              <th>Tuỳ biến</th> 
            </tr>
            <?php 
            if($show_tintuc){$i=0;
                while($result = $show_tintuc->fetch_assoc()){ $i++;
                    ?>
                    
                    <tr>
                      <td><?php echo $i ?></td>
                      <td><?php echo $result['title_news']?></td>
                      <td><textarea cols="15" rows="10"><?php echo $result['noidung'] ?></textarea></td>
                      <td><?php echo $result['tomtat_noidung'] ?></td>
                      <td><img src="uploadsnews/<?php echo $result['news_img'] ?>" width="80px" height="80px"></td>
                      <td><?php echo $result['create_at'] ?></td>
                      <td><?php echo $result['update_at'] ?></td>
                      <td>
                        <a href="newsedit.php?news_idd=<?php echo $result['news_idd']?>" >sửa</a> 
                        <a href="newsdelete.php?news_idd=<?php echo $result['news_idd']?>" >xoá</a>
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