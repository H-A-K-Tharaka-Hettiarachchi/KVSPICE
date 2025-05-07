<?php

require "connection.php";

if (isset($_GET["id"])) {

    $orderId = $_GET["id"];

    $rs = Database::search("SELECT * FROM `invoice` WHERE `order_id`='" . $orderId . "'");

    if ($rs->num_rows != 0) {

        $data = $rs->fetch_assoc();

        if ($data["order_status_id"] == 7) {
            Database::iud("UPDATE `invoice` SET `order_status_id` ='8' WHERE `order_id`='" . $orderId . "' ");
            Database::iud("UPDATE `order` SET `order_status_id` ='8' WHERE `order_id`='" . $orderId . "' ");
            echo ("success1");
        } else if ($data["order_status_id"] == 8) {
            Database::iud("UPDATE `invoice` SET `order_status_id` ='7' WHERE `order_id`='" . $orderId . "' ");
            Database::iud("UPDATE `order` SET `order_status_id` ='7' WHERE `order_id`='" . $orderId . "' ");
            echo ("success2");
        }
    } else {
        echo ("Oops Please Try Again");
    }
} else {
    echo ("Something Went Wrong");
}
