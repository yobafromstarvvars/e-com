<div class="carousel-item">
    <img src="<?php echo $imgSlideshow?>" class="carousel-slide-img d-block w-100" alt="Slide image">
    <div class="carousel-caption d-none d-md-block">
        <h5><?php echo ucwords($_SESSION['carousel-item']) ?> slide label</h5>
        <p>Some representative placeholder content for the <?php echo $_SESSION['carousel-item'] ?> slide.</p>
        <a href="<?php echo $gotoProduct ?>" class="carousel-gotostore">Go to store</a>
    </div>
</div>

<!-- first active slide -->
<div class="carousel-item active">
            <img src="<?php echo $imgSlideshow?>" class="carousel-slide-img d-block w-100" alt="...">
            <div class="carousel-caption d-none d-md-block">
                <h5>First slide label</h5>
                <p>Some representative placeholder content for the first slide.</p>
                <a href="<?php echo $gotoProduct ?>" class="carousel-gotostore">Go to store</a>
            </div>
        </div>
        <!-- other slides -->
        <?php 
            $_SESSION['classActive'] = 'active';
            $cars = array("first", "second", "third", "fourth", 'fifth', 'sixth', 'seventh', 'eighth');
            for($i=0; $i < $slideCount; $i++){
                $_SESSION['carousel-item'] = $cars[$i+1];
                include CAROUSELTEMP;
                $_SESSION['classActive'] = '';
            }
        ?>