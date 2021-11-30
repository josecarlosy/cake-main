

<?php
require_once('userClass.php'); 
$userObj = new USER(); 
session_start();
$type = $_GET['type'];
 
if(empty($type) || !isset($type)) {
 
  echo 'Request type is not set';
 
} else if($type == 'signup') {
 
   $data =  USER::addNewUser($_REQUEST);
   $_SESSION = $data;
   if($data['status'] == 'error') {
     header("location:register.php");
   } else {
     header("location:index5.php");
   }
} else if($type == 'login') {
   $username = addslashes($_REQUEST['username']);
   $password = addslashes($_REQUEST['password']);
   $_SESSION =  USER::login($username, $password);
   $username= $_SESSION['username'];
   if($_SESSION['status'] == 'error') {
     header("location:register.php");
   } else {
     header("location:index.php");
   }
} else if($type == 'logout') {
	unset($_SESSION);
	session_destroy();
	header("location:logout.php");
   }
	
   ?>