<?php 
    require "./config/loadConfig.php";
    require HEAD;
?>
    <body>
        <?php
            require SIDEPANEL;

            // Fixed position settings are in _searchbar.scss
            echo '<div class="fixed-at-top">';
                require SEARCHBAR;       
                require FILTERSROW;
            echo '</div>';

            require CAROUSEL;
            echo '<div id="main">';
                require HOMECONTENT;    
                require FOOTER;         
            echo '</div>';

            // load all js scripts. Order is set in links.php
            loadJS($linkstoJS);
        ?>
    </body>
</html>

