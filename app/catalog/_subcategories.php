<section class="cat-subcat-section"> 

    <div class="cat-subcat-heading">
        <a href="<?php echo $gotoCatCat;?>" class="cat-subcat-heading-title">Guitars</a>
    </div>

    <div class="cat-subcat-content">
        <?php
        // Fill the category with subcategories
            for ($i = 0; $i < 28; $i++){
                echo '<a href="'.$gotoCatSS.'" class="cat-subcat-sub">';
                echo '<img class="cat-subcat-sub-img" src="'.$product_placeholder_img.'" alt="Guitar subcategory - electric guitars">';
                echo 'Electric Guitars';
                echo '</a>';
            }
        ?>
    </div>
</section>