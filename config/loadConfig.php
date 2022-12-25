<?php
// LOADS CONFIG FILES REQUIRED FOR PROPER WORK. CALLED AT THE VERY BEGINNING

    session_start();
    require __DIR__."/paths.php";
    require __DIR__."/links.php";
    require __DIR__."/loadLinks.php";
    require HEAD;
?>