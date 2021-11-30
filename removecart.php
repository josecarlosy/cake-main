<?php
    
    session_start();
    $item_id=$_GET['id'];
    $user_id=$_SESSION['item'];
  
    header('location: shopping.php');
?>