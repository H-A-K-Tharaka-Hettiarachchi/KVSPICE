<?php

require "connection.php";

$txt = $_POST["t"];

$query = "SELECT `product_id`,`customer_id`,`qty`,`order`.`id`,`order_status_id` FROM `order` INNER JOIN `customer` ON `customer`.`id`=`order`.`customer_id`";

if (!empty($txt)) {
    $query .= " WHERE `fname` LIKE '%" . $txt . "%' OR `lname` LIKE '%" . $txt . "%'  ";
}



$ors =  Database::search($query);

$onum = $ors->num_rows;

if ($onum != 0) {




    for ($x = 1; $x <= $onum; $x++) {

        $odata = $ors->fetch_assoc();


        $prs = Database::search("SELECT * FROM `product` WHERE `id`='" . $odata['product_id'] . "'");
        $pdata = $prs->fetch_assoc();
        $crs = Database::search("SELECT * FROM `customer` WHERE `id`='" . $odata['customer_id'] . "'");
        $cdata = $crs->fetch_assoc();
?>
        <div class="col-12 bg-dark mt-3">
            <div class="row">

                <div class="col-1 mt-2 mb-2">
                    <h5 class="text-white mt-1 mb-1"><?php echo $x ?></h5>
                </div>
                <div class="col-2 col-lg-2 text-center mt-2 mb-2">
                    <h5 class="text-white mt-1 mb-1"><?php echo $pdata["title"]; ?></h5>
                </div>
                <div class="col-1 d-none d-lg-block text-center mt-2 mb-2">
                    <h5 class="text-white mt-1 mb-1"><?php echo $odata["qty"]; ?></h5>
                </div>
                <div class="col-2 col-lg-2 text-center mt-2 mb-2">
                    <h5 class="text-white mt-1 mb-1">Rs.<?php echo $pdata["price"]; ?>.00</h5>
                </div>
                <div class="col-3 offset-1 offset-lg-0 d-block d-lg-block text-center mt-2 mb-2">
                    <h5 class="text-white mt-1 mb-1"><?php echo $cdata["fname"] . "  " . $cdata["lname"]; ?></h5>
                </div>
                <div class="col-2 offset-0  d-block d-lg-none  mt-2 mb-2">
                    <div class="row">
                        <div class="col-12">
                            <div class="row">
                                <div class="col-4 text-center d-grid">
                                    <?php

                                    if ($odata["order_status_id"] == 1) {
                                    ?>
                                        <button class="btn btn-danger" onclick="changeOrderStatus('<?php echo $odata['id']; ?>');">Confirm</button>

                                    <?php
                                    } else   if ($odata["order_status_id"] == 2) {
                                    ?>
                                        <button class="btn btn-primary" onclick="changeOrderStatus('<?php echo $odata['id']; ?>');">Check</button>
                                    <?php
                                    } else   if ($odata["order_status_id"] == 3) {
                                    ?>
                                        <button class="btn btn-warning" onclick="changeOrderStatus('<?php echo $odata['id']; ?>');">Packing</button>
                                    <?php
                                    } else   if ($odata["order_status_id"] == 4) {
                                    ?>
                                        <button class="btn btn-info" onclick="changeOrderStatus('<?php echo $odata['id']; ?>');">Dispatch</button>
                                    <?php
                                    } else   if ($odata["order_status_id"] == 5) {
                                    ?>
                                        <button class="btn btn-success" onclick="changeOrderStatus('<?php echo $odata['id']; ?>');">Shipping</button>
                                    <?php
                                    } else   if ($odata["order_status_id"] == 6) {
                                    ?>
                                        <button class="btn btn-light" onclick="changeOrderStatus('<?php echo $odata['id']; ?>');">Deliver</button>
                                    <?php
                                    } else   if ($odata["order_status_id"] == 7) {
                                    ?>
                                        <button class="btn btn-warning disabled" onclick="changeOrderStatus('<?php echo $odata['id']; ?>');">Delivered</button>
                                    <?php
                                    } else   if ($odata["order_status_id"] == 8) {
                                    ?>
                                        <button class="btn btn-primary " onclick="deleteAndRecoveryOrderHistory('<?php echo $odata['order_id']; ?>');">Recover Order</button>
                                    <?php
                                    }

                                    ?>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-2 offset-1 d-none d-lg-block mt-2 mb-2">
                    <div class="row">
                        <div class="col-12">
                            <div class="row">
                                <div class="col-12 d-grid">
                                    <?php

                                    if ($odata["order_status_id"] == 1) {
                                    ?>
                                        <button class="btn btn-danger" onclick="changeOrderStatus('<?php echo $odata['id']; ?>');">Confirm</button>
                                    <?php
                                    } else   if ($odata["order_status_id"] == 2) {
                                    ?>
                                        <button class="btn btn-primary" onclick="changeOrderStatus('<?php echo $odata['id']; ?>');">Check</button>

                                    <?php
                                    } else   if ($odata["order_status_id"] == 3) {
                                    ?>
                                        <button class="btn btn-warning" onclick="changeOrderStatus('<?php echo $odata['id']; ?>');">Packing</button>

                                    <?php
                                    } else   if ($odata["order_status_id"] == 4) {
                                    ?>
                                        <button class="btn btn-info" onclick="changeOrderStatus('<?php echo $odata['id']; ?>');">Dispatch</button>

                                    <?php
                                    } else   if ($odata["order_status_id"] == 5) {
                                    ?>
                                        <button class="btn btn-success" onclick="changeOrderStatus('<?php echo $odata['id']; ?>');">Shipping</button>

                                    <?php
                                    } else   if ($odata["order_status_id"] == 6) {
                                    ?>
                                        <button class="btn btn-light" onclick="changeOrderStatus('<?php echo $odata['id']; ?>');">Deliver</button>

                                    <?php
                                    } else   if ($odata["order_status_id"] == 7) {
                                    ?>
                                        <button class="btn btn-warning disabled" onclick="changeOrderStatus('<?php echo $odata['id']; ?>');">Delivered</button>

                                    <?php
                                    } else   if ($odata["order_status_id"] == 8) {
                                    ?>
                                        <button class="btn btn-primary" onclick="deleteAndRecoveryOrderHistory('<?php echo $odata['order_id']; ?>');">Recover Order</button>

                                    <?php
                                    }


                                    ?>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    <?php


    }
} else {

    ?>

    <div class="col-12 col-lg-8 offset-lg-2 mb-5 text-center">

        <div class="col-12 text-white">
            <span class="col-12 fw-bold"><i class="bi bi-search text-warning" style="font-size: 200px;"></i></span>
        </div>
        <div class="col-12 text-white">
            <h1>Not Found Orders.</h1>
        </div>

    </div>

<?php

}

?>