<?php
require "../../config/loadConfig.php";
$mysqli = require DB_CONNECT;


//update is_active
$sql = "UPDATE user SET is_active = ? WHERE id = {$_SESSION['user_id']}";
                
$stmt = $mysqli->stmt_init();
if (! $stmt->prepare($sql)) {
    die("SQL error: ". $mysqli->error);
}
$is_active = False;
if (! $stmt->bind_param("i", $is_active)){
    die("Execution error: ". $mysqli->error . "Code: ". $mysqli->errno);
}

if ($stmt->execute()) {  
    //logout
    header("Location:". $logout);
    exit;
} else {
    die("Execution error: ". $mysqli->error . "Code: ". $mysqli->errno);
}



?>

