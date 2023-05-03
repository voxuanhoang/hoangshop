<?php
    include "../header.php";
    include "../slider.php";
    include "../class/account_class.php"
?> 
<?php
$account = new account;
$show_account = $account->show_account();
?>
<?php 
  // session_start();
  // if(!isset($_SESSION[$result['user_name']])){
  //   header('location:..\public\login_user.php');
  // }
?>
<div class="cartegory-list-product">
        <div class="list-product">
        <h2>Danh sách tài khoản</h2>
        <table>
            <tr>
              <th>Stt</th>
              <th>Id</th>
              <th>Username</th>
              <th>trạng thái</th>
              <th>Ngày lập</th>
              <th>Tuỳ biến</th>
            </tr>
            <?php 
            if($show_account){$i=0;
                while($result = $show_account->fetch_assoc()){ $i++;
                    ?>
                    
                    <tr>
                      <td><?php echo $i ?></td>
                      <td><?php echo $result['id_user'] ?></td>
                      <td><?php echo $result['user_name'] ?></td>
                      <td><?php echo $result['status'] == 1 ? "kích hoạt" : "Block" ?></td>
                      <td><?php echo $result['create_time']?></td>
                      <td><a href="" >sửa</a> 
                      <a href="accountdelete.php?id_user=<?php echo $result['id_user']?>" >xoá</a></td>
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