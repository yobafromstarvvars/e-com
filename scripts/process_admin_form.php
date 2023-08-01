<?php

session_start();

require_once "../config/loadConfig.php";
// Import database
require_once ROOTPATH."/scripts/db.php";
$db = new db(dbname:DATABASE);

// Access denied if attributes are not specified
// if (empty($_POST['action']) or empty($_POST['table'])) {
//     header("Location: " . $gotoAdmin);
// }

switch ($_POST['action']) {
    case 'delete':
        $sql = "DELETE FROM {$_POST['table']} WHERE id={$_POST['id']}";
        $db->query($sql);
        header("Location: " . $gotoAdmin);
        break;
    case 'create':
        $table = "INSERT INTO {$_POST['table']}";
        // Enclose all values in quotes
        foreach ($_POST as $attr => $value) {
            $_POST[$attr] = '"' . $value . '"';
        }
        // Save the image in the project folder, add the image link to POST
        include ROOTPATH . "scripts/upload_image.php";
        $image_link = uploadImage(trim($_POST['table'], '"'), $_FILES);
        if ($image_link) {
            $_POST['image_link'] = '"' . $image_link . '"';
        }
        // Remove unrelated to the db table attributes
        unset($_POST['table'], $_POST['action']);
        // Create string out of POST array that represent column names
        $fields = "(" . implode(", ", array_keys($_POST)) . ")";
        $values = "VALUES (" . implode(", ", array_values($_POST)) . ")";
        $sql = $table . " " . $fields . " " . $values;
        $db->query($sql);
        header("Location: " . $gotoAdmin);
        break;
    case 'update':
        print_r($_POST);
        
        $id = $_POST['id'];
        $table = "UPDATE {$_POST['table']}";
        // Save the image in the project folder, add the image link to POST
        include ROOTPATH . "scripts/upload_image.php";
        $image_link = uploadImage(trim($_POST['table'], '"'), $_FILES);
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
        header("Location: " . $gotoAdmin);
        break;
    default:
        header("Location: " . $gotoAdmin);
        break;
}
exit;
// include_once __DIR__ . "/upload_image.php";