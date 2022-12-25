<section class="cat-ss-section"> 

    <div class="cat-ss-heading">
        <a href="#" class="cat-ss-heading-title">Electric Guitars - ST Models <less> 20 products</less></a>
    </div>
    <?php include SUBFILTERS; ?>
    <div class="products">
        <section class="product-section">
            <?php
                for($i=0; $i < 20; $i++){
                    include PRODUCTS;
                }
            ?>
        </section>
    </div>
</section>