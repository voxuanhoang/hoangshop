<?php 

?>
<div class="page">
  <?php for($num =1 ; $num<= $totalPage;$num++){
    // var_dump($current_page);exit;
  ?>
  <?php 
  if($num != $current_page){
  ?>
<a  href="?per_page=<?php echo $items_page ?>&page=<?php echo $num ?>"><?php echo $num ?></a>

<?php
 
}else{
  ?>
    <strong class="current-page"><?php echo $num?></strong>
  <?php
}
?>
<?php 
  }
?>
</div>