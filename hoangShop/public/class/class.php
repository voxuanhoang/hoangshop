<?php 
    // include "..\admin\database.php"

?>
<?php 
$account = new account;
if($_SERVER['REQUEST_METHOD'] === 'POST'){
  $user_name = $_POST['user_name'];
  $pass_word = $_POST['pass_word'];
  
}
$checkuser = $account->checkuser();
class account {
  private $db;

  public function __construct(){
      $this->db = new Database();
  }

  public function checkuser(){
    $query =" SELECT *FROM tbl_user ORDER BY id_user ASC";
    $result = $this->db->insert($query);
    return $result;
  }

}
$account1 = new account1;
class account1 {
  private $db;

  public function __construct(){
      $this->db = new Database();
  }
  public function checkuser1(){
    $query =" SELECT *FROM tbl_user ORDER BY id_user ASC ";
    $result = $this->db->insert($query);
    return $result;
  }
  public function insert_account($user_name,$pass_word){
    $query =" INSERT INTO tbl_user (user_name,pass_word) VALUES ('$user_name','$pass_word')";
    $result = $this->db->insert($query);
    return $result;
}
}