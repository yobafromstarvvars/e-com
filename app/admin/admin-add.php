<?php 
    require "../../config/loadConfig.php";
?>
    <body>
        <?php
            echo '<div id="main">';
                require_once CHECK_ADMIN;
                include_once "_admin-sidenav.php";
                require "_add-{$_POST['table']}.php";    
            echo '</div>';

            // load all js scripts. Order is set in links.php
            loadLinks($linkstoJS);
        ?>
    </body>
</html>
