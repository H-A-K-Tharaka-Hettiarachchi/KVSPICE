<?php

require "connection.php";



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>KV SPICE</title>


    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

    <link rel="icon" href="resources/kv.png">

</head>

<body class="bg-black">


    <div class="container-fluid ">
        <div class="row ">

            <div class="col-12 mb-5 ">
                <div class="row">
                    <?php include "header.php";


                    if (isset($_SESSION["cus"])) {

                        $cus_rs = Database::search("SELECT * FROM `customer` WHERE `id`='" . $_SESSION["cus"]["id"] . "'");

                        $cus_data = $cus_rs->fetch_assoc();

                        if ($cus_data["blo_status_id"] == 2) {
                    ?>


                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-12 bg-black " style="height: 100vh; width: 100%;">
                                        <div class="row">


                                            <div class="col-12" aria-hidden="true">
                                                <div class="row">

                                                    <div class="col-12 placeholder-glow p-0">
                                                        <div class="placeholder bg-dark col-12" style="height: 45vh; width: 100%;">

                                                        </div>
                                                    </div>

                                                </div>
                                            </div>

                                            <div class="col-12 text-center fw-bold" style="height: 0vh; width: 100%;">
                                                <div class="row">

                                                    <div class="col-12 bg-dark">
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <label class="form-label fs-1 bg-dark text-warning">Your Account Has Banned</label>
                                                            </div>
                                                            <div class="col-6 offset-3 mt-3 mb-3">
                                                                <div class="spinner-grow text-light" role="status">
                                                                    <span class="visually-hidden">Loading...</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>


                                                </div>
                                            </div>

                                            <div class="col-12" aria-hidden="true">
                                                <div class="row">

                                                    <div class="col-12 placeholder-glow p-0">
                                                        <div class="placeholder bg-dark col-12" style="height: 55vh; width: 100%;">

                                                        </div>
                                                    </div>

                                                </div>
                                            </div>

                                        </div>

                                    <?php

                                }
                            } else {
                                $cus_data = "";
                                    ?>
                                    <script>
                                        function m() {
                                            alert("Please Login First");
                                            window.location = "home.php";
                                        }
                                        m();
                                    </script>
                                <?php
                            }


                                ?>
                                    </div>
                                </div>

                                <div class="col-12 mt-5 ">
                                    <div class="row">



                                        <div class="col-12 bg-dark mt-3 mb-3 ">
                                            <div class="row">

                                                <div class="col-12 col-md-6 col-lg-4">
                                                    <div class="row text-start">
                                                        <h1 class="fw-bold text-warning mt-2 mb-2">Transaction History <i class="bi bi-clock-history  fs-1 text-warning"></i></h1>
                                                    </div>
                                                </div>

                                                <div class="col-12 col-md-4 col-lg-5 offset-md-0 offset-lg-0">

                                                    <div class="input-group mt-3 mb-3">

                                                        <input type="text" class="form-control" aria-label="Text input with dropdown button" id="t">

                                                    </div>

                                                </div>
                                                <div class="col-2 offset-5 col-md-1 col-lg-1 offset-md-0 offset-lg-0">
                                                    <div class="row">
                                                        <div class="col-12 d-grid">
                                                            <button class="btn btn-primary   mt-3 mb-3" onclick="orderSearch();">Search</button>
                                                        </div>

                                                    </div>
                                                </div>




                                            </div>
                                        </div>

                                        <div class="col-12 text-white">
                                            <div class="row">
                                                <nav aria-label="breadcrumb">
                                                    <ol class="breadcrumb">
                                                        <li class="breadcrumb-item"><a href="home.php">Home</a></li>
                                                        <li class="breadcrumb-item active text-white" aria-current="page">Orders</li>
                                                    </ol>
                                                </nav>
                                            </div>
                                        </div>


                                        <div class="col-12">
                                            <hr class="border-1 mb-5 text-white ">
                                        </div>



                                        <div class="col-12" id="orderSearchResult">
                                            <div class="row">

                                                <div class="col-10 offset-1  mt-4">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="row">

                                                                <?php



                                                                if ($cus_data == "") {

                                                                ?>


                                                                    <div class="col-12 col-lg-12 mb-5 text-center">

                                                                        <div class="col-12 text-white">
                                                                            <span class="col-12 fw-bold"><i class="bi bi-clock-history text-warning" style="font-size: 200px;"></i></span>
                                                                        </div>
                                                                        <div class="col-12">
                                                                            <h1 class="text-warning">Please Login First.</h1>
                                                                        </div>
                                                                        <div class="col-10 offset-1 col-md-6 offset-md-3 col-lg-6 offset-lg-3 d-grid text-white mt-5 mb-3">
                                                                            <button class=" btn btn-outline-primary fs-3" style="height: 50px;" onclick="window.location='index.php'">Login</button>
                                                                        </div>

                                                                    </div>


                                                                    <?php


                                                                } else {


                                                                    $irs = Database::search("SELECT * FROM  `invoice` WHERE `customer_id`='" . $cus_data["id"] . "' AND `order_status_id`!='8' ");


                                                                    if ($irs->num_rows == 0) {
                                                                    ?>


                                                                        <div class="col-12 col-lg-12 mb-5 text-center">

                                                                            <div class="col-12 text-white">
                                                                                <span class="col-12 fw-bold"><i class="bi bi-clock-history text-warning" style="font-size: 200px;"></i></span>
                                                                            </div>
                                                                            <div class="col-12">
                                                                                <h1 class="text-warning">No Orders You Have Yet.</h1>
                                                                            </div>
                                                                            <div class="col-10 offset-1 col-md-6 offset-md-3 col-lg-6 offset-lg-3 d-grid text-white mt-5 mb-3">
                                                                                <button class=" btn btn-outline-primary fs-3" style="height: 50px;" onclick="window.location='shop.php'">Start Shopping</button>
                                                                            </div>

                                                                        </div>


                                                                        <?php
                                                                    } else {



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
                                                                    }
                                                                }


                                                                ?>





                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>



                                            </div>
                                        </div>




                                    </div>

                                    <div class="col-12">
                                        <div class="row">
                                            <?php include "footer.php";       ?>
                                        </div>
                                    </div>


                                </div>
                            </div>

                            <script src="script.js"></script>
                            <script src="bootstrap.js"></script>
                            <script src="bootstrap.bundle.js"></script>

</body>

</html>