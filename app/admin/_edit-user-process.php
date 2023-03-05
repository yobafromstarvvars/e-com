<?php

require "../../config/loadConfig.php";

if (empty($_POST["name"])) {
    die("Name is required.");
}

if ( ! filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
    die("Email is incorrect. Correct format: username@example.com");
}

if (! empty($_POST["password"])){
if (strlen($_POST["password"]) < 12) {
    die("Password must be at least 12 characters");
}

if ( ! preg_match("/[a-z]/i", $_POST["password"])) {
    die("Password must contain at least one letter");
}

if ( ! preg_match("/[0-9]/", $_POST["password"])) {
    die("Password must contain at least one number");}
}


$password_hash = password_hash($_POST["password"], PASSWORD_DEFAULT);

$mysqli = require DB_CONNECT;

$sql = "UPDATE user SET name=?, email=?, password_hash=?, is_admin=?, is_active=? WHERE id = {$_POST['id']}";

$stmt = $mysqli->stmt_init();

if (! $stmt->prepare($sql)) {
    die("SQL error: ". $mysqli->error);
}

//$image_path = ($_POST["filename"]) ? $_POST["filename"] : "/assets/img/profiles/profile-placeholder.png";
$is_active = (int) (isset($_POST["is_active"])) ? 1 : 0;
$is_admin = (int) (isset($_POST["is_admin"])) ? 1 : 0;

//$timestamp = ($_POST["joined_date"]) ? date('Y-m-d H:i:s', strtotime($_POST["joined_date"])) : date('Y-m-d H:i:s'); 
$name = ucwords(strtolower($_POST["name"]));
$email = strtolower($_POST["email"]);
if (! $stmt->bind_param("sssii", 
                            $name, 
                            $email, 
                            $password_hash,
                            $is_admin,
                            $is_active
                            )) die($mysqli->error);
    
if ($stmt->execute()) {
    header("Location:". $gotoAdminUser);
    exit;
} else {
    if ($mysqli->errno === 1062) {
        die($_POST["email"]." already exists.");
    }
    die("Execution error: ". $mysqli->error . "Code: ". $mysqli->errno);
}
