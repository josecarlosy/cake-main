<?php
// if the user is already logged in then redirect user to welcome page





// Start the session

session_start();
//get username and password

// $Email_Address = $_REQUEST['email'];
// $password =  $_REQUEST['password'];
        
  
  $connect = mysqli_connect("localhost", "padminuser", "phpadminpass", "main-cake");  
  
 if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  } 

  if(isset($_POST['submit']))
  {
    $emailAddress = $_POST['email'];
    $password = $_POST['password'];
   $useremail = "SELECT emailAddress, userPassword FROM table_by_clients WHERE emailAddress='$emailAddress'";
   $result = $connect->query($useremail);



   
if($result)
{
  
  header("Location: shop.php");
  exit();
  
}
else
{
	echo $result;

//    $_SESSION['userid']=mysqli_fetch_all($user,MYSQLI_ASSOC);
// if ($result->num_rows > 0) {
//     // output data of each row
//     while($row = $result->fetch_assoc()) {
//       echo "password:" . $row["userPassword"]. "email:" . $row["emailAddress"].  "<br>";




      
}

    //redirect to shop page
  } else {
      //redirect to sign up page
    echo "0 results";

    
  }

    
    $connect->close();

    

 ?> 


<!-- 
// if the user is already logged in then redirect user to welcome page


if (isset($_SESSION["userid"]) && $_SESSION["userid"] === true) {

    header("location: userlogin.php");

    exit;

}
?>
 -->
