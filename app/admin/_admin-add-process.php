<?php



function getFileExt($type) {
    switch($type)
    {
        case 'image/jpeg': $ext = 'jpg'; break;
        case 'image/png': $ext = 'png'; break;
        default: $ext = ''; break;
    }
    return $ext;
}

function getImgPathDB ($table, $id, $ext, $fullpath) {
    $newname = $table.$id."-".date("Y-m-d-h-i-s").".".$ext;
    $newpath = realpath(ROOTPATH."/assets/img/".$table).DIRECTORY_SEPARATOR;
    $image_path_db = "/assets/img/".$table.$newname;
    // Get full path to copy a file, image_path_db to store in a database
    if ($fullpath) return $newpath.$newname;
    else return $image_path_db;
}

// if file uploaded
    // get its extension
    // get image path db
    // if image path db
        //sql, stmt, prepare, bind_param, 
        // if (copy img is ok)
            //execute

// Uploadimage
   
  