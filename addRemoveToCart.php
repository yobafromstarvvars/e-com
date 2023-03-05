<?php

session_start();


if (! isset($_SESSION["cart_items"])) $_SESSION["cart_items"] = array();
if (! isset($_SESSION["cart_sum"]))  $_SESSION["cart_sum"] = 0;

// Add to cart
if (isset($_POST["add_product_id"])) {
    $_SESSION["cart_items"][$_POST["add_product_id"]] = $_POST["add_product_id"];
    $_SESSION["cart_sum"] += $_POST["product_price"];
    // Add order to db
    /*
    if (count($_SESSION["cart_items"]) == 1){
        $sql = "INSERT INTO orders (id_user) VALUES (?)";
        $stmt = $mysqli->stmt_init();
        if (! $stmt->prepare($sql)) {
            die("SQL error: ". $mysqli->error);
        }
        if ($stmt->bind_param("s", $_SESSION["user_id"]));
        if ($stmt->execute()) {
            header("Location:". $gotoHome);
            exit;
        } else {
            die("Execution error: ". $mysqli->error . "Code: ". $mysqli->errno);
        }
    }
    */
}
// Remove from cart
else {
    unset($_SESSION["cart_items"][$_POST["remove_product_id"]]);
    $_SESSION["cart_sum"] -= $_POST["product_price"];
    // Make zero if it's a negative number
    $_SESSION["cart_sum"] = max($_SESSION["cart_sum"], 0);
    // Remove from orders db
    /*
    if (count($_SESSION["cart_items"]) == 0) {

        $stmt = $mysqli->stmt_init();
        if (! $stmt->prepare($sql)) {
            die("SQL error: ". $mysqli->error);
        }
        if ($stmt->bind_param("s", $_SESSION["user_id"]));
        if ($stmt->execute()) {
            header("Location:". $gotoHome);
            exit;
        } else {
            die("Execution error: ". $mysqli->error . "Code: ". $mysqli->errno);
        }
    }
    */
}


header('Location: ' . $_SERVER['HTTP_REFERER']);
exit;



