<?php 

  function checkPri($uri = false){
    // var_dump($uri);exit;
    $uri = $uri != false ? $uri : $_SERVER['REQUEST_URI'];
    // var_dump($uri);exit;
    $pri = array(
      "cartegory/cartegoryadd\.php$",
      "brand/brandadd\.php$"
    );
    $pri = implode("|", $pri);
    preg_match('/'. $pri. '/',$uri, $matches);
    return !empty($matches);
  }
  
?>