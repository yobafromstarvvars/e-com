<?php 
    require "../../config/loadConfig.php";
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
                require PRODUCTINFO;
                //require FOOTER;         
            echo '</div>';

            // load all js scripts. Order is set in links.php
            loadLinks($linkstoJS);
            echo "<script defer src='".ROOTURL."assets/js/product_page.js'></script>";
        ?>
    </body>
</html>
