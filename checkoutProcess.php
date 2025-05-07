<?php

// session_start();
// require "connection.php";

// if (isset($_POST["id"])) {

//     $cus_id = $_POST["id"];

//     $rs = Database::search("SELECT * FROM `cart` WHERE `customer_id`='" . $cus_id . "' ");

//     $array;

//     $subTotal = 0;
//     $shipping = 0;
//     $serviceTax = 0;
//     $offer = 0;
//     $total = 0;

//     $merchant_id = "1221052";
//     $merchant_secret = "MjYyODI4MzI3ODI3OTg1MTMzNTYzNzE1MDI3OTM0MTg2NDA1OTM1MA==";
//     $order_id = uniqid();
//     $currency = "LKR";



//     $hash = strtoupper(
//         md5(
//             $merchant_id .
//                 $order_id .
//                 number_format($total, 2, '.', '') .
//                 $currency .
//                 strtoupper(md5($merchant_secret))
//         )
//     );


//     $fname = $_SESSION["cus"]["fname"];
//     $lname = $_SESSION["cus"]["lname"];
//     $address = $_SESSION["cus"]["address"];
//     $mobile = $_SESSION["cus"]["mobile"];
//     $email = $_SESSION["cus"]["email"];

//     for ($x = 0; $x < $rs->num_rows; $x++) {

//         $data = $rs->fetch_assoc();

//         $prs = Database::search("SELECT * FROM `product` WHERE `id`='" . $data["product_id"] . "'");


//         for ($y = 0; $y < $prs->num_rows; $y++) {

//             $pdata = $prs->fetch_assoc();

//             $subTotal =  ($pdata["price"] * $data["qty"]);

//             $shipping =  $pdata["delivery_fee"];

//             $serviceTax =  ($shipping * 10 / 100);

//             $offer =  (($subTotal + $shipping + $serviceTax) * 5 / 100);

//             $total = $total + (($subTotal + $shipping + $serviceTax) - $offer);
//         }
//     }


//     $array["cus_id"] = $cus_id;
//     $array["hash"] = $hash;
//     $array["amount"] = $total;
//     $array["order_id"] = $order_id;
//     $array["fname"] = $fname;
//     $array["lname"] = $lname;
//     $array["mobile"] = $mobile;
//     $array["email"] = $email;


//     echo (json_encode($array));
// } else {
// }



require "connection.php";

session_start();

if (isset($_SESSION['cus'])) {

    $cus = $_SESSION["cus"];

    if (isset($_POST["cus_id"])) {


        $subTotal = 0;
        $shipping = 0;
        $amount = 0;
        $total = 0;

        $cus_id = $_POST["cus_id"];

        $pdrs = Database::search("SELECT * FROM `product` WHERE `qty`!='0' AND `blo_status_id`='1' ");

        for ($z = 0; $z < $pdrs->num_rows; $z++) {

            $pddata = $pdrs->fetch_assoc();

            $rs = Database::search("SELECT * FROM `cart` WHERE `customer_id`='" . $cus_id . "' AND `product_id`='" . $pddata["id"] . "' ");



            for ($x = 0; $x < $rs->num_rows; $x++) {

                $data = $rs->fetch_assoc();

                $prs = Database::search("SELECT * FROM `product` WHERE `id`='" . $data["product_id"] . "'");


                for ($y = 0; $y < $prs->num_rows; $y++) {

                    $pdata = $prs->fetch_assoc();

                    $subTotal = $subTotal +  ($pdata["price"] * $data["qty"]);

                    $shipping = $shipping +  $pdata["delivery_fee"];
                }

                $amount =   (($subTotal + $shipping) - (($subTotal + $shipping) * 5 / 100));

                $total = $amount;
            }
        }




        if ($rs->num_rows == 0) {
            echo ("3");
        } else {



            $array;

            $email = $cus["email"];



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
            $array["fname"] = $fname;
            $array["lname"] = $lname;
            $array["mobile"] = $mobile;
            $array["address"] = $address;
            $array["email"] = $email;
            $array["orderid"] = $order_id;
            $array["total"] = $total;


            echo json_encode($array);
        }
    } else {
        echo ("1");
    }
} else {
    echo ("2");
}
