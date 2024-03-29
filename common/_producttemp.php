<article class="product-container">
    <a href="<?php echo $gotoProduct."?id=".$product["id"]?>" class="cover">
        <div class="background-cover">
            <div class="cover-image2" 
            style="<?= "background-image: url('".ROOTURL.$product["image_link"]."');"?>"></div>
        </div>
        <!--<img class="cover-image" src="https://i.annihil.us/u/prod/marvel/i/mg/9/10/61ae1ea282d48/portrait_uncanny.jpg"/> -->
    </a>
    <div class="product-bottom-section">
          
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
        
        <!-- Product details -->
        <a href="<?php echo $gotoProduct."?id=".$product["id"]?>" class="product-title"><?= $product["title"] ?></a>  
        <span class="product-price"><?=$product["price"]?></span>
        <input class="product_price" name="product_price" value="<?=$product["price"]?>" type="hidden">
        <div class="goto-product-category-div">
            <a href="<?php echo $gotoSubcat."?id=".$product_subcategory["id"] ?>" class="goto-product-category-btn"><?=  ucfirst($product_subcategory["name"]) ?></a>
            
            <?php // Product is already is cart ?>
                <?php if (isset($_SESSION["cart_items"]) and in_array($product["id"], $_SESSION["cart_items"])): ?>
                    <button  name="remove_product_id" type="button" value="<?= $product["id"] ?>" class="remove-from-cart-btn">
                        <span class="material-icons">done</span>
                    </button>
                    
                <?php else: // If product is not added yet ?>
                    <button  name="add_product_id" type="button" value="<?= $product["id"] ?>" class="add-to-cart-btn">
                        <span class="material-icons">add</span>
                    </button>
                <?php endif; ?>
            
        <div>
    </div>
</article>
