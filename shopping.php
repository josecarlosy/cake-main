<div class="topnav">
  <a class="active" href="index.php">Home</a>
  <a href="about.php">About</a>
  <a href="shop.php">Shop</a>
  <a href="contact.php">Contact</a>
</div> 
<style>
/* Add a black background color to the top navigation */
.topnav {
  background-color:   #df820d  ;
  overflow: hidden;
}

/* Style the links inside the navigation bar */
.topnav a {
  float: left;
  color:  # #f3ede5  ;
  text-align: center;
  padding: 16px 18px;
  text-decoration: none;
  font-size: 22px;
}

/* Change the color of links on hover */
.topnav a:hover {
  background-color: #ddd;
  color: white;
}

/* Add a color to the active/current link */
.topnav a.active {
  background-color: #0a0a0a ;
  color: white;
}
</style>
<?php
session_start();

if(isset($_SESSION['cart'])){
    //check if product exists in the cart


    $product=array_search($_POST['code'],array_column($_SESSION['cart'],'code'));
   
  
    if($product) {
        //increment product quantity if it exists
       
        $new_product=array_merge($_SESSION['cart'][$product],array('quantity' => $_SESSION['cart'][$product]['quantity']+1));
        $_SESSION['cart'][$product]=$new_product;
      
    }
    elseif($product===0){
        //increment the index 0 product
        $new_product=array_merge($_SESSION['cart'][$product],array('quantity' => $_SESSION['cart'][$product]['quantity']+1));
      
        $_SESSION['cart'][$product]=$new_product;
        
    }
    else{

        //New Item picked
     $picked_item = array("product_name"=>$_POST['product_name'], "price"=>  $_POST['price'], "code"=>$_POST['code'], "image"=>  $_POST['image'], "quantity"=>1 );
                
                  
     //adding new product to existing session array cart
     array_push($_SESSION['cart'],$picked_item);
    }
    
}
else{
    //first cart product
    $picked_item = array("product_name"=>$_POST['product_name'], "price"=>  $_POST['price'], "code"=>$_POST['code'], "image"=>  $_POST['image'], "quantity"=>1 );
    $_SESSION['cart'] = array();
    array_push($_SESSION['cart'],$picked_item);

}



//session_unset()

// print_r($_SESSION['cart']);
?>
<HTML>
<HEAD>


<style>
body {
	font-family: Arial;
	color: #211a1a;
	font-size: 0.9em;
}

#shopping-cart {
	margin: 40px;
}

#product-grid {
	margin: 40px;
}

#shopping-cart table {
	width: 100%;
	background-color: #F0F0F0;
}

#shopping-cart table td {
	background-color: #FFFFFF;
}

.txt-heading {
	color: #211a1a;
	border-bottom: 1px solid #E0E0E0;
	overflow: auto;
}

#btnEmpty {
	background-color: #ffffff;
	border: #d00000 1px solid;
	padding: 5px 10px;
	color: #d00000;
	float: right;
	text-decoration: none;
	border-radius: 3px;
	margin: 10px 0px;
}

.btnAddAction {
    padding: 5px 10px;
    margin-left: 5px;
    background-color: #efefef;
    border: #E0E0E0 1px solid;
    color: #211a1a;
    float: right;
    text-decoration: none;
    border-radius: 3px;
    cursor: pointer;
}

#product-grid .txt-heading {
	margin-bottom: 18px;
}

.product-item {
	float: left;
	background: #ffffff;
	margin: 30px 30px 0px 0px;
	border: #E0E0E0 1px solid;
}

.product-image {
	height: 155px;
	width: 250px;
	background-color: #FFF;
}

.clear-float {
	clear: both;
}

.demo-input-box {
	border-radius: 2px;
	border: #CCC 1px solid;
	padding: 2px 1px;
}

.tbl-cart {
	font-size: 0.9em;
}

.tbl-cart th {
	font-weight: normal;
}

.product-title {
	margin-bottom: 20px;
}

.product-price {
	float:left;
}

.cart-action {
	float: right;
}

.product-quantity {
    padding: 5px 10px;
    border-radius: 3px;
    border: #E0E0E0 1px solid;
}

.product-tile-footer {
    padding: 15px 15px 0px 15px;
    overflow: auto;
}

.cart-item-image {
	width: 30px;
    height: 30px;
    border-radius: 50%;
    border: #E0E0E0 1px solid;
    padding: 5px;
    vertical-align: middle;
    margin-right: 15px;
}
.no-records {
	text-align: center;
	clear: both;
	margin: 38px 0px;
}

</style>


<?php
if(isset($_SESSION["cart"])){
    $total_quantity = 0;
    $total_price = 0;
?>	
<table class="tbl-cart" cellpadding="10" cellspacing="1">
<tbody>
<tr>
<th style="text-align:left;">product_name</th>
<th style="text-align:right;" width="5%">Quantity</th>
<th style="text-align:right;" width="10%">code</th>
<th style="text-align:right;" width="10%">Price</th>
<th style="text-align:right;" width="10%">Sub Total</th>
<th style="text-align:center;" width="5%">Remove</th>
</tr>	
<?php		
    foreach ($_SESSION["cart"] as $item){
        $item_price = $item["quantity"]*$item["price"];
		?>
				<tr>
				<td><img src="<?php echo $item["image"]; ?>" class="cart-item-image" /><?php echo $item["product_name"]; ?></td>
				
				<td style="text-align:right;"><?php echo $item["quantity"]; ?></td>
                <td><?php echo $item["code"]; ?></td>
				<td  style="text-align:right;"><?php echo "Ksh ".$item["price"]; ?></td>
				<td  style="text-align:right;"><?php echo "Ksh ". number_format($item_price,2); ?></td>
				
				<td style="text-align:center;"><a href="cart_remove.php?action=remove&code=<?php echo $item["code"]; ?>" class="btnRemoveAction"><img src="icon-delete.png" alt="Remove Item" /></a></td>

				
				</tr>
				<?php
				$total_quantity += $item["quantity"];
				$total_price += ($item["price"]*$item["quantity"]);
				
		}
		?>

<tr>
<td colspan="2" align="right">Total:</td>
<td align="right"><?php echo $total_quantity; ?></td>
<td align="right" colspan="2"><strong><?php echo "Ksh ".number_format($total_price, 2); ?></strong></td>
<td></td>
</tr>

</tbody>

</table>		
  <?php
} else {
?>
<div class="no-records">Your Cart is Empty</div>
<?php 
}
?>

</div>
<form class="paypal" action="payments.php" method="post" id="paypal_form">
        <input type="hidden" name="cmd" value="_xclick" />
        <input type="hidden" name="txn_id" value="12345" />
        <input type="hidden" name="txn_type" value="personal" />
        <input type="hidden" name="no_note" value="1" />
        <input type="hidden" name="lc" value="UK" />
        <input type="hidden" name="bn" value="PP-BuyNowBF:btn_buynow_LG.gif:NonHostedGuest" />

        <input type="hidden" name="first_name" value="Customer's First Name" />
        <input type="hidden" name="last_name" value="Customer's Last Name" />
        
        <input type="hidden" name="item_number" value="item number" />
        <input type="hidden" name="item_name" value="item name" />
        <input type="hidden" name="createdtime" value="2021-10-11 16:25:51" />

        <input type="hidden" name="itemid" value="345" />
        <input type="hidden" name="payment_status" value="payment status" />
        <input type="hidden" name="payment_currency" value="currency" />
        <input type="hidden" name="payer_email" value="payer's email" />
        <input type="hidden" name="payment_amount" value="payment gross amount" />
    
        <input type="hidden" name="total_price" value= "<?php echo $total_price;?>"/>
        <div class="paypal">
    <input type="submit" value= "proceed to payments" name="paypal"> <img src="https://www.paypalobjects.com/webstatic/mktg/Logo/pp-logo-100px.png" border="0" alt="PayPal Logo"></input>
</div>
    </form>

</BODY>
</HTML>