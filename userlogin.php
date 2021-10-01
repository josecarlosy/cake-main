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
    $email = $_POST['email'];
    $password = $_POST['password'];
   $get_products_sql = "SELECT emailAddress, userPassword FROM table_by_clients WHERE emailAddress=$Email_Address";
   $result = $connect->query($get_products_sql);



   $result=mysqli_fetch_array($get_products_sql);
if($result)
{
echo "You are login Successfully ";
}
else
{
	echo "failed ";

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
