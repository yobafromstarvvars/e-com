<?php

require "../../config/loadConfig.php";

$mysqli = require DB_CONNECT;

if (empty($_POST["name"])) {
  die("Name is required.");
}
$category_name = strtolower($_POST["name"]);

// Uploadimage
if ($_FILES["filename"]["name"]) {
  $name = $_FILES['filename']['name'];
  switch($_FILES['filename']['type'])
  {
      case 'image/jpeg': $ext = 'jpg'; break;
      case 'image/png': $ext = 'png'; break;
      default: $ext = ''; break;
  }
  if ($ext)
  {
      // Get next record id
      /*
      $mysqli = require DB_CONNECT;
      $sql = "SELECT id FROM category ORDER BY id DESC LIMIT 1";
      $result = mysqli_query($mysqli, $sql);
      // Add 1 to the received id OR if no records in the table, set next id to 1
      $current_id = mysqli_fetch_assoc($result);
      $next_id = ($current_id) ? $current_id["id"] : "1";
      */
      // Copy file to project folder
      $newname = $category_name."-".date("Y-m-d-h-i-s").".".$ext;
      $newpath = realpath(ROOTPATH."/assets/img/category").DIRECTORY_SEPARATOR;
      $image_path_db = "/assets/img/category/".$newname;
      if (move_uploaded_file($_FILES['filename']['tmp_name'], $newpath.$newname)) {
          // Upload to database
          $sql = "UPDATE category SET name=?, image_link=? WHERE id = {$_POST['id']}";
          $stmt = $mysqli->stmt_init();
          if (! $stmt->prepare($sql)) {
              die("SQL error: ". $mysqli->error);
          }
          $stmt->bind_param("ss", $category_name, $image_path_db);
          if (! $stmt->execute()) die("Upload error: ".$mysqli->error);
          $is_success_upload = True;
          header("Location: ".$gotoAdminCategory);
      }
  }
  die("Wrong image format");
} else {
  $sql = "UPDATE category SET name=? WHERE id = {$_POST['id']}";       
  $stmt = $mysqli->stmt_init();
  if (! $stmt->prepare($sql)) {
      die("SQL error: ". $mysqli->error);
  }
  $stmt->bind_param("s", $category_name);
  if (! $stmt->execute()) die("Upload error: ".$mysqli->error);
  header("Location: ".$gotoAdminCategory);
}