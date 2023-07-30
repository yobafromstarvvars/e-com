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
                require SIGNUP1;
                //require FOOTER;         
            echo '</div>';

            // load all js scripts. Order is set in links.php
            loadLinks($linkstoJS);
            // JustValidate library. It handles form validation
            echo '<script src="https://unpkg.com/just-validate@latest/dist/just-validate.production.min.js"></script>';
            echo "<script defer src='". ROOTURL . "/assets/js/signup_validation.js" ."'></script>";
        ?>
    </body>
</html>
