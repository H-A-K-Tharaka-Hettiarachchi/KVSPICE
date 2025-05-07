<?php

require "connection.php";

if (isset($_GET["id"])) {

    $cus_id = $_GET["id"];

    $rs = Database::search("SELECT * FROM `invoice` WHERE `customer_id`='" . $cus_id . "'   AND `order_status_id`='7' ");

    if ($rs->num_rows != 0) {

        $data = $rs->fetch_assoc();

        if ($data["order_status_id"] == 7) {
            Database::iud("UPDATE `invoice` SET `order_status_id` ='8' WHERE `customer_id`='" . $cus_id . "' AND `order_status_id`='7' ");
            Database::iud("UPDATE `order` SET `order_status_id` ='8' WHERE `customer_id`='" . $cus_id . "' AND `order_status_id`='7' ");
            echo ("success");
        }
    } else {
        echo ("Oops Please Try Again");
    }
} else {
    echo ("Something Went Wrong");
}
