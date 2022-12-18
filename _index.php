<div class="comics">
  <!-- First row -->
  <section class="comic-section">
    <?php
      for($i=0; $i < 5; $i++){
        include COMICS;
      }
    ?>
  </section>

  <!-- New releases section -->
  <section class="comic-section comic-separated-section">
    <h2 class="separated-section-title">
      <a href="<?php echo $gotoNewReleases ?>" class="separated-section-title">New Releases</a>
      <a href="<?php echo $gotoNewReleases ?>" class="separated-section-expandbtn">SEE ALL</a>
    </h2>
    <?php
      for($i=0; $i < 5; $i++){
        include COMICS;
      }
    ?>
  </section>

  <!-- The rest of the comics -->
  <section class="comic-section">
    <?php
      for($i=0; $i < 1; $i++){
        include COMICS;
      }
    ?>
  </section>
</div>