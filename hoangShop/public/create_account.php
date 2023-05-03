<?php 
    include "header.php";
    include "class\class.php"
?>

<?php 

    $err =[];
    if(isset($_POST['dangky']))
      {$pass_word =$_POST['pass_word'];
      $user_name = $_POST['user_name'];
      $rpass_word = $_POST['rpass_word'];
      $checkuser= $account->checkuser($user_name);
      
      if($checkuser){
          while($result = $checkuser->fetch_assoc()){
              if($user_name == $result['user_name']){
                  $err['user_name'] = "Tên đăng nhập đã tồn tại";
              }
          }
      }
    if($pass_word != $rpass_word )
    {
        $err['rpass_word'] = "Mật khẩu chưa trùng khớp";

    }
      
    if(empty($err)){
        $insert_account = $account1->insert_account($user_name,$pass_word);$success= [];
      if(isset($_POST['dangky'])){
         header('location:successlogin.php');
      }
    }}
      
    
?>
<?php 
      
?>

<div class="modal">
  <div class="modal_overlay">
     <div class="modal_body">
        <div class="modal_body-title">
           <h2>Đăng Ký</h2>
           <a href="login_user.php"><h3 style="color:red; cursor: pointer;">Đăng Nhập</h3></a>   
        </div>
        <div class="modal_body-form ">
            <form action="" method="POST">

            
           <div>
              <input type="text" class="dangky" name="user_name" required placeholder="Tên đăng nhập">
              <div class="error">
                    <span><?php echo (isset($err['user_name']))?$err['user_name']: '' ?></span>
              </div>
           </div>
           <div class=dangky-pass>
              <input type="password" class="dangky" id="password" name="pass_word" required placeholder="Tạo mật khẩu">
              <span onclick="showPass()"><i class="fa-solid fa-eye"></i></span>
           </div>
           <div class=dangky-pass>
              <input type="password" class="dangky" id="rpassword" name="rpass_word" required placeholder="Nhập lại mật khẩu">
              <span onclick="showPassr()"><i class="fa-solid fa-eye"></i></span>
              
           </div>
           <div class="error">
                    <span><?php echo (isset($err['rpass_word']))?$err['rpass_word']: '' ?></span>
              </div>
           <div class="modal_body-word">
              <small><b>Bằng việc đăng ký, bạn đồng ý với ShopHoang về <a href="#">Điều khoản dịch vụ</a> & <a href="#">Chính sách bảo mật</b></a></small>
           </div>
           <div class="modal_body_back">
              <a href="index.html"><input type="button" class="back-footer" value="TRỞ LẠI"></a>
              <button name="dangky">ĐĂNG KÝ</button>
              
           </div>
        </form>
        </div>
    </div>
  </div> 
 
</div>
