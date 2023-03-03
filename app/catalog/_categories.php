<?php

$conn = require DB_CONNECT;
 // Products
 $sql = "SELECT * FROM category";
 $categories = mysqli_query($conn, $sql);
?>

<div class="cat-categories">
    <?php while ($category = mysqli_fetch_assoc($categories)): ?>
        <a href="#instruments" class="cat-categories-category">
            <?= ucwords($category["name"]) ?>
        </a>
    <?php endwhile; ?> 
</div>
<hr>
<?php
$sql = "SELECT * FROM category";
$categories = mysqli_query($conn, $sql);
while ($category = mysqli_fetch_assoc($categories)): ?>
    
    <section id="instruments" class="cat-category-section"> 
    <div class="cat-category-heading">
        <a href="<?php echo $gotoCatCat;?>" class="cat-category-heading-title">Instruments</a>
    </div>
    <div class="cat-category-content">
        <?php
        $sql = "SELECT * FROM subcategory WHERE id_category = {$category["id"]}";
        $categories = mysqli_query($conn, $sql);
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



<?php endwhile; ?>

    
    
