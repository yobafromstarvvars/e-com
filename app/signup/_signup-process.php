<?php

require "../../config/loadConfig.php";

if (empty($_POST["name"])) {
    die("Name is required.");
}

if ( ! filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
    die("Email is incorrect. Correct format: username@example.com");
}

if (strlen($_POST["password"]) < 12) {
    die("Password must be at least 12 characters");
}

if ( ! preg_match("/[a-z]/i", $_POST["password"])) {
    die("Password must contain at least one letter");
}

if ( ! preg_match("/[0-9]/", $_POST["password"])) {
    die("Password must contain at least one number");}

if ($_POST["password"] !== $_POST["password_repeat"]) {
    die("Passwords must match");
}

$password_hash = password_hash($_POST["password"], PASSWORD_DEFAULT);

$mysqli = require DB_CONNECT;

$sql = "INSERT INTO user (name, email, password_hash) VALUES (?,?,?)";

$stmt = $mysqli->stmt_init();

if (! $stmt->prepare($sql)) {
    die("SQL error: ". $mysqli->error);
}
$name = ucwords(strtolower($_POST["name"]));
$email = strtolower($_POST["email"]);
if ($stmt->bind_param("sss", 
                            $name, 
                            $email, 
                            $password_hash));


if ($stmt->execute()) {
    session_regenerate_id();

    $sql = sprintf("SELECT * FROM user WHERE email = '%s'", 
                        $mysqli->real_escape_string(strtolower($_POST["email"])));
        $result = $mysqli->query($sql);
        $user = $result->fetch_assoc();
        
    $_SESSION["user_id"] = $user["id"];
    header("Location:". $gotoHome);
    exit;
} else {
    if ($mysqli->errno === 1062) {
        die($_POST["email"]." already exists.");
    }
    die("Execution error: ". $mysqli->error . "Code: ". $mysqli->errno);
}
