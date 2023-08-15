<?php

?>

<!-- Carousel -->
<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
    <!-- bottom nav buttons -->
    <div class="carousel-indicators">
        <!-- first active button -->
        <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="carousel-nav-button active" aria-current="true" aria-label="Slide 1"></button>
        <!-- other buttons -->
        <?php
            $slideCount = 5; //subtraction because there is one element before the loop
            for($i=1; $i < $slideCount; $i++){
                echo '<button 
                            class="carousel-nav-button" 
                            type="button" 
                            data-bs-target="#carouselExampleCaptions" 
                            data-bs-slide-to="'. $i .'" 
                            aria-label="Slide '. $i+1 .'"></button>';
            }
        ?>
    </div>
    <!-- slides -->
    <div class="carousel-inner">
        <?php 
            
            $is_active_slide = 'active';
            // Get 'hero' records
            $conn = require DB_CONNECT;
            $sql = "SELECT * FROM hero LIMIT $slideCount";
            $products = mysqli_query($conn, $sql);

            while ($slide = mysqli_fetch_assoc($products)) {
                echo
                "
                <div class='carousel-item {$is_active_slide}'>
                    <img src='".ROOTURL.$slide['image_link']."' class='carousel-slide-img d-block w-100' alt='Slide image'>
                    <div class='carousel-caption d-none d-md-block'>
                ";
                // If a banner doesn't have text, don't show it
                if ($slide['title']) echo "<h5>".ucwords($slide['title'])."</h5>";
                if ($slide['description']) echo "<p>{$slide['description']}</p>";
                if ($slide['id_product']) echo "<a href='{$gotoProduct}?id={$slide['id_product']}' class='carousel-gotostore'>Go to store</a>";       
                echo 
                "
                    </div>
                </div>
                ";
                $is_active_slide = '';
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