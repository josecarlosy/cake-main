

<?php
session_start();
foreach($_SESSION['cart'] as $proid => $proq) {

?>
<div class="row">



<section class="product spad">
        <div class="container">
            <div class="row">
            <?php
        if(!empty($_SESSION["prodcartucartcts"]))  
                          {  
                               $total = 0;  
                               foreach($_SESSION["cart"] as $keys => $values)  
                               {
                                   
                               
                                
                                
                                
    ?> 




<div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="product__item">
                        <div class="product__item__pic set-bg" data-setbg="<?php echo $values["image"]; ?>">
                            <div class="product__label">
                                <span>Cupcake</span>
                            </div>
                        </div>
                        <div class="product__item__text">
                            <h6><a href=""><?php echo $values["product_name"]; ?></a></h6>
                            <div class="product__item__price"><?php echo $values["price"]; ?></div>
                            <div class="product__item__code"><?php echo $values["code"]; ?></div>
                            <div class="product__item__id"><?php echo $values["id"]; ?></div>
                            <div class="product__item__image"><?php echo $values["image"]; ?></div>


                            <div class="cart_add">

                               <form name="cart" id="cart" action="cart.php" method="POST">
                               <input type="hidden" name="product_name" value=<?php echo $values["product_name"]; ?> />
                               <input type="hidden" name="price" value=<?php echo $values["price"]; ?> />
                               <input type="hidden" name="code" value=<?php echo $values["code"]; ?> />
                            


                                
                               </form>
                               




                            
                            </div>
                        </div>
                    </div>
                </div>
        <?php
                               }
                            }
        ?>


</div>
        </div>
    </section>


    <!-- <h4>Shopping Cart</h4> -->
            <?php

            foreach($_SESSION[''] as $proid => $proq) {

                // $proid is product id and $proq is quantity
                // use $proid to select the product detail from database
            }
                }
            ?>
</div>
    <!--Below is my cart.php page-->
   


