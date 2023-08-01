<?php

/* 
Upload a file from a temporary storage to a
permanent one in the project 'assets/img' folder.
'Prefix' is inserted in the file name.
*/
function uploadImage($prefix='', $files) {
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
            $newname = $prefix . "-" . date("Y-m-d-h-i-s").".".$ext;
            // Path to the project 'img' folder
            $newpath = realpath(ROOTPATH."/assets/img/uploads").DIRECTORY_SEPARATOR;
            // Image link that will be saved in the db
            $image_path_db = "/assets/img/uploads/".$newname;
            if (move_uploaded_file($files['filename']['tmp_name'], $newpath.$newname)) {
                return $image_path_db;
                // if ($db->query->errno) {
                //     unlink($newpath.$newname);
                // }
            }
            else {
                echo $newpath.$newname;
                echo "returning uploaded image";
            }
        }
    } else {
        return Null;
    }
}
// header('Location: ' . $_SERVER['HTTP_REFERER']);
// exit;