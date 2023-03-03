<?php

require "../../config/loadConfig.php";
$mysqli = require DB_CONNECT;
$sql = "SELECT * FROM user WHERE id = {$_SESSION["user_id"]}";
$result = $mysqli->query($sql);
$user = $result->fetch_assoc();

if (empty($_POST["name"])) {
    die("Name is required.");
}

if ( ! filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
    die("Email is incorrect. Correct format: username@example.com");
}
if (! empty($_POST["password"]))
{if (strlen($_POST["password"]) < 12) {
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
}
else {
    $password_hash = $user["password_hash"];
}

$mysqli = require DB_CONNECT;

$sql = "UPDATE user SET name = (?), email = (?), password_hash = (?) WHERE id = {$user['id']}";
                
$stmt = $mysqli->stmt_init();
if (! $stmt->prepare($sql)) {
    die("SQL error: ". $mysqli->error);
}
$stmt->bind_param("sss", $_POST["name"], $_POST["email"], $password_hash);

if ($stmt->execute()) {  
    $_SESSION["user_id"] = $user["id"];
    header("Location:". $gotoProfile);
    exit;
} else {
    if ($mysqli->errno === 1062) {
        die($_POST["email"]." already exists.");
    }
    die("Execution error: ". $mysqli->error . "Code: ". $mysqli->errno);
}
