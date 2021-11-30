<?php
// connect to the database
$server="localhost";
$username="padminuser";
$password="phpadminpass";
$database_name="main-cake";
$errors = array();
$con = mysqli_connect($server, $username, $password, $database_name);
if($con){
    if (isset($_POST['registerNewUser'])) {
        // receive all input values from the register.php form
        $username = mysqli_real_escape_string($con, $_POST['username']);
        $email = mysqli_real_escape_string($con, $_POST['email']);
        $password = mysqli_real_escape_string($con, $_POST['password']);
        $confirm_password = mysqli_real_escape_string($con, $_POST['confirm_password']);
        // by using array_push() corresponding errors in $errors() which is an array of errors.
        if (empty($username)) {
        array_push($errors, "Username is required");
        }
        if (empty($email)) {
        array_push($errors, "Email is required");
        }
        if (empty($password)) {
            array_push($errors, "Password is required");
            }
        if ($password != $confirm_password) {
            array_push($errors, "Failed to Match");
        }
            //fistly check in database that a user does not already exist with the same username and/or email.
        $get_all = "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";
        $result = mysqli_query($con, $get_all);
        $user = mysqli_fetch_assoc($result);

        if ($user) { // if user exists
        if ($user['username'] === $username) {
            array_push($errors, "Username is already existed");
        }

        if ($user['email'] === $email) {
            array_push($errors, "email is already existed");
        }
        }

        // Finally, register user if no error
        if (count($errors) == 0) {
            $pwd = md5($password);//encrypt the password before inserting in the database

            $register = "INSERT INTO table_by_clients (username, email, password,confirmPassword)
                    VALUES('$username', '$email', '$pwd',$pwd)";
            mysqli_query($con, $register);
            header('Location: login.php');
        }
    }
}
?>