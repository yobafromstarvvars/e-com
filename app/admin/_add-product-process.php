<?php 
require "../../config/loadConfig.php";

$mysqli = require DB_CONNECT;


if (empty($_POST["name"])) {
  die("Name is required.");
}
$subcategory_name = strtolower($_POST["name"]);

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
      // Copy file to project folder
      $newname = $subcategory_name."-".date("Y-m-d-h-i-s").".".$ext;
      $newpath = realpath(ROOTPATH."/assets/img/catalog").DIRECTORY_SEPARATOR;
      $image_path_db = "/assets/img/catalog/".$newname;
      if (move_uploaded_file($_FILES['filename']['tmp_name'], $newpath.$newname)) {
          // Upload to database
          $sql = "INSERT INTO product (name, description, image_link, price, rating, amount, id_brand, id_type, id_subcategory) VALUES (?,?,?,?,?,?,?,?,?)";
          $stmt = $mysqli->stmt_init();
          if (! $stmt->prepare($sql)) {
              die("SQL error: ". $mysqli->error);
          }
          $stmt->bind_param("sssdddiii", $subcategory_name, $_POST["description"], $image_path_db, $_POST["price"],$_POST["rating"],$_POST["amount"],$_POST["brand_id"],$_POST["type_id"],$_POST["subcategory_id"]);
          if (! $stmt->execute()) die("Upload error: ".$mysqli->error);
          $is_success_upload = True;
          header("Location: ".$gotoAdmin);
      }
  }
  die("Wrong image format");
} else {
  $sql = "INSERT INTO product (name, description, price, rating, amount, id_brand, id_type, id_subcategory) VALUES (?,?,?,?,?,?,?,?)";       
  $stmt = $mysqli->stmt_init();
  if (! $stmt->prepare($sql)) {
      die("SQL error: ". $mysqli->error);
  }
  $stmt->bind_param("ssdddiii", $subcategory_name, $_POST["description"], $_POST["price"],$_POST["rating"],$_POST["amount"],$_POST["brand_id"],$_POST["type_id"],$_POST["subcategory_id"]);
  if (! $stmt->execute()) die("Upload error: ".$mysqli->error);
  header("Location: ".$gotoAdmin);
}