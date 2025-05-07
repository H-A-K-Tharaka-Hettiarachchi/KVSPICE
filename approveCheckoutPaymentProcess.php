<?php

require "connection.php";

if (isset($_POST["reqJsonText"])) {

    $reqObject = json_decode($_POST["reqJsonText"]);

    $cus_id = $reqObject->id;

    $d = new DateTime();
    $tz = new DateTimeZone("Asia/Colombo");
    $d->setTimezone($tz);
    $date = $d->format("Y-m-d H:i:s");

    $p_rs = Database::search("SELECT * FROM `product` WHERE `qty`!='0' AND `blo_status_id`='1' ");



    for ($z = 0; $z < $p_rs->num_rows; $z++) {
        $p_data = $p_rs->fetch_assoc();

        $cart_rs = Database::search("SELECT * FROM `cart` WHERE `customer_id`='" . $cus_id . "' AND `product_id`='" . $p_data["id"] . "' ");
        $c_rs = Database::search("SELECT * FROM `cart` WHERE `customer_id`='" . $cus_id . "' AND `product_id`='" . $p_data["id"] . "' ");


        for ($x = 0; $x < $cart_rs->num_rows; $x++) {

            $cart_data = $cart_rs->fetch_assoc();
            $c_data = $c_rs->fetch_assoc();

            $product_rs = Database::search("SELECT * FROM `product` WHERE `id`='" . $cart_data["product_id"] . "' ");

            Database::iud("INSERT INTO `recent_cart` (`date_time`,`qty`,`customer_id`,`product_id`,`order_id`) VALUES 
        
                                                ('" . $date . "' ,'" . $c_data["qty"] . "', '" . $cus_id . "','" . $c_data["product_id"] . "','" . $reqObject->orderid . "') ");




            for ($y = 0; $y < $product_rs->num_rows; $y++) {

                $product_data = $product_rs->fetch_assoc();

                $price = $product_data["price"];

                $newprice = $price * $cart_data["qty"];



                $amount = ($newprice + $product_data["delivery_fee"]) - (($newprice + $product_data["delivery_fee"]) * 5 / 100);
                $total = $amount;


                $newpqty = $product_data["qty"] - $cart_data["qty"];


                Database::iud("INSERT INTO `invoice` (`order_id`,`qty`,`total`,`delivery_fee`,`cus_email`,`address`,`date_time`,`product_id`,`customer_id`,`order_status_id`) 
            VALUES         ('" . $reqObject->orderid . "','" . $cart_data["qty"] . "','" . $total . "','" . $product_data["delivery_fee"] . "','" . $reqObject->email . "','" . $reqObject->address . "','" . $date . "','" . $cart_data["product_id"] . "','" . $cus_id . "','1') ");


                Database::iud("INSERT INTO  `order` (`customer_id`,`product_id`,`order_id`,`total`,`qty`,`order_status_id`,`date_time`) 
                                  VALUES ('" . $cus_id . "','" . $cart_data["product_id"] . "','" . $reqObject->orderid . "','" . $total . "','" . $cart_data["qty"] . "','1','" . $date . "') ");


                Database::iud("UPDATE `product` SET `qty`='" . $newpqty . "' WHERE  `id`='" . $cart_data["product_id"] . "' ");
            }
            Database::iud("DELETE FROM `cart` WHERE `customer_id`='" . $cus_id . "' && `product_id`='" . $c_data["product_id"] . "' ");
        }
    }





    echo ("success");

    // header("Location:invoice.php?orderid=" . $reqObject->orderid);
} else {
?>
    <script>
        function m() {
            alert("Oops Something Went Wrong");
        }
        m();
    </script>
<?php
}

?>