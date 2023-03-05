<?php
ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);
    require "../../config/loadConfig.php";
?>
    <body>
        <?php
        die("Success");
            // Fixed position settings are in _searchbar.scss
            echo '<div class="fixed-at-top">';
                require SEARCHBAR;       
                require FILTERSROW;
            echo '</div>';

            require SIDEPANEL;

            echo '<div id="main">';
                require CARTMAIN;
                //require FOOTER;         
            echo '</div>';

            // load all js scripts. Order is set in links.php
            loadLinks($linkstoJS);
            
        ?>
        <script type="text/javascript">  
        function getProductAmount(){  
            var number=document.getElementByClass("product_amount").value; 
            
        }  
</script>  
    </body>
</html>
