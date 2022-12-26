<?php 
    require "../../config/loadConfig.php";
    require HEAD;
?>
    <body>
        <?php
            echo '<div id="main">';
                require ADMIN_MAIN;       
            echo '</div>';

            // load all js scripts. Order is set in links.php
            loadJS($linkstoJS);
        ?>
    </body>
</html>
