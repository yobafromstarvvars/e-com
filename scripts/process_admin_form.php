<?php

session_start();

require_once "../config/loadConfig.php";
// Import database
require_once ROOTPATH . "scripts/db.php";
$db = new db(dbname:DATABASE);

// Access denied if attributes are not specified
// if (empty($_POST['action']) or empty($_POST['table'])) {
//     header("Location: " . $gotoAdmin);
// }

switch ($_POST['action']) {
    case 'delete':
        // Get image path and delete that image
        $sql = "SELECT image_link FROM {$_POST['table']} WHERE id={$_POST['id']}";
        $result = $db->query($sql)->fetchArray();
        // Don't delete the placeholder
        if ($result['image_link'] != "/assets/img/brand/brand-placeholder.png") {
            $image_path = realpath(ROOTPATH . $result['image_link']);
            unlink($image_path);
        }
        // Delete the record from the database
        $sql = "DELETE FROM {$_POST['table']} WHERE id={$_POST['id']}";
        $db->query($sql);
        break;
    case 'create':
        // Save the image in the project folder, add the image link to POST
        include ROOTPATH . "scripts/upload_image.php";
        $image_link = uploadImage($_FILES, $_POST['table'], $_POST['table']);
        
        if ($image_link) {
            $_POST['image_link'] = $image_link;
        }
        // First part of the query
        $table = "INSERT INTO {$_POST['table']}";
        // Enclose all values in quotes
        foreach ($_POST as $attr => $value) {
            $_POST[$attr] = '"' . $value . '"';
        }
        // Remove unrelated to the db table attributes
        unset($_POST['table'], $_POST['action']);
        // Create string out of POST array that represent column names
        $fields = "(" . implode(", ", array_keys($_POST)) . ")";
        $values = "VALUES (" . implode(", ", array_values($_POST)) . ")";
        $sql = $table . " " . $fields . " " . $values;
        var_dump($sql);
        $db->query($sql);
        
        break;
    case 'update':
        print_r($_POST);
        
        $id = $_POST['id'];
        $table = "UPDATE {$_POST['table']}";
        // Save the image in the project folder, add the image link to POST
        include ROOTPATH . "scripts/upload_image.php";
        $image_link = uploadImage($_FILES, $_POST['table'], $_POST['id']);
        if ($image_link) {
            $_POST['image_link'] = $image_link;
        }
        // Remove unrelated to the db table attributes
        unset($_POST['table'], $_POST['action'], $_POST['id']);
        // Enclose all values in quotes
        foreach ($_POST as $attr => $value) {
            $_POST[$attr] = '"' . $value . '"';   
        }
        
        // Create SET from POST values
        $set = "SET ";
        foreach ($_POST as $attr => $value) {
            $set .= $attr . " = " . $value . ", "; 
            // Set 'received date' if status is changed to 'Received'
            if ($attr == 'status' && trim($value, '"') == 'received') {
                $set .= "received_date" . " = " . '"' . date("Y-m-d H:i:s") . '"' . ", "; 
            }
        }
        // Delete the last comma and whitespace
        $set = rtrim($set, ", ");
        $where = "WHERE id = {$id}";
        // Bundle together the sql query
        $sql = $table . " " . $set . " " . $where;
        print_r($sql);
        $db->query($sql);
        
        break;
    default:
        break;
}
header("Location: " . $gotoAdmin);
exit;
// include_once __DIR__ . "/upload_image.php";