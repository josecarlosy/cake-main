<?php
    session_start();
    require 'dbcontroller.php';
    if(!isset($_SESSION['email'])){
        header('location:index.php');
    }  
    $old_password= md5(md5(mysqli_real_escape_string($con,$_POST['oldPassword'])));
    $new_password= md5(md5(mysqli_real_escape_string($con,$_POST['newPassword'])));
    $email=$_SESSION['email'];
    //echo $email;
    $password_from_database_query="select password from users where email='$email'";
    $password_from_database_result=mysqli_query($con,$password_from_database_query) or die(mysqli_error($con));
    $row=mysqli_fetch_array($password_from_database_result);
    //echo $row['password'];
    if($row['password']==$old_password){
        $update_password_query="update users set password='$new_password' where email='$email'";
        $update_password_result=mysqli_query($con,$update_password_query) or die(mysqli_error($con));
        echo "Your password has been updated.";
        ?>
        <meta http-equiv="refresh" content="3;url=products.php" />
        <?php
    }else{
        ?>
        <script>
            window.alert("Wrong password!!");
        </script>
        <meta http-equiv="refresh" content="1;url=settings.php" />
        <?php
        //header('location:settings.php');
    }
?>





<?php
session_start();

$picked_item = array("product_name"=>$_POST['name'], "email"=>  $_POST['email'], "password"=>$_POST['password'], "contact"=>  $_POST['contact'],"area"=>  $_POST['area'],"adress"=>  $_POST['adress'],  );
$_SESSION['cart'] = array();

array_push($_SESSION['cart'],$picked_item);
?>
<?php echo $item["picked_item"]; ?>