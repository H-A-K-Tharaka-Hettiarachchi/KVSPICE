<?php

session_start();
require "connection.php";

if (isset($_POST["reqJsonText"])) {


    $reqJsonText =  $_POST["reqJsonText"];
    $reqObject = json_decode($reqJsonText);


    $order_id = $reqObject->orderid;
    $qty = $reqObject->qty;
    $total = $reqObject->total;
    $delivery_fee = $reqObject->delivery_fee;
    $cus_email = $reqObject->email;
    $address = $reqObject->address;
    $pid = $reqObject->pid;
    $cus_id = $reqObject->id;

    $prs = Database::search("SELECT * FROM `product` WHERE `id`='" . $pid . "'");
    $pdata = $prs->fetch_assoc();

    $pqty = $pdata["qty"];
    $newpqty = $pqty - $reqObject->qty;

    $d = new DateTime();
    $tz = new DateTimeZone("Asia/Colombo");
    $d->setTimezone($tz);
    $date = $d->format("Y-m-d H:i:s");

    $today = $d->format("Y-m-d");


    $rs = Database::search("SELECT * FROM `invoice` WHERE `customer_id`='" . $cus_id . "' AND `product_id`='" . $pid . "' ");



    if ($rs->num_rows == 1) {
        $data = $rs->fetch_assoc();

        $inDate = strtotime($data["date_time"]);
        $inDateF =  date("Y-m-d H:i:s", $inDate);
        $dateStr = date("Y-m-d", $inDate);


        if ($today == $dateStr) {

            $oldqty = $data["qty"];
            $newqty = $oldqty + $qty;

            $oldtotal = $data["total"];
            $newtotal = ($oldtotal + $total) - $delivery_fee;

            Database::search("UPDATE `invoice` SET `qty`='" . $newqty . "',`total`='" . $newtotal . "',`date_time`='" . $date . "',`order_id`='" . $order_id . "' WHERE `customer_id`='" . $cus_id . "' AND `product_id`='" . $pid . "' AND `date_time` ='" . $inDateF . "' ");

            // Database::iud("INSERT INTO  `order` (`customer_id`,`product_id`,`order_id`,`total`,`qty`,`order_status_id`) 
            //                               VALUES ('" . $cus_id . "','" . $pid . "','" . $order_id . "','" . $total . "','" . $qty . "','1') ");

            Database::iud("UPDATE   `order` SET `customer_id`='" . $cus_id . "',`product_id`='" . $pid . "',`order_id`= '" . $order_id . "',`total`= '" . $newtotal . "',`qty`='" . $newqty . "',`order_status_id`= '1'
           WHERE `customer_id`='" . $cus_id . "' AND `product_id`='" . $pid . "' AND `date_time` ='" . $inDateF . "'");


            Database::iud("UPDATE `product` SET `qty`='" . $newpqty . "' WHERE  `id`='" . $pid . "' ");
        }
    } else {

        Database::iud("INSERT INTO `invoice` (`order_id`,`qty`,`total`,`delivery_fee`,`cus_email`,`address`,`date_time`,`product_id`,`customer_id`,`order_status_id`) 
            VALUES         ('" . $order_id . "','" . $qty . "','" . $total . "','" . $delivery_fee . "','" . $cus_email . "','" . $address . "','" . $date . "','" . $pid . "','" . $cus_id . "','1') ");


        Database::iud("INSERT INTO  `order` (`customer_id`,`product_id`,`order_id`,`total`,`qty`,`order_status_id`,`date_time`) 
                                  VALUES ('" . $cus_id . "','" . $pid . "','" . $order_id . "','" . $total . "','" . $qty . "','1','" . $date . "') ");


        Database::iud("UPDATE `product` SET `qty`='" . $newpqty . "' WHERE  `id`='" . $pid . "' ");
    }









    echo ("success");
} else {
    echo ("Oops Something Went Wrong");
}
