<?php
$conn = require DB_CONNECT;
 // get current product id from url
 $url = $_SERVER['REQUEST_URI'];
 $url_components = parse_url($url);
 parse_str($url_components['query'], $params);
 // subcategories
 $product_id = htmlspecialchars($params["id"]);
 $sql = "SELECT * FROM product WHERE id = {$product_id}";
 $result = mysqli_query($conn, $sql);
 $product = mysqli_fetch_assoc($result);

 $sql = "SELECT * FROM brand WHERE id = {$product["id_brand"]}";
 $result = mysqli_query($conn, $sql);
 $brand = mysqli_fetch_assoc($result);

?>

<div class="product-main">
    <section class="product-info">
        <form action="<?= $addRemoveToCart ?>" method="post">
            <div class="product-text-info">
                <?php require PATH; ?>
                <h1 class="product-info-title"><?=ucwords($brand["name"])." ".$product["name"]?></h2>
                <!-- Star rating -->
                <span class="product-star-rating"> 
                    <?php for ($i=0; $i < 5; $i++): ?>
                        <?php if ($product["rating"] - $i > 1): ?>
                            <span class="star material-icons">star</span>
                        <?php elseif ($product["rating"] - $i > 0): ?>
                            <span class="star-half material-icons">star_half</span>
                        <?php else: ?>
                            <span class="no-star material-icons">star_outline</span>
                        <?php endif; ?>
                    <?php endfor; ?>
                </span>
                <br>
                <!-- Product price -->
                <span style="font-size:1.8rem" class="product-price"><?=$product["price"]?></span>
                <input id="product_price" name="product_price" value="<?=$product["price"]?>" type="hidden">
                <br>
                <!-- Product cart buttons -->
                <?php // Product is already is cart ?>
                    <?php if (isset($_SESSION["cart_items"]) and in_array($product["id"], $_SESSION["cart_items"])): ?>
                        <button id="removeFromCart" name="remove_product_id" type="submit" value="<?= $product["id"] ?>" class="btn btn-danger add-to-cart-btn">
                            Remove from cart
                        </button>
                        
                    <?php else: // If product is not added yet ?>
                        <button  id="addToCart" name="add_product_id" type="submit" value="<?= $product["id"] ?>" class="btn btn-warning add-to-cart-btn">
                            Add to cart
                        </button>
                    <?php endif; ?>
                <!-- Product description -->
                <p class="product-info-description">
                    <?=$product["description"]?>
                </p>
            </div>
            </form>
            <div style="background-image: url('<?=ROOTURL.$product["image_link"]?>');" class="product-gallery"></div>
    </section>
</div>