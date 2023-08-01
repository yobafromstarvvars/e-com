<?php

$user = require __DIR__."/getUserById.php";

if ($user["is_admin"] == True) {
    return True;
} else {
    header("Location: /index.php");
    exit;
} 