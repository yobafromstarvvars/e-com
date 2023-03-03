<?php

$hostname = "localhost";
$username = "root";
$password = "";
$database = "music_house";

$mysqli = new mysqli($hostname, $username, $password, $database);

if ($mysqli->connect_errno) {
    die("Connection error: ". $mysqli->connect_error);
}

return $mysqli;