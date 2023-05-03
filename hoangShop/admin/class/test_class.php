<?php 
    include "../database.php";
?>

<?php 
class tintuc {
  private $db;

  public function __construct(){
      $this->db = new Database();
  }

  public function show_tintuc(){
    $query ="SELECT * FROM tbl_news ORDER BY news_idd DESC";
    $result = $this ->db->select($query);
    return $result;
  }
  public function insert_tintuc(){
    $title_news = $_POST['title_news'];
    $noidung = $_POST['noidung'];
    $tomtat_noidung = $_POST['tomtat_noidung'];
    $news_img = $_FILES['news_img']['name'];
    move_uploaded_file($_FILES['news_img']['tmp_name'],"uploadsnews/".$_FILES['news_img']['name']);
    $query ="INSERT INTO tbl_news (
      title_news,
      noidung,
      tomtat_noidung,
      news_img
      ) 
      VALUES ('$title_news', 
      '$noidung',
      '$tomtat_noidung',
      '$news_img'
      )";
      $result = $this->db->insert($query);
  }

  public function get_tintuc($news_idd){
    $query ="SELECT * FROM tbl_news WHERE news_idd = '$news_idd'";
    $result = $this ->db->select($query);
    return $result;
  }

  public function update_tintuc($news_idd){
    $title_news = $_POST['title_news'];
    $noidung = $_POST['noidung'];
    $tomtat_noidung = $_POST['tomtat_noidung'];
    $news_img = $_FILES['news_img']['name'];
    move_uploaded_file($_FILES['news_img']['tmp_name'],"uploadsnews/".$_FILES
    ['news_img']['name']);  
    $query ="UPDATE tbl_news SET
      title_news ='$title_news', 
      noidung = '$noidung',
      tomtat_noidung ='$tomtat_noidung',
      news_img ='$news_img'
       WHERE  news_idd = '$_GET[news_idd]'" ;
    
     $result = $this->db->update($query);
    // header('location:newslist.php');
    return $result;
  }

  public function delete_tintuc($news_idd){
    $query = "DELETE FROM tbl_news WHERE news_idd = '$news_idd'";
    $result = $this ->db->delete($query);
    // header('location:newslist.php');
    return $result;
}
}
?>