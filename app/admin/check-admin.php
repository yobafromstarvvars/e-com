<?php

if (isset($_SESSION['user_id'])) {
$mysqli = require DB_CONNECT;
$sql = "SELECT is_admin FROM user WHERE id = {$_SESSION['user_id']}";
$result = mysqli_query($mysqli, $sql);
$is_admin = mysqli_fetch_assoc($result);

if (! $is_admin["is_admin"]) {
    header("Location: ". $gotoHome);
    exit;
}
} else {
    header("Location: ". $gotoHome);
    exit;
}