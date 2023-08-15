<?php 

session_start();
require_once "../../config/loadConfig.php";
$mysqli = require_once ROOTPATH . "config/db_connect.php";


if ( ! preg_match("/^(?:4[0-9]{12}(?:[0-9]{3})?|5[1-5][0-9]{14})$/", $_POST["card_number"])) {
    die("Incorrect card number format");
}

if ( ! preg_match("/[a-z]+\s[a-z]+/i", $_POST["card_holder"])) {
    die("Incorrect card holder name format: should contain two words in English");
}

if ($_POST["valid_thru"] < date('m-d-Y')) {
    die("The card has expired.");
}

if ( ! preg_match("/[0-9]{3}/", $_POST["CVV"])) {
    die("Incorret CVV format");
}

$sql = "INSERT INTO orders (id_user, status) VALUES (?, ?)";
$stmt = $mysqli->stmt_init();
if (! $stmt->prepare($sql)) {
    die("SQL error: ". $mysqli->error);
}
if ($stmt->bind_param("ss", $_SESSION["user_id"], "paid"));
if ($stmt->execute()) {
    foreach($_SESSION["cart_items"] as $cart_item) {
        $conn = require DB_CONNECT;
        // Products
        $sql = "SELECT id FROM orders ORDER BY id DESC LIMIT 1";
        $result = mysqli_query($conn, $sql);
        $last_order_id = mysqli_fetch_assoc($result);

        $sql = "INSERT INTO orders_item (id_product, id_order, quantity, price) VALUES (?, ?, ?, ?)";
        $stmt = $mysqli->stmt_init();
        if (! $stmt->prepare($sql)) {
            die("SQL error: ". $mysqli->error);
        }
        $quantity = 1;
        if ($stmt->bind_param("ssdd", $cart_item, $last_order_id, $quantity, $_SESSION["cart_sum"]));
        if ($stmt->execute()) {
            
        } else {
            die("Execution error: ". $mysqli->error . "Code: ". $mysqli->errno);
        }
    }
} else {
    die("Execution error: ". $mysqli->error . "Code: ". $mysqli->errno);
}

header("Location: ".$gotoProfile);