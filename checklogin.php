<?php
session_start(); // Right at the top of your script


if($count==1)
  {
    $_SESSION['logged']=true;
    $_SESSION['username']=$username;
    header("Location: index.php");
    exit();
  }
else
  {
     $_SESSION['logged']=false;
     header("Location: login.php");
     exit();
  }
?>