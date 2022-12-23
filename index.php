<?php 
    session_start();
    require "./config/path.php";
    require "./config/links.php";
    require HEAD;
?>
    <body>
        <?php
            require SIDEPANEL;
            require SEARCHBAR;       
            require FILTERSROW;
            require CAROUSEL;
            echo '<div id="main">';
            require HOMECONTENT;    
            require FOOTER;         
            echo '</div>';
        ?>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
        <script src=" <?php echo $pathtoJS ?> "></script>
    </body>
</html>

