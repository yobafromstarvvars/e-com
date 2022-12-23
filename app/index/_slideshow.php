<!-- Slideshow container -->
<div class="slideshow-container">

  <?php 
    $slideCount = 5;
    for($i=0; $i < $slideCount; $i++){
      include SLIDE;
    }
  ?>

  <!-- Next and previous buttons -->
  <a class="prev" onclick="plusSlide(-1)">&#10094;</a>
  <a class="next" onclick="plusSlide(1)">&#10095;</a>

  <!-- The dots/circles -->
  <div class="slideshow-dot-container">
  <?php
    for($i=0; $i < $slideCount; $i++){
      echo '<span class="slideshow-dot material-icons" onmouseover="bulletHover(this)" onmouseout="bulletOut(this)" onclick="currentSlide('. $i+1 .')">circle</span>';
    }
  ?>
  </div> 
</div>
<br>