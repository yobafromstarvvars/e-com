<?php
//1 instruments 
//2 guitars <- subcategory
//3 guitar1 guitar2 
$conn = require DB_CONNECT;
 // get current subcategory id from url
 $url = $_SERVER['REQUEST_URI'];
 $url_components = parse_url($url);
 parse_str($url_components['query'], $params);
 $subcategory_id = htmlspecialchars($params["id"]);
 // subcategories
 $sql = "SELECT * FROM subcategory WHERE id = {$subcategory_id}";
 $result = mysqli_query($conn, $sql);
 $subcategory = mysqli_fetch_assoc($result);

 // History bar
$_SESSION["current_page_name"] = "catalog";
if (! isset($_SESSION["history"][$subcategory["name"]])) {
    $_SESSION["history"][$subcategory["name"]] = $_SERVER['REQUEST_URI'];
}
require PATH;
?>

<section class="cat-subcat-section"> 

    <div class="cat-subcat-heading" style="background-image: url('<?=ROOTURL.$subcategory["image_link"]?>');">
        <a style="pointer-events:none" href="<?php echo $gotoSubcat ?>" class="cat-subcat-heading-title">
            <?=ucfirst($subcategory["name"])?>
        </a>
    </div>

    <div class="products">
        <section class="product-section">
            <?php
                $sql = "SELECT * FROM product WHERE id_subcategory = {$subcategory_id}";
                $result = mysqli_query($conn, $sql);
                while ($product = mysqli_fetch_assoc($result)) {
                    $sql = "SELECT * FROM subcategory WHERE id = {$product["id_subcategory"]}";
                    $subcategories = mysqli_query($conn, $sql);
                    $product_subcategory = mysqli_fetch_assoc($subcategories);
                    include PRODUCTS;
                }
            ?>
        </section>
    </div>
</section>
