<?php

// PROCESS A CLICK ON THE HISTORY BAR
session_start();
$new_history = array();
foreach($_SESSION["history"] as $history_name => $history_url) {
    $new_history[$history_name] = $history_url;
    
    if ($history_url == $_POST["redirect_url"]) break;
}

$_SESSION["history"] = $new_history;

header("Location: ". end($_SESSION["history"]));
exit;
?>