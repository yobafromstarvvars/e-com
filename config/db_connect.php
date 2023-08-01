<?php

session_start();
$hostname = "localhost";
$username = "root";
$password = "";
$database = DATABASE;

$mysqli = new mysqli($hostname, $username, $password, $database);

if ($mysqli->connect_errno) {
    die("Connection error: ". $mysqli->connect_error);
}

return $mysqli;