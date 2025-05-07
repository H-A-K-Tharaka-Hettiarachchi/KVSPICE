<?php


require "connection.php";


if (isset($_GET["id"])) {

    $pid = $_GET["id"];

    $rs = Database::search("SELECT * FROM `product` WHERE `id`='" . $pid . "' ");

    if ($rs->num_rows == 1) {

        $data = $rs->fetch_assoc();

        if ($data["blo_status_id"] == 1) {

            Database::iud("UPDATE `product` SET `blo_status_id`='2' WHERE `id`='" . $pid . "'");
            echo ("Blocked");
        } else {

            Database::iud("UPDATE `product` SET `blo_status_id`='1' WHERE `id`='" . $pid . "' ");
            echo ("UnBlocked");
        }
    }
} else {

    echo ("Oops Somthing Went Wrong");
}
