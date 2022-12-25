<section class="cat-ss-section"> 

    <div class="cat-ss-heading">
        <a href="#" class="cat-ss-heading-title">Electric Guitars</a>
    </div>
    <?php include SUBFILTERS; ?>
    <div class="cat-ss-content">
        <?php
        // Fill the category with subcategories
            for ($i = 0; $i < 18; $i++){
                echo '<a href="'.$gotoCatSSS.'" class="cat-ss-cats">';
                echo '<img class="cat-ss-cats-img" src="'.$electro_guitar_subcat.'" alt="Electric Guitar subcategory - st models">';
                echo 'ST Models';
                echo '</a>';
            }
        ?>
    </div>
</section>