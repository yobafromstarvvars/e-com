<?php

// connect to db
$conn = require DB_CONNECT;
$products_count = (isset($_SESSION["cart_items"])) ? count($_SESSION["cart_items"]) : 0;
$products_sum = (isset($_SESSION["cart_sum"])) ? $_SESSION["cart_sum"] : 0;

?>


<div class="cart-main">
    <section>
        
    <h1>Cart</h1>
    <!-- Clear cart --> <!-- Checkout -->
    <form class="form-regular" action="checkout.php" method="post">
    <h3 name="products_sum" value="<?= $products_count ?>">Items: <?= $products_count ?></h4>
    <button>Checkout</button>
    
</form>
<form class="form-regular" action="<?= ROOTURL.'/clearCart.php'?>" method="post">
    <h3> ₽<?= $products_sum; ?></h3>
    <button>Clear cart</button>
</form>


    <hr>

</section>
<?php if (isset($_SESSION["cart_items"])): ?>
    <section class="cart-list">
        <ol>
<?php foreach ($_SESSION["cart_items"] as $cart_item): ?>
    <?php 
$sql = "SELECT * FROM product WHERE id = {$cart_item}";
$products = mysqli_query($conn, $sql);
$product = mysqli_fetch_assoc($products);

    ?>
            <li>
                <form class="form-regular" action="<?= $addRemoveToCart ?>" method="post">
                <h4><a href="<?php echo $gotoProduct ?>"><?= $product["name"] ?></a></h4>
                <div style="display:flex; align-items:center;">
                    <span class="product-price"><?=$product["price"]?></span>
                    <input id="product_price" name="product_price" value="<?=$product["price"]?>" type="hidden">
                    &nbsp;
                    &nbsp;
                    X
                    &nbsp;
                    &nbsp;
                    <input style="width:5rem;" 
                    class="product_amount" 
                    name="<?= $cart_item."_amount"?>" 
                    type="number" 
                    maxlength="2" 
                    placeholder="1" 
                    min="1" max="<?= $products_available = ($product["amount"] < 100) ? $product["amount"] : 99?>"
                    value=1
                    required>
                    <!-- Max value is 99 or less, depending on the available stock -->
                </div>
                
                <button id="remove_product_id" name="remove_product_id" value="<?= $cart_item ?>">Remove</button>
            </form>
            </li>

<?php endforeach; ?>
</ol>  
    </section>
<?php else: ?>
    <h5>No products</h5>
<?php endif; ?>

 
</div>