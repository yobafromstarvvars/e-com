<?php 

require "../../config/loadConfig.php";
ob_start();


$mysqli = require DB_CONNECT;
$sql = "DELETE FROM {$_POST['table']} WHERE id = {$_POST['id']}";
$stmt = $mysqli->stmt_init();

$stmt = $mysqli->stmt_init();

if (! $stmt->prepare($sql)) {
    die("SQL error: ". $mysqli->error);
}

if ($stmt->execute()) {
    header('Location: ' . $_SERVER['HTTP_REFERER']);
exit;
} else {
    die("Execution error: ". $mysqli->error . "Code: ". $mysqli->errno);
}
?>