<?php

require_once "../config/dbConfig.php";
require_once "../config/paths.php";
header('Content-Type: application/json; charset=utf-8');
// Import database
require_once ROOTPATH ."/scripts/db.php";
$db = new db(dbname:DATABASE);
$query = sprintf("SELECT * FROM user WHERE email = '%s'", $db->escapeString($_GET['email']));
$db->query($query);
$is_available = !boolval($db->numRows());

echo json_encode(["available" => $is_available]);