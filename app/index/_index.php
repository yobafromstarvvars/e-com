<div class="products">
  <!-- First row -->
  
    <section class="product-section">
      <?php
      // connect to db
 $conn = require DB_CONNECT;
 // Products
 $sql = "SELECT * FROM product LIMIT 30";
 $products = mysqli_query($conn, $sql);

 // How many products
 $products_count = mysqli_num_rows($products);
 while ($product = mysqli_fetch_assoc($products)){
   // Subcategory
 $sql = "SELECT * FROM subcategory WHERE id = {$product["id_subcategory"]}";
 $subcategories = mysqli_query($conn, $sql);
 $product_subcategory = mysqli_fetch_assoc($subcategories)["name"];
  include PRODUCTS;
 }
        

      ?>
    </section>
</div>