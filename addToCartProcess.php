<?php



require "connection.php";

session_start();


if (isset($_SESSION["cus"])) {

    if (isset($_GET["id"])) {



        $cus = $_SESSION["cus"];
        $pid = $_GET["id"];

        $prs = Database::search("SELECT * FROM `product` WHERE `id`='" . $pid . "'");

        if ($prs->num_rows == 0) {
            echo ("Oops Try Again Later");
        } else {

            $cart_rs = Database::search("SELECT * FROM `cart` WHERE `product_id`='" . $pid . "' AND `customer_id`='" . $cus["id"] . "'");

            if ($cart_rs->num_rows == 1) {
                $cart_data =  $cart_rs->fetch_assoc();

                $cart_qty = $cart_data["qty"];

                $new_cart_qty = $cart_qty + 1;

                Database::iud("UPDATE `cart` SET `qty`='" . $new_cart_qty . "' WHERE `product_id`='" . $pid . "' AND `customer_id`='" . $cus["id"] . "'  ");

                echo ("Cart Updated");
            } else {

                Database::iud("INSERT INTO `cart` (`product_id`,`customer_id`,`qty`) VALUES('" . $pid . "','" . $cus["id"] . "','1') ");

                echo ("Your Product Successfully Added To Cart");
            }
        }
    } else {

        echo ("Somthing Went Wrong");
    }
} else {

    echo ("Please Login First");
}
