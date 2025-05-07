<?php

require "connection.php";

if (isset($_GET["id"])) {

    $orderId = $_GET["id"];

    $rs = Database::search("SELECT * FROM `order` WHERE `id`='" . $orderId . "'");

    if ($rs->num_rows != 0) {


        $data = $rs->fetch_assoc();

        $irs = Database::search("SELECT * FROM `invoice` WHERE `order_id`='" . $data["order_id"] . "' ");

        if ($irs->num_rows != 0) {

            if ($data["order_status_id"] == 1) {
                Database::iud("UPDATE `invoice` SET `order_status_id` ='2' WHERE `order_id`='" . $data["order_id"] . "'  ");
                Database::iud("UPDATE `order` SET `order_status_id` ='2' WHERE `order_id`='" . $data["order_id"] . "'");
                echo ("success");
            } else   if ($data["order_status_id"] == 2) {
                Database::iud("UPDATE `invoice` SET `order_status_id` ='3' WHERE `order_id`='" . $data["order_id"] . "'  ");
                Database::iud("UPDATE `order` SET `order_status_id` ='3' WHERE `order_id`='" . $data["order_id"] . "'");
                echo ("success");
            } else   if ($data["order_status_id"] == 3) {
                Database::iud("UPDATE `invoice` SET `order_status_id` ='4' WHERE `order_id`='" . $data["order_id"] . "'  ");
                Database::iud("UPDATE `order` SET `order_status_id` ='4' WHERE `order_id`='" . $data["order_id"] . "'");
                echo ("success");
            } else   if ($data["order_status_id"] == 4) {
                Database::iud("UPDATE `invoice` SET `order_status_id` ='5' WHERE `order_id`='" . $data["order_id"] . "'  ");
                Database::iud("UPDATE `order` SET `order_status_id` ='5' WHERE `order_id`='" . $data["order_id"] . "'");
                echo ("success");
            } else   if ($data["order_status_id"] == 5) {
                Database::iud("UPDATE `invoice` SET `order_status_id` ='6' WHERE `order_id`='" . $data["order_id"] . "'  ");
                Database::iud("UPDATE `order` SET `order_status_id` ='6' WHERE `order_id`='" . $data["order_id"] . "'");
                echo ("success");
            } else   if ($data["order_status_id"] == 6) {
                Database::iud("UPDATE `invoice` SET `order_status_id` ='7' WHERE `order_id`='" . $data["order_id"] . "'  ");
                Database::iud("UPDATE `order` SET `order_status_id` ='7' WHERE `order_id`='" . $data["order_id"] . "'");
                echo ("success");
            } else   if ($data["order_status_id"] == 7) {
                echo ("Delivered");
            }
        } else {
            echo ("Oops Please Try Again");
        }
    } else {
        echo ("Oops Something Went Wrong Please Try Again");
    }
} else {
    echo ("Something Went Wrong");
}
