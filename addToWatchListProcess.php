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

            $watch_rs = Database::search("SELECT * FROM `watchlist` WHERE `product_id`='" . $pid . "' AND `customer_id`='" . $cus["id"] . "'");

            if ($watch_rs->num_rows == 1) {
                $watch_data =  $watch_rs->fetch_assoc();

                Database::iud("DELETE FROM `watchlist` WHERE  `product_id`='" . $pid . "' AND `customer_id`='" . $cus["id"] . "'");

                echo ("WatchList Item Removed Success");
            } else {

                Database::iud("INSERT INTO `watchlist` (`product_id`,`customer_id`) VALUES('" . $pid . "','" . $cus["id"] . "') ");

                echo ("Your Product Successfully Added To WatchList");
            }
        }
    } else {

        echo ("Somthing Went Wrong");
    }
} else {

    echo ("Please Login First");
}
