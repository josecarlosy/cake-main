<?php



session_start();

$picked_item = array("product_name"=>$_POST['product_name'], "price"=>  $_POST['price'], "code"=>$_POST['code'] );

if(isset($_SESSION['cart'])) {
  $session_cart_items=$_SESSION['cart'];
  //adding new product to existing session array cart
  array_push($_SESSION['cart'],$picked_item);

  //$_SESSION['cart'] = [$_SESSION['cart'],$age];
  echo "session exists adding array correctly";
}
else {
  $_SESSION['cart'] = array();
  array_push($_SESSION['cart'],$picked_item);
  echo "fresh session initialization";
}


print_r($_SESSION['cart']);

// session_unset()



?>




  





