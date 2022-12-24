<div class="carousel-item">
    <img src="<?php echo $imgSlideshow?>" class="carousel-slide-img d-block w-100" alt="Slide image">
    <div class="carousel-caption d-none d-md-block">
        <h5><?php echo ucwords($_SESSION['carousel-item']) ?> slide label</h5>
        <p>Some representative placeholder content for the <?php echo $_SESSION['carousel-item'] ?> slide.</p>
        <a href="<?php echo $gotoProduct ?>" class="carousel-gotostore">Go to store</a>
    </div>
</div>