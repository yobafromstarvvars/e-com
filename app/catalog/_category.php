<section id="instruments" class="cat-category-section"> 
    <div class="cat-category-heading">
        <a href="<?php echo $gotoCatCat;?>" class="cat-category-heading-title">Instruments</a>
    </div>
    <div class="cat-category-content">
        <?php
        // Fill the category with subcategories
            for ($i = 0; $i < 10; $i++){
                echo '<div class="cat-category-subcategory">';
                echo '<a href="'.$gotoCatSubcat.'" class="cat-category-subcategory-title">Guitars</a>';
                echo '</div>';
            }
        ?>
        <div class="cat-category-subcategory">
            <a href="<?php echo $gotoCatSubcategory;?>" class="cat-category-subcategory-title">GuitarsGuitarsGuitars</a>
        </div>
    </div>
</section>