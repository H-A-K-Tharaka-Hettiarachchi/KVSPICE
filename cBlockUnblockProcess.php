<?php


require "connection.php";


if (isset($_GET["id"])) {

    $cid = $_GET["id"];

    $rs = Database::search("SELECT *  FROM `customer` WHERE `id`='" . $cid . "'");

    if ($rs->num_rows == 1) {

        $data = $rs->fetch_assoc();

        if ($data["blo_status_id"] == 1) {
            Database::iud("UPDATE `customer` SET `blo_status_id`='2' WHERE `id`='" . $cid . "'");
            echo ("Blocked");
        } else {
            Database::iud("UPDATE `customer` SET `blo_status_id`='1' WHERE `id`='" . $cid . "'");
            echo ("UnBlocked");
        }
    } else {
        echo ("Oops Try Again Later");
    }
} else {
    echo ("Oops Somthing Went Wrong");
}
