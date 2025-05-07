<?php

require "connection.php";


if (isset($_GET["id"])) {

    $pid = $_GET["id"];

    $rs = Database::search("SELECT * FROM `product` WHERE `id`='" . $pid . "' ");

    if ($rs->num_rows == 1) {

        $data = $rs->fetch_assoc();

        if ($data["rem_status_id"] == 1) {

            Database::iud("UPDATE `product` SET `blo_status_id`='2' WHERE `id`='" . $pid . "'");
            Database::iud("UPDATE `product` SET `rem_status_id`='2' WHERE `id`='" . $pid . "'");

            Database::iud("INSERT INTO `recent` (`product_id`) VALUES ('" . $data["id"] . "') ");

            echo ("Product Deleted");
        } else {

            Database::iud("UPDATE `product` SET `blo_status_id`='1' WHERE `id`='" . $pid . "' ");
            Database::iud("UPDATE `product` SET `rem_status_id`='1' WHERE `id`='" . $pid . "' ");
            Database::iud("DELETE FROM `recent` WHERE `product_id` ='" . $data["id"] . "' ");

            echo ("Product Re-Coverd");
        }
    }
} else {

    echo ("Oops Somthing Went Wrong");
}
