<?php
if(!empty($_SESSION["cart"])) {
$cart_count = count(array_keys($_SESSION["cart"]));
?>
<div class="cart_div">
<a href="shopping.php"><img src="img/cartimg.jpg" width="20" height="20"><span>
<?php echo $cart_count; ?></span></a>
</div>
<?php
}
?>