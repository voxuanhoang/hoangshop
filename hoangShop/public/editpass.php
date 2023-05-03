<?php include "..\admin\connect.php"; ?>

<?php 
    $err= false;
    if(isset($_GET['action']) && $_GET['action'] == 'edit'){
      if(isset($_POST['id_user']) && !empty($_POST['id_user']) && isset($_POST['pass_word']) && !empty($_POST['pass_word']) && isset($_POST['new_pass']) && !empty($_POST['new_pass'])){
      
        $userResult= mysqli_query($con, "SELECT * from tbl_user where ('id_user' =".$_POST['id_user']." AND 'pass_word'=".$_POST['pass_word'].")");
        
        if($userResult->num_rows >0){

        }
      }
    }var_dump($userResult);exit;

?>
<?php 
  session_start();
  $user_name = $_SESSION['user_name'];
  if(!empty($user_name)){
    ?>
    <div>
      <h1>xin chào <?php $user_name ?>. Bạn đang thay đổi mật khẩu</h1>
      <form action="editpass.php?action=edit" method="post">
        <input type="hiden" value="<?php $user_name ?>">
        <label>nhập mật khẩu cũ</label>
        <input type="password" name="pass_word">
        <label>nhập mật khẩu mới</label>
        <input type="password" name="new_pass">
        <input type="submit" value="xác nhận">
      </form>
    </div>
    <?php
  } ?>
?>