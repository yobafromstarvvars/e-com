<?php 
    require "../../config/loadConfig.php";
?>
    <body>
        <?php
            echo '<div id="main">';
                require CHECK_ADMIN;
require "_admin-seeall.php";      
            echo '</div>';

            // load all js scripts. Order is set in links.php
            loadLinks($linkstoJS);
        ?>
    </body>
</html>
