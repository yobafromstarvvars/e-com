<?php

session_start();

$_SESSION["cart_items"] = array();
$_SESSION["cart_sum"] = 0;

header('Location: ' . $_SERVER['HTTP_REFERER']);
exit;

