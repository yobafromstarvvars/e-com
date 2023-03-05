<?php

$conn = require DB_CONNECT;
// get current category id from url
$url = $_SERVER['REQUEST_URI'];
$url_components = parse_url($url);
parse_str($url_components['query'], $params);
$category_id = htmlspecialchars($params["id"]);
 // Category
 $sql = "SELECT * FROM category WHERE id = {$category_id}";
 $result = mysqli_query($conn, $sql);
 $category = mysqli_fetch_assoc($result);

// History bar
$_SESSION["current_page_name"] = "catalog";
if (! isset($_SESSION["history"][$category["name"]])) {
    $_SESSION["history"][$category["name"]] = $_SERVER['REQUEST_URI'];
}
require PATH;

?>

<!-- Category -->
<section class="cat-category-section"> 

    <!-- Page header (category) -->
    <div class="cat-category-heading" style="background-image: url('<?=ROOTURL.$category["image_link"]?>');">

        <a style="pointer-events: none" href="<?php echo $gotoCategory ?>" class="cat-category-heading-title">
            <?=ucfirst($category["name"])?>
        </a>
    </div>

    <!-- Subcategories of the header -->
    <div class="cat-category-content">
        <?php
        $sql = "SELECT * FROM subcategory WHERE id_category = {$category["id"]}";
        $subcategories = mysqli_query($conn, $sql);
        // Fill the category with subcategories
            while ($subcategory = mysqli_fetch_assoc($subcategories)): ?>
                <div id="<?=$subcategory["id"]?>" style="background-image: url('<?=ROOTURL.$subcategory["image_link"]?>');" class="cat-category-subcategory">
                    <a href="<?=$gotoSubcat."?id=".$subcategory["id"]?>" class="cat-category-subcategory-title"><?=ucfirst($subcategory["name"])?></a>
                </div>
            <?php endwhile; ?>
        
        
    </div>
</section>





    
    
