<?php 
    require "../../config/loadConfig.php";
    require HEAD;
?>
    <body>
        <?php
            require SIDEPANEL;
            require SEARCHBAR;
            echo '<div id="main">';
            require LIBRARY0CONTENT;
            echo '</div>';
            // load all js scripts. Order is set in links.php
            loadJSLinks($linkstoJS);
        ?>
    </body>
</html>