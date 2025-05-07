<?php
session_start();
$cus_data = $_SESSION["cus"];

require "connection.php";

$txt = $_POST["t"];

$query = "SELECT `product_id`,`customer_id`,`invoice`.`qty`,`invoice`.`id`,`order_status_id`,`date_time`,`total`,`invoice`.`delivery_fee` FROM `invoice` INNER JOIN `product` ON `product`.`id`=`invoice`.`product_id`
WHERE `customer_id`='" . $cus_data["id"] . "' AND `order_status_id`!='8' ";

if (!empty($txt)) {
    $query = "SELECT `product_id`,`customer_id`,`invoice`.`qty`,`invoice`.`id`,`order_status_id`,`date_time`,`total`,`invoice`.`delivery_fee` FROM `invoice` INNER JOIN `product` ON `product`.`id`=`invoice`.`product_id` 
    WHERE `title` LIKE '%" . $txt . "%' AND `customer_id`='" . $cus_data["id"] . "' AND `order_status_id`!='8' ";
}



$irs =  Database::search($query);

$inum = $irs->num_rows;

if ($inum != 0) {


?>
    <div class="row">

        <div class="col-10 offset-1  mt-4">
            <div class="row">
                <div class="col-12">
                    <div class="row">

                        <?php

                        for ($x = 0; $x < $irs->num_rows; $x++) {

                            $idata = $irs->fetch_assoc();

                            $prs = Database::search("SELECT * FROM `product` WHERE `id`='" . $idata['product_id'] . "'");
                            $pdata = $prs->fetch_assoc();

                        ?>

                            <div class="col-12 offset-0 d-xl-block  d-xxl-block d-none d-md-none d-lg-none ">

                                <div class="card-group">


                                    <div class="card border-1 border border-warning mb-3 bg-dark" style="max-width: 18rem;">
                                        <div class="card-header text-center text-white">Order No</div>
                                        <div class="card-body">
                                            <h4 class="card-title text-white text-center">#<?php echo $idata["id"]; ?></h>
                                        </div>
                                    </div>


                                    <div class="card mb-3 bg-dark text-white border-1 border-warning  " style="max-width: 540px;">
                                        <div class="row g-0">
                                            <div class="col-md-12  mt-3 mb-3">
                                                <!-- <img src="resources/product_img/Pepper Powder_63f3f94b1b4fa.png" class="img-fluid ms-2  rounded-start" alt="..."> -->
                                            </div>
                                            <div class="col-md-12">
                                                <div class="card-body">
                                                    <h5 class="card-title ms-2 fs-5"><?php echo $pdata["title"]; ?></h5>
                                                    <p class="card-text mt-4 ms-2"><b>Seller :</b>KV SPICE</p>
                                                    <p class="card-text ms-2"><b>Price :</b>Rs.<?php echo $idata["total"]; ?></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="card border-1 border border-warning mb-3 bg-dark" style="max-width: 18rem;">
                                        <div class="card-header text-center text-white">Quantity</div>
                                        <div class="card-body">
                                            <h4 class="card-title text-white text-center"><?php echo $idata["qty"]; ?></h4>

                                        </div>
                                    </div>

                                    <div class="card border-1 border border-warning mb-3 bg-dark" style="max-width: 18rem;">
                                        <div class="card-header text-center text-white">Delivery Fee</div>
                                        <div class="card-body">
                                            <h4 class="card-title text-white text-center">Rs.<?php echo $idata["delivery_fee"]; ?></h4>

                                        </div>
                                    </div>

                                    <div class="card border-1 border border-warning mb-3 bg-dark" style="max-width: 18rem;">
                                        <div class="card-header text-center text-white">Purchase Date</div>
                                        <div class="card-body">
                                            <h4 class="card-title text-white text-center"><?php echo $idata["date_time"]; ?></h4>
                                            <!-- <h4 class="card-title text-white text-center">09:45 a.m</h4> -->
                                        </div>
                                    </div>

                                    <div class="card border-1 border border-warning mb-3 bg-dark" style="max-width: 18rem;">
                                        <div class="card-body text-center">
                                            <!-- <button class="btn btn-success "><i class="bi bi-info-circle-fill text-white"></i>&nbsp; Feed Back</button> -->

                                        </div>
                                        <div class="card-body text-center">
                                            <?php

                                            if ($idata["order_status_id"] == 1) {
                                            ?>
                                                <p class="text-warning">Your Oder Has Saved</p>
                                                <button class="btn btn-danger disabled"><i class="bi bi-trash-fill text-white"></i>&nbsp; Delete</button>
                                            <?php
                                            } else   if ($idata["order_status_id"] == 2) {
                                            ?>
                                                <p class="text-warning">Your Oder Has Confirmed</p>
                                                <button class="btn btn-danger disabled"><i class="bi bi-trash-fill text-white"></i>&nbsp; Delete</button>
                                            <?php
                                            } else   if ($idata["order_status_id"] == 3) {
                                            ?>
                                                <p class="text-warning">Your Oder Is Checking</p>
                                                <button class="btn btn-danger disabled"><i class="bi bi-trash-fill text-white"></i>&nbsp; Delete</button>
                                            <?php
                                            } else   if ($idata["order_status_id"] == 4) {
                                            ?>
                                                <p class="text-warning">Your Oder Is Packing</p>
                                                <button class="btn btn-danger disabled"><i class="bi bi-trash-fill text-white"></i>&nbsp; Delete</button>
                                            <?php
                                            } else   if ($idata["order_status_id"] == 5) {
                                            ?>
                                                <p class="text-warning">Your Oder Has Dispatched</p>
                                                <button class="btn btn-danger disabled"><i class="bi bi-trash-fill text-white"></i>&nbsp; Delete</button>
                                            <?php
                                            } else   if ($idata["order_status_id"] == 6) {
                                            ?>
                                                <p class="text-warning">Your Oder Is Shipping</p>
                                                <button class="btn btn-danger disabled"><i class="bi bi-trash-fill text-white"></i>&nbsp; Delete</button>
                                            <?php
                                            } else   if ($idata["order_status_id"] == 7) {
                                            ?>
                                                <p class="text-warning">Your Oder Has Delivered</p>
                                                <button class="btn btn-danger " onclick="deleteAndRecoveryOrderHistory('<?php echo $idata['order_id']; ?>');"><i class="bi bi-trash-fill text-white"></i>&nbsp; Delete</button>
                                            <?php
                                            }

                                            ?>


                                        </div>
                                    </div>

                                </div>







                            </div>



                            <div class="col-lg-10 offset-lg-1 d-xl-none d-xxl-none d-block d-md-block d-lg-block bg-dark rounded-3 mb-5">

                                <div class="col-12 mt-3">

                                    <div class="row">

                                        <div class="col-lg-6 offset-lg-3 col-8 offset-2 mt-5 mb-5 text-white">



                                            <div class="row  g-4">

                                                <div class="col">

                                                    <div class="card bg-black">

                                                        <!-- <img src="resources/laptop_images/msi1.png" class="card-img-top" alt="..."> -->

                                                        <div class="card-body">
                                                            <h5 class="card-title text-center mb-5"><?php echo $pdata["title"]; ?></h5>

                                                            <p class="card-text text-lg-center">#0<?php echo $idata["id"]; ?></p>
                                                            <p class="card-text text-lg-center"><b>Seller : </b>KV SPICE</p>
                                                            <p class="card-text  text-lg-center"><b>Price : </b>Rs.<?php echo $idata["total"]; ?></p>
                                                            <p class="card-text text-lg-center"><b>Qty : </b>1</p>
                                                            <p class="card-text text-lg-center"><b>Delivery : </b>Rs.<?php echo $idata["delivery_fee"]; ?></p>
                                                            <p class="card-text text-lg-center"><b>Date : </b><?php echo $idata["date_time"]; ?></p>


                                                        </div>

                                                        <div class=" card-footer">

                                                            <div class="col-12 card-group d-grid">

                                                                <!-- <button class="btn btn-success text-center col-12 col-lg-5 offset-lg-1  mb-3 "><i class="bi bi-info-circle-fill text-white"></i>&nbsp; Feed Back</button> -->
                                                                <?php
                                                                if ($idata["order_status_id"] == 1) {
                                                                ?>
                                                                    <p class="text-warning">Your Oder Has Saved</p>
                                                                    <button class="btn btn-danger disabled"><i class="bi bi-trash-fill text-white"></i>&nbsp; Delete</button>
                                                                <?php
                                                                } else   if ($idata["order_status_id"] == 2) {
                                                                ?>
                                                                    <p class="text-warning">Your Oder Has Confirmed</p>
                                                                    <button class="btn btn-danger disabled"><i class="bi bi-trash-fill text-white"></i>&nbsp; Delete</button>
                                                                <?php
                                                                } else   if ($idata["order_status_id"] == 3) {
                                                                ?>
                                                                    <p class="text-warning">Your Oder Is Checking</p>
                                                                    <button class="btn btn-danger disabled"><i class="bi bi-trash-fill text-white"></i>&nbsp; Delete</button>
                                                                <?php
                                                                } else   if ($idata["order_status_id"] == 4) {
                                                                ?>
                                                                    <p class="text-warning">Your Oder Is Packing</p>
                                                                    <button class="btn btn-danger disabled"><i class="bi bi-trash-fill text-white"></i>&nbsp; Delete</button>
                                                                <?php
                                                                } else   if ($idata["order_status_id"] == 5) {
                                                                ?>
                                                                    <p class="text-warning">Your Oder Has Dispatched</p>
                                                                    <button class="btn btn-danger disabled"><i class="bi bi-trash-fill text-white"></i>&nbsp; Delete</button>
                                                                <?php
                                                                } else   if ($idata["order_status_id"] == 6) {
                                                                ?>
                                                                    <p class="text-warning">Your Oder Is Shipping</p>
                                                                    <button class="btn btn-danger disabled"><i class="bi bi-trash-fill text-white"></i>&nbsp; Delete</button>
                                                                <?php
                                                                } else   if ($idata["order_status_id"] == 7) {
                                                                ?>
                                                                    <p class="text-white">Your Oder Has Delivered</p>
                                                                    <button class="btn btn-danger " onclick="deleteAndRecoveryOrderHistory('<?php echo $idata['order_id']; ?>');"><i class="bi bi-trash-fill text-white"></i>&nbsp; Delete</button>
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





                                </div>


                            </div>

                        <?php

                        }
                        ?>

                        <div class="col-12 text-center">

                            <div class="col-6 offset-3 ">
                                <button class=" col-12 btn btn-danger mb-5 mt-5" onclick="clearOrderHistory('<?php echo $idata['customer_id']; ?>');"><i class="bi bi-trash3-fill text-white"></i>&nbsp; Clear Records</button>
                            </div>

                        </div>
                        <?php




                        ?>





                    </div>
                </div>
            </div>
        </div>



    </div>

<?php



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