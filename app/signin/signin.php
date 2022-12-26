<?php 
    require "../../config/loadConfig.php";
    require HEAD;
?>
    <body>
        <?php
            // Fixed position settings are in _searchbar.scss
            echo '<div class="fixed-at-top">';
                require SEARCHBAR;       
                require FILTERSROW;
            echo '</div>';

            require SIDEPANEL;

            echo '<div id="main">';
                require SIGNIN1;
                //require FOOTER;         
            echo '</div>';

            // load all js scripts. Order is set in links.php
            loadJS($linkstoJS);
        ?>
    </body>
</html>
