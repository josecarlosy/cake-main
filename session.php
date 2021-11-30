<?php
// Start the session
session_start();

//if the user is loged on, go to we
if (isset($_SESSION["userid"]) && $_SESSION["userid"] === true) {
    header("location: welcome.php");
    exit;
}


?>