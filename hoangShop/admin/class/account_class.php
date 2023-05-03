<?php
    include "../database.php"
?>
<?php 
class account {
  private $db;

  public function __construct(){
      $this->db = new Database();
  }

  public function insert_account($user_name,$pass_word){
    $query =" INSERT INTO tbl_user (user_name) VALUES ('$user_name','$pass_word')";
    $result = $this->db->insert($query);
    return $result;
}

public function show_account(){
    $query ="SELECT * FROM tbl_user ORDER BY id_user DESC";
    $result = $this ->db->select($query);
    return $result;
}

public function get_cartegory($cartegory_id){
    $query ="SELECT * FROM tbl_user WHERE id_user = '$id_user'";
    $result = $this ->db->select($query);
    return $result;
}

// public function update_cartegory($cartegory_name,$cartegory_id){
//     $query = "UPDATE tbl_cartegory SET cartegory_name = '$cartegory_name'
//     WHERE cartegory_id = '$cartegory_id'";
//     $result = $this ->db->update($query);
//     header('location:cartegorylist.php');
//     return $result;
// }

public function delete_account($id_user){
    $query = "DELETE FROM tbl_user WHERE id_user = '$id_user'";
    $result = $this ->db->delete($query);
    // header('location:accountlist.php');
    return $result;
}
}
?>
