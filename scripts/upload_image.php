<?php

/* 
Upload a file from a temporary storage to a
permanent one in the project 'assets/img' folder.
'Prefix' is inserted in the file name.
*/
function uploadImage($files, $prefix='', $dir="uploads") {
    // Import database
    require_once ROOTPATH ."/scripts/db.php";
    if (!isset($db)) $db = new db(dbname:DATABASE);
    if ($files["filename"]["name"]) {
        $name = $files['filename']['name'];
        switch($files['filename']['type'])
        {
            case 'image/jpeg': $ext = 'jpg'; break;
            case 'image/png': $ext = 'png'; break;
            default: $ext = ''; break;
        }
        // If extension is one of the above
        if ($ext)
        {
            // Copy file to project folder
            $newname = $prefix . "-". date("Y-m-d-h-i-s").".".$ext;
            // Check if directory where the file will be saved exists
            $dir = file_exists($dir) ? $dir : "uploads";
            // Path to the project 'img' folder
            $newpath = realpath(ROOTPATH . "assets/img/".$dir).DIRECTORY_SEPARATOR;
            // Image link that will be saved in the db
            $image_path_db = "/assets/img/".$dir."/".$newname;
            if (move_uploaded_file($files['filename']['tmp_name'], $newpath.$newname)) {
                return $image_path_db;
            }
            else {
                move_uploaded_file($files['filename']['tmp_name'], $newpath.$newname);
                return "/assets/img/brand/brand-placeholder.png";
            }
        }
    } else {
        return Null;
    }
}
// header('Location: ' . $_SERVER['HTTP_REFERER']);
// exit;