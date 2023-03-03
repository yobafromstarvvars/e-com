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
                ?>
                
                <form class="form-regular form-center" action="delete_profile.php" method="post">
                    <h1>Delete account</h1>
                    <h5>Are you sure you want to delete your account and all history of your orders?</h5>
                    <p><small>This cannot be reversed</small></p>
                    <button>Confirm deletion</button>
                    <a href="<?= $gotoProfile ?>">Cancel</a>
                </form> 
                
                
                
                <?php       
            echo '</div>';

            // load all js scripts. Order is set in links.php
            loadLinks($linkstoJS);
        ?>
    </body>
</html>
