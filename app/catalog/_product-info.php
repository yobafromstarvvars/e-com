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

  // History bar
$_SESSION["current_page_name"] = "catalog";
if (! isset($_SESSION["history"][$product["title"]])) {
    $_SESSION["history"][$product["title"]] = $_SERVER['REQUEST_URI'];
}
require PATH;
?>

<div class="product-main">
    <section class="product-info">
       
            <div class="product-text-info">
                
                <h1 class="product-info-title"><?=ucwords($brand["name"])." ".$product["title"]?></h2>
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
                <input class="product_price" name="product_price" value="<?=$product["price"]?>" type="hidden">
                <br>
                <!-- Product cart buttons -->
                <?php // Product is already is cart ?>
                    <?php if (isset($_SESSION["cart_items"]) and in_array($product["id"], $_SESSION["cart_items"])): ?>
                        <button  name="remove_product_id" type="submit" value="<?= $product["id"] ?>" class="btn btn-danger remove-from-cart-btn mt-3">
                            Remove from cart
                        </button>
                        
                    <?php else: // If product is not added yet ?>
                        <button name="add_product_id" type="submit" value="<?= $product["id"] ?>" class="btn btn-warning add-to-cart-btn mt-3">
                            Add to cart
                        </button>
                    <?php endif; ?>
                <!-- Product description -->
                <p class="product-info-description pt-4">
                    <?=$product["description"]?>
                </p>
            </div>
           
            <!-- style="background-image: url('<?=3//ROOTURL.$product["image_link"]?>');" class="me-4 img-fluid rounded rounded-4" -->
            <div class="pe-4 overflow-hidden">
                <img src="<?=ROOTURL.$product["image_link"]?>" alt="<?=$product["title"]?>"
                    class="img-fluid object-fit-contain rounded">
            </div>
            <!-- product-gallery -->
    </section>
</div>