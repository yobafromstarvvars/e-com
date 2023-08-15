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
            <h3 name="products_sum" value="<?= $products_count ?>">Items: <?= $products_count ?></h3>
            <button class="btn" <?php $products_count == 0 ? print("disabled") : Null ?>>
                Checkout
            </button>
        </form>
        <form class="form-regular" action="<?= ROOTURL . 'clearCart.php' ?>" method="post">
            <h3 class="cart-total"> $
                <?= $products_sum; //₽?>
            </h3>
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
                    <li id="<?= $product["id"] ?>">
                        <div class="form-regular">
                            <h4><a href="<?php echo $gotoProduct ?>?id=<?=$product["id"]?>"><?= $product["title"] ?></a></h4>
                            <div class="d-flex align-items-center">
                                <span class="product-price">
                                    <?= $product["price"] ?>
                                </span>
                                &nbsp;
                                &nbsp;
                                X
                                &nbsp;
                                &nbsp;
                                <input class="product-quantity" style="width:5rem;" class="product_amount" name="<?= $cart_item . "_amount" ?>"
                                    type="number" maxlength="2" placeholder="1" min="1"
                                    max="<?= $products_available = $product["in_stock"] ?>" value=1 required>
                                <span class="fs-4 me-3">:</span>
                                <span class="product-price product-price-sum"><?= $product["price"] ?></span>
                                <!-- Max value is 99 or less, depending on the available stock -->
                            </div>

                            <button name="remove_product_id" value="<?= $cart_item ?>">Remove</button>
                        </div>
                    </li>

                <?php endforeach; ?>
            </ol>
        </section>
    <?php else: ?>
        <h5>No products</h5>
    <?php endif; ?>


</div>