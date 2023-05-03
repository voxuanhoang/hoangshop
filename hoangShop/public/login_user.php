<?php 
    include "header.php";
   include "class\class.php";
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
      // echo "123";exit;
      $name_user = mysqli_fetch_assoc($user);
      $_SESSION['user_name1'] = $user_name;
      header('location:../admin/main.php');
     }elseif($user_name == $result['user_name']  && $pass_word == $result['pass_word']){
      // echo "111";exit;
      
      $name_user = mysqli_fetch_assoc($user);
      $_SESSION['user_name'] = $user_name;
      header('location:main.php');
     }else{
         $err['pass_word'] = "Tài khoản hoặc mật khẩu không đúng";
     }
   }
 }
 }
?>
<div class="modal">
   <div class="modal_overlay">
      <div class="modal_body-login">
         <div class="modal_body-title">
            <h2>Đăng Nhập</h2>
            <a href="create_account.php"><h3 style="color:red; cursor: pointer;">Đăng Ký</h3></a>
         </div>
         <div class="modal_body-form">
            <form action="" method="POST">
                  <div>
                     <input type="text" class="dangky" name="user_name" required placeholder="Tên đăng nhập">
                  </div>                  
                  <div class=dangky-pass>
                     <input type="password" class="dangky" id="password" name="pass_word"  required placeholder="Mật khẩu" >
                     <span onclick="showPass()"><i class="fa-solid fa-eye"></i></span>
                     
                  </div>
                  <div class="error">
                        <span><?php echo (isset($err['pass_word']))?$err['pass_word']: '' ?></span>
                     </div>
                  <div class="modal_body-sp">
                        <a href="#" style="color:red;padding-right:20px ;">Quên mật khẩu</a>
                        <a href="#">Cần trợ giúp?</a>
                  </div>     
                  <div class="modal_body_back">
                     <input type="button" class="back-footer back-footer-hover" value="TRỞ LẠI">
                     <button name="dangnhap">ĐĂNG NHẬP</button>
                  </div>
            </form>
         </div>
      </div>
   </div>  
</div> 
<?php 
    include "footer.php"
?>