<?php

session_start();

if (! isset($_SESSION["user_id"])) {
    header("Location: /index.php");
    exit;
}

// Import database
require_once ROOTPATH ."/scripts/db.php";
$db = new db(dbname:DATABASE);
$sql = "SELECT * FROM user WHERE id = {$_SESSION["user_id"]}";
$user = $db->query($sql)->fetchArray();

return $user;