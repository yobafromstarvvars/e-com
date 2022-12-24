<?php 
// load all js scripts. Order is set in links.php
    function loadJS($linkstoJS) {
        foreach ($linkstoJS as $link) {
            echo $link;
        }
    }
        
?>