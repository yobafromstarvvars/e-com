<?php
// LOADS CONFIG FILES REQUIRED FOR PROPER WORK. CALLED AT THE VERY BEGINNING
session_start();
require __DIR__."/paths.php";
require __DIR__."/links.php";
require __DIR__."/loadLinks.php";
require __DIR__."/dbConfig.php";
require HEAD;


ini_set('display_errors', 0); ini_set('display_startup_errors', 0); error_reporting(E_ALL);
?>