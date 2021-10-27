
<script>

$("a.CartRemove").on("click", function(event) {
    event.preventDefault();
    
    /*
    * The ID of the product to be removed is retrieved
    * from the link.
    */
    productId = $(this).attr("href").split("/")[3];

    /*
    * A POST request is sent
    */
    $.ajax({
        type: "POST",
        url: "/cart/delete/" + productId,
        success: function() {

            /*
            * The product is now removed and the shopping cart is reloaded
            * so that the customer can see the change.
            */
            $.ajax({
                type: "GET",
                url: "/interface/Cart",
                success: function(data) {
                    $(".CartContainer").html(data);
                }
            });
        }
    });
});
</script>