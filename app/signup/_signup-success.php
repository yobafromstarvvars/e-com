

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
?>



            <div id="main">
                <div class="form-regular form-center form-center-align">
                <h1>Sign Up</h1>
                <p>User created successfully</p>
                </div>         
            </div>



<?php
            // load all js scripts. Order is set in links.php
            loadLinks($linkstoJS);
        ?>
    </body>
</html>
