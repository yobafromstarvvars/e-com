<?php

require "../../config/loadConfig.php";

$mysqli = require DB_CONNECT;

if (empty($_POST["name"])) {
  die("Name is required.");
}

$type_name = strtolower($_POST["name"]);
$sql = "UPDATE type SET name=?, id_subcategory=? WHERE id = {$_POST['id']}";       
  $stmt = $mysqli->stmt_init();
  if (! $stmt->prepare($sql)) {
      die("SQL error: ". $mysqli->error);
  }
  $stmt->bind_param("si", $type_name, $_POST["id_subcategory"]);
  if (! $stmt->execute()) die("Upload error: ".$mysqli->error);
  header("Location: ".$gotoAdmin);
  exit;

