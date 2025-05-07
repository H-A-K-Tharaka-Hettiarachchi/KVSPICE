<?php

require "connection.php";

session_start();

if (isset($_SESSION['cus'])) {

    $cus = $_SESSION["cus"];

    if (isset($_POST["pid"])) {




        $qty = $_POST["qty"];
        $pid = $_POST["pid"];

        if ($qty == "0" || $qty == "") {
            echo ("4");
        } else {

            $rs = Database::search("SELECT * FROM `product` WHERE `id`='" . $pid . "' ");

            if ($rs->num_rows == 0) {
                echo ("3");
            } else {

                $data = $rs->fetch_assoc();
                $hqty = $data["qty"];


                if ($qty > $data["qty"]) {
                    // echo ("We Have Only " . $data["qty"] . " Quantities In This Product");
                    echo ("5");
                } else {

                    $array;



                    $email = $cus["email"];

                    $price = $data["price"];

                    $newprice = $price * $qty;

                    //  $serviceTax =  ($data["delivery_fee"] * 10 / 100);

                    $amount = ($newprice + $data["delivery_fee"]) - (($newprice + $data["delivery_fee"]) * 5 / 100);
                    $total = $amount;





                    $merchant_id = "1221052";
                    $merchant_secret = "MjA5MzU5MDQzMzE2Mjg1OTg2MTExMjkwNzgyMTQxMjE3NzMwODAyOA==";
                    $order_id = uniqid();
                    $currency = "LKR";


                    $hash = strtoupper(
                        md5(
                            $merchant_id .
                                $order_id .
                                number_format($total, 2, '.', '') .
                                $currency .
                                strtoupper(md5($merchant_secret))
                        )
                    );


                    $fname = $cus["fname"];
                    $lname = $cus["lname"];
                    $mobile = $cus["mobile"];
                    $address = $cus["address"];

                    $array["hash"] = $hash;

                    $array["id"] = $cus["id"];
                    $array["amount"] = $amount;
                    $array["fname"] = $fname;
                    $array["lname"] = $lname;
                    $array["mobile"] = $mobile;
                    $array["address"] = $address;
                    $array["email"] = $email;
                    $array["orderid"] = $order_id;

                    $array["qty"] = $qty;
                    $array["pid"] = $pid;
                    $array["delivery_fee"] = $data["delivery_fee"];
                    $array["total"] = $total;


                    echo json_encode($array);
                }
            }
        }
    } else {
        echo ("1");
    }
} else {
    echo ("2");
}
