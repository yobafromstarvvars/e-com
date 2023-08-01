<?php

header('Content-Type: application/json; charset=utf-8');
require __DIR__.'/db.php';

$db = new db($dbhost = 'localhost', $dbuser = 'root', $dbpass = '', $dbname = 'music_house', $charset = 'utf8');
$query = sprintf("SELECT * FROM user WHERE email = '%s'", $db->escapeString($_GET['email']));
$db->query($query);
$is_available = !boolval($db->numRows());

echo json_encode(["available" => $is_available]);