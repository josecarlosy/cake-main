<?php
error_reporting(0);
$item_id = $_GET["id"];
session_start();
if (!empty($_SESSION["incart"])) {
    foreach ($_SESSION["incart"] as $select => $val) {
        if($val["id"] == $item_id)
        {
            unset($_SESSION["incart"][$select]);
        }
    }
}
?>
