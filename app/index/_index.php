<div class="products">
  <!-- First row -->
  <section class="product-section">
    <?php
      for($i=0; $i < 5; $i++){
        include PRODUCTS;
      }
    ?>
  </section>

  <!-- New releases section -->
  <section class="product-section product-separated-section">
    <h2 class="separated-section-title">
      <a href="<?php echo $gotoNewReleases ?>" class="separated-section-title">New Releases</a>
      <a href="<?php echo $gotoNewReleases ?>" class="separated-section-expandbtn">SEE ALL</a>
    </h2>
    <?php
      for($i=0; $i < 5; $i++){
        include PRODUCTS;
      }
    ?>
  </section>

  <!-- The rest of the products -->
  <section class="product-section">
    <?php
      for($i=0; $i < 1; $i++){
        include PRODUCTS;
      }
    ?>
  </section>
</div>