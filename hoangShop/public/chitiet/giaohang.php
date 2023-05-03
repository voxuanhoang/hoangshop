
<?php 
    include "header.php";
    include "..\..\admin\database.php";
    Include "..\..\admin\connect.php";
    include "..\class\cart.php";
?>
<?php 
   include "..\class\class.php";
?>
<?php 
   $err=[];
   if(isset($_POST['dangnhap']))
   {$pass_word =$_POST['pass_word'];
   $user_name = $_POST['user_name'];
   $checkuser1= $account1->checkuser1($user_name,$pass_word);
   $user= mysqli_query($con, "SELECT *FROM tbl_user ORDER BY id_user desc ");
   if($checkuser1){
     while($result = $checkuser1->fetch_assoc()){
       
     if($user_name == $result['user_name']  && $pass_word == $result['pass_word'] && $result['status'] == 1)
     { 
      
      header('location:..\admin');
     }elseif($user_name == $result['user_name']  && $pass_word == $result['pass_word']){
      
      $name_user = mysqli_fetch_assoc($user);
      $_SESSION['user_name'] = $user_name;
      header('location:giaohang.php');
     }else{
         $err['pass_word'] = "Tài khoản hoặc mật khẩu không đúng";
     }
   }
 }
 }
?>
<?php 

$err1 =[];
if(isset($_POST['dangky']))
  {$pass_word =$_POST['pass_word'];
  $user_name = $_POST['user_name'];
  $rpass_word = $_POST['rpass_word'];
  $checkuser= $account->checkuser($user_name);
  
  if($checkuser){
      while($result = $checkuser->fetch_assoc()){
          if($user_name == $result['user_name']){
              $err1['user_name'] = "ten dang nhap da ton tai";
          }
      }
  }
if($pass_word != $rpass_word )
{
    $err1['rpass_word'] = "chua  nhap mat khau dung";

}
  
if(empty($err1)){
    $insert_account = $account1->insert_account($user_name,$pass_word);
}}
  

?>
<div class="navbar">
      <div class="item">
         <div class="item-has">
               <a href="../sanpham.php" class="item-list" name="cartegory_id" ><i class="fa-solid fa-mobile-screen-button"></i> SẢN PHẨM</a>
               <div class="item-noti">
                  <ul class="item-noti-0">
                    <?php
                      
                           while($result = $show_cartegory->fetch_assoc()){
                           ?>
                  <li class="item-noti-1" name="cartegory_id" > 
                        <a href="../sanpham_id.php?cartegory_id=<?php echo $result['cartegory_id'] ?>" class="item-noti-2"><?php echo $result['cartegory_name'] ?><a>
                     </li>
                     <?php     
                           
                      }
                      ?>
                  </ul>
               </div>
            </div>
            <div class="item-has">
            <a href="#" class="item-list"><i class="fa-solid fa-gift"></i> KHUYẾN MÃI</a>
         </div>
         <div class="item-has">
            <a href="#" class="item-list"><i class="fa-solid fa-phone"></i> LIÊN HỆ</a>
         </div>
         <div class="item-has">
            <a href="../news.php" class="item-list"><i class="fa-solid fa-newspaper"></i> TIN TỨC</a>
         </div>
          
            <div>
            <a href="../login_user.php" class="item-list"><i class="fa-solid fa-right-to-bracket"></i> ĐĂNG NHẬP</a>
         </div>
         <div>
            <a href="../create_account.php" class="item-list"><i class="fa-solid fa-user-plus"></i> ĐĂNG KÝ</a>
         </div>
      </div>
</div>
<div class="giaohang">
        <div class="delivery-top">
           <div class="delivery-top-1">
               <div class="delivery-top-login">
                  <p>Bạn đã có tài khoản?<label for="toggle"> Ấn vào đây để đăng nhập</label></p><input type="checkbox" id="toggle">
                      <div class="delivery-top-login-1">
                          <p>Nếu trước đây bạn đã mua hàng của chúng tôi, vui lòng ghi đầy đủ thông tin trong các hộp dưới đây.</p>
                          <form class="username" method="POST">
                            <div class="delivery-form-login">
                                  <strong>Tên đăng nhập hoặc email *</strong><br>
                                  <input type="text" name="user_name">
                                  <strong>Mật khẩu *</strong><br>
                                  <input type="password" name="pass_word">
                                
                            </div>
                            <div class="delivery-form-button">
                                <button name="dangnhap">ĐĂNG NHẬP</button><br>
                                <a href="">Quên mật khẩu?</a>
                            </div>
                          </form>
                      </div>
               </div>
               
               <div class="delivery-top-register">
                    <p>Bạn chưa có tài khoản?<label for="toggle2"> Ấn vào đây để tạo tài khoản mới</label></p><input type="checkbox" id="toggle2">
                    <div class="delivery-top-register-1">
                        <p>Nếu bạn là khách hàng mới, vui lòng ghi đầy đủ thông tin trong các hộp dưới đây.</p>
                        <form class="username-register" action="" method="POST">
                            <div class="delivery-form-register1">
                                
                                  <strong>Tên đăng nhập hoặc email *</strong><br>
                                  <input type="text" name="user_name">
                                  <div class="error">
                                        <span><?php echo (isset($err1['user_name']))?$err1['user_name']: '' ?></span>
                                  </div>
                            </div>
                            <div class="delivery-form-register2">
                                    <strong>Mật khẩu *</strong><br>
                                    <input type="password" name="pass_word"><br>
                                    <strong>Nhập lại mật khẩu *</strong><br>
                                    <input type="password" name="rpass_word">
                                    <div class="error">
                                          <span><?php echo (isset($err1['rpass_word']))?$err1['rpass_word']: '' ?></span>
                                    </div>
                            </div>
                            <div class="delivery-form-button">
                                <button name="dangky">ĐĂNG KÝ</button><br>
                            </div>
                        </form>
                        
                    </div>
               </div>
           </div>
           <?php 
                          if(isset($_POST['dangky'])){
                            
                            echo "bạn đã đăng ký thành công";
                         }
                        ?>
        </div>
        <div class="delivery">
            <div class="container">
                <div class="delivery-form">
                  <h2>THÔNG TIN THANH TOÁN</h2>
                       <form method="POST" action="">
                        <div class="delivery-form-name">
                                <div class="firstname">
                                  <strong>Họ và tên *</strong>
                                  <input type="text" name="user_name" required>
                                </div>
                        </div>
                        
                        <div class="address">
                            <strong>Địa chỉ *</strong>
                            <input type="text" name="address_user">
                        </div>
                        <div class="phonenumber-email">
                            <div class="phone-number">
                              <strong>Số điện thoại *</strong>
                              <input type="text" name="phone">
                            </div>
                            <div class="email">
                              <strong>Địa chỉ email *</strong>
                              <input type="email" name="email">
                            </div>
                        </div>
                        <div class="message">
                            <strong>Ghi chú</strong>
                            <div class="message1">
                            <textarea rows="7" placeholder="Ghi chú về đơn hàng, ví dụ: Thời gian hay chỉ dẫn địa điểm giao hàng chi tiết hơn." name="ghichu"></textarea>
                            </div>
                        </div>
                        <!-- <div class="delivery-button-bottom">
                            <input type="submit" name="order" value="ĐẶT HÀNG">
                        </div> -->
                      
                    </div> 
   
                    <div class="delivery-accept">
                        <table>
                    
                          <tr>
                              <th colspan="2">ĐƠN HÀNG CỦA BẠN</th>
                          </tr>
                          <tr>
                                <td><p>SẢN PHẨM</p></td>
                                <td>TỔNG CỘNG</td>
                          </tr>
                          <tr>
                                <td>Phí ship</td>
                                <td><?php echo number_format($free) ?></input></td>
                          </tr>
                          <tr>
                                <td>Tổng cộng</td>
                                <td><input type="hidden" name="total1" value="<?php echo number_format($total) ?>" /><?php echo number_format($total) ?></td>
                          </tr>
                          
               
                        </table>
                        <div class="delivery-button">
                          <input type="radio" name="thanhtoan" value="Chuyển khoản ngân hàng">
                          <label >Chuyển khoản ngân hàng</label><br>
                          <input type="radio" name="thanhtoan" value="Thanh toán khi nhận hàng" >
                          <label >Thanh toán khi nhận hàng</label><br>
                        </div>
                        
                        <?php
                    if(empty($_SESSION['user_name'])){
                        ?>
                        <div>
                        <strong>Bạn chưa đăng nhập</strong>
                        <p>Vui lòng đăng nhập để đặt hàng</p>
                        <!-- <a href="editpass.php">doi mat khau</a> -->
                      </div>
                      <?php 
                     }else{ 
                        ?><div class="delivery-button-bottom">
                                <button name="order">ĐẶT HÀNG</button>
                       
                            </div>
                        <?php
                     }
                      ?> 
                    </form>  
                    </div>
                <!-- </form> -->
        </div>
    
</div>

<?php 
    include "footer.php";
?>