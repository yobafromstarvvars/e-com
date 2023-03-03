<?php

$conn = require DB_CONNECT;
 // Products
 $sql = "SELECT * FROM category";
 $categories = mysqli_query($conn, $sql);
?>

<div class="cat-categories">
    <?php while ($category = mysqli_fetch_assoc($categories)): ?>
        <a href="#<?=strtolower($category["name"])?>" class="cat-categories-category">
            <?= ucwords($category["name"]) ?>
        </a>
    <?php endwhile; ?> 
</div>
<hr>
<?php
$sql = "SELECT * FROM category";
$categories = mysqli_query($conn, $sql);
while ($category = mysqli_fetch_assoc($categories)): ?>
    
    <section id="<?=strtolower($category["name"])?>" class="cat-category-section"> 
    <div class="cat-category-heading" style="background-image: url('<?=ROOTURL.$category["image_link"]?>');">
        <a href="" class="cat-category-heading-title">
            <?=ucfirst($category["name"])?>
        </a>
    </div>
    <div class="cat-category-content">
        <?php
        $sql = "SELECT * FROM subcategory WHERE id_category = {$category["id"]}";
        $subcategories = mysqli_query($conn, $sql);
        // Fill the category with subcategories
            while ($subcategory = mysqli_fetch_assoc($subcategories)): ?>
                <div id="<?=$subcategory["id"]?>" style="background-image: url('<?=ROOTURL.$subcategory["image_link"]?>');" class="cat-category-subcategory">
                    <a href="<?=$gotoCatSubcat."?id=".$subcategory["id"]?>" class="cat-category-subcategory-title"><?=ucfirst($subcategory["name"])?></a>
                </div>
            <?php endwhile; ?>
        
        
    </div>
</section>



<?php endwhile; ?>

    
    
