<!-- Carousel -->
<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
    <!-- bottom nav buttons -->
    <div class="carousel-indicators">
        <!-- first active button -->
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="carousel-nav-button active" aria-current="true" aria-label="Slide 1"></button>
        <!-- other buttons -->
        <?php
            $slideCount = 5-1; //subtraction because there is one element before the loop
            for($i=0; $i < $slideCount; $i++){
                echo '<button 
                            class="carousel-nav-button" 
                            type="button" 
                            data-bs-target="#carouselExampleCaptions" 
                            data-bs-slide-to="'. $i+1 .'" 
                            aria-label="Slide '. $i+2 .'"></button>';
            }
        ?>
    </div>
    <!-- slides -->
    <div class="carousel-inner">
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
    </div>
    <!-- buttons to switch slides -->
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
    </button>

    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
    </button>
</div>