<?php

session_start();
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
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">


    <link rel="icon" href="resources/kv.png">

</head>

<body class="bg-black">

    <div class="container-fluid">
        <div class="row">
            <div class=" col-12">
                <div class="row">

                    <div class=" col-12">
                        <div class="row">





                            <div class=" col-12  text-center mt-3">
                                <div class="row">

                                    <div class="col-12 mb-5">
                                        <div class="row">
                                            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                                                <a class="navbar-brand fs-4 cursor" href="adminPanel.php">KV SPICE</a>
                                                <a class="navbar-brand fs-5 cursor" href="adminPanel.php"> Admin Panel</a>

                                                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                                                    <span class="navbar-toggler-icon"></span>
                                                </button>
                                                <div class="collapse navbar-collapse" id="navbarNav">
                                                    <ul class="navbar-nav ml-auto">
                                                        <li class="nav-item">
                                                            <a class="nav-link fs-5" href="adminPanel.php">Dashboard</a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link fs-5" href="product.php">Products</a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link fs-5" href="customers.php">Customers</a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link fs-5" href="recentProducts.php">Recent Products</a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link fs-5" href="chat.php?key=a">chat</a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link fs-5" href="adminProfile.php">
                                                                <i class="fas fa-user fs-5"></i>
                                                                Account
                                                            </a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link fs-5" href="#" onclick="adminLogOut();">
                                                                <i class="fas fa-sign-out-alt fs-5"></i>
                                                                Logout
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </nav>
                                        </div>
                                    </div>


                                </div>
                            </div>


                        </div>
                    </div>







                    <div class="col-12">
                        <div class="row">

                            <div class="col-12 col-md-3 col-lg-3 col-xl-2">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="row">

                                            <div class="col-12 rounded rounded-3 border border-1 border-warning">
                                                <div class="row">

                                                    <?php

                                                    if (isset($_SESSION["admin"])) {
                                                    ?>
                                                        <div class="col-12 mt-5 text-center bg-dark">
                                                            <h4 class="text-white mb-3 mt-3"> WELCOME</h4>
                                                            <p class="text-white fs-4"> <?php echo $_SESSION["admin"]["fname"] . " " . $_SESSION["admin"]["lname"]; ?></p>
                                                        </div>
                                                    <?php
                                                    } else {
                                                    ?>
                                                        <div class="col-12 mt-5 text-center bg-dark" onclick="window.location='adminSignIn.php'">
                                                            <p class="text-white mb-3 mt-3 fs-4 text-decoration-underline cursor">Sign In Admin</p>
                                                        </div>
                                                    <?php
                                                    }

                                                    ?>

                                                    <div class="col-6 col-md-12 col-lg-12 mt-5 d-grid mb-5">
                                                        <button class="btn btn-success fs-5" onclick="window.location='addProduct.php'"><i class="bi bi-plus fs-3"></i> Add Product</button>
                                                    </div>

                                                    <div class="col-6 col-md-12 col-lg-12 mt-5 d-grid mb-5">
                                                        <button class="btn btn-warning fs-5" onclick="window.location='manageOrders.php'"><i class="bi bi-kanban fs-3"></i> Manage Oders</button>
                                                    </div>

                                                    <div class="col-6 col-md-12 col-lg-12 mt-5 d-grid mb-5">
                                                        <button class="btn btn-info fs-5" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="bi bi-bookmark-plus fs-3"></i> Add Category</button>
                                                    </div>

                                                    <div class="col-6 col-md-12 col-lg-12 mt-5 d-grid mb-5">
                                                        <button class="btn btn-primary fs-5" onclick="window.location='adminProfile.php'"><i class="bi bi-person-fill fs-4"></i> Profile</button>
                                                    </div>

                                                    <div class="col-6 col-md-10 offset-md-1 offset-3 offset-md-0 offset-lg-3 col-lg-6 mt-5 d-grid mb-5">
                                                        <button class="btn btn-danger fs-5" onclick="adminLogOut();"><i class="bi bi-box-arrow-right fs-4"></i> Log Out</button>
                                                    </div>

                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>






                            <!-- Modal -->
                            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content bg-dark">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5 text-white" id="staticBackdropLabel">Category</h1>
                                            <button type="button" class="btn-close bg-white" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="col-12">
                                                <div class="row">

                                                    <div class="col-12 mt-3 mb-3">
                                                        <input type="text" class="form-control" placeholder="Type Category Name" id="t">
                                                    </div>

                                                    <div class="col-12" id="categoryResult">
                                                        <div class="row">
                                                            <?php

                                                            $category_rs = Database::search("SELECT * FROM `category`");

                                                            for ($z = 0; $z < $category_rs->num_rows; $z++) {

                                                                $category_data = $category_rs->fetch_assoc();

                                                            ?>

                                                                <div class="col-3 offset-2 bg-ash text-center mt-3 mb-3 rounded rounded-2">
                                                                    <p class="text-warning fs-5 mt-2 mb-2"><?php echo $category_data["category"];
                                                                                                            ?></p>
                                                                </div>

                                                            <?php
                                                            }
                                                            ?>
                                                        </div>
                                                    </div>



                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary" onclick="addNewCategory();">Add New Category</button>
                                        </div>
                                    </div>
                                </div>
                            </div>








                            <div class="col-12 col-md-7 col-lg-7 col-xl-9 offset-xl-1 offset-0 offset-md-1 offset-lg-1">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="row">


                                            <div class="col-12 rounded rounded-3 border border-1 border-warning">
                                                <div class="row">

                                                    <?php

                                                    $d = new DateTime();
                                                    $tz = new DateTimeZone("Asia/Colombo");
                                                    $d->setTimezone($tz);
                                                    $date = $d->format("Y-m-d H:i:s");

                                                    $today = $d->format("Y-m-d");

                                                    $totalSellings = 0;
                                                    $todaySellings = 0;
                                                    $totalProducts = 0;
                                                    $assets = 0;
                                                    $todayIncome = 0;
                                                    $customers = 0;


                                                    $order_rs = Database::search("SELECT * FROM `order`");
                                                    $totalSellings = $totalSellings + $order_rs->num_rows;

                                                    $invoice_rs = Database::search("SELECT * FROM `invoice` WHERE `date_time` LIKE '" . $today . "%' ");
                                                    $todaySellings = $todaySellings + $invoice_rs->num_rows;

                                                    $product_rs = Database::search("SELECT * FROM `product`");
                                                    $totalProducts = $totalProducts + $product_rs->num_rows;

                                                    for ($x = 0; $x < $order_rs->num_rows; $x++) {

                                                        $order_data = $order_rs->fetch_assoc();

                                                        $assets = $assets + $order_data["total"];
                                                    }

                                                    for ($y = 0; $y < $invoice_rs->num_rows; $y++) {

                                                        $invoice_data = $invoice_rs->fetch_assoc();

                                                        $todayIncome = $todayIncome + $invoice_data["total"];
                                                    }

                                                    $customer_rs = Database::search("SELECT * FROM `customer`");
                                                    $customers = $customers + $customer_rs->num_rows;


                                                    ?>

                                                    <div class="col-12 mt-5 mb-5">
                                                        <div class="row g-1">

                                                            <div class="col-6 col-xl-4 px-4 mt-3 mb-3 ">
                                                                <div class="row g-1">
                                                                    <div class="col-12  text-white text-center  bg-dark rounded rounded-5 ">
                                                                        <p class="fs-4">TOTAL SELLINGS</p>
                                                                        <p class="fs-5"> <?php echo $totalSellings; ?> Items</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-6 col-xl-4 px-4 mt-3 mb-3">
                                                                <div class="row g-1">
                                                                    <div class="col-12  text-center  bg-light rounded rounded-5">
                                                                        <p class="fs-4">TODAY SELLINGS</p>
                                                                        <p class="fs-5"> <?php echo $todaySellings; ?> Items</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-6 col-xl-4 px-4 mt-3 mb-3">
                                                                <div class="row g-1">
                                                                    <div class="col-12 text-white text-center  bg-success  rounded rounded-5">
                                                                        <p class="fs-4">TOTAL PRODUCTS</p>
                                                                        <p class="fs-5"> <?php echo $totalProducts; ?> Products</p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-6 col-xl-4 px-4  mt-3 mb-3  ">
                                                                <div class="row g-1">
                                                                    <div class="col-12 text-white text-center bg-primary  rounded rounded-5">
                                                                        <p class="fs-4">ASSETS</p>
                                                                        <p class="fs-5">RS. <?php echo $assets; ?></p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-6 col-xl-4 px-4  mt-3 mb-3  ">
                                                                <div class="row g-1">
                                                                    <div class="col-12 text-white text-center bg-secondary  rounded rounded-5">
                                                                        <p class="fs-4">TODAY INCOME</p>
                                                                        <p class="fs-5"> RS. <?php echo $todayIncome; ?></p>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-6 col-xl-4 px-4  mt-3 mb-3  ">
                                                                <div class="row g-1">
                                                                    <div class="col-12 text-white text-center bg-info  rounded rounded-5">
                                                                        <p class="fs-4">CUSTOMERS</p>
                                                                        <p class="fs-5"> <?php echo $customers; ?> Customers</p>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>




                                                    <div class="col-12">
                                                        <div class="row">

                                                            <div class="col-10 offset-1 col-xl-4 offset-xl-0 px-4 mt-3 mb-5">
                                                                <div class="row">
                                                                    <div class="col-12">
                                                                        <div class="row">

                                                                            <?php

                                                                            $wrs =  Database::search("SELECT `product_id`,COUNT(`product_id`) AS `value_occurence` 
                                                                                         FROM `watchlist`  GROUP BY `product_id` 
                                                                                          ORDER BY `value_occurence` DESC LIMIT 1");

                                                                            $wdata = $wrs->fetch_assoc();

                                                                            if ($wrs->num_rows == 0) {

                                                                            ?>

                                                                                <!-- <div class="col-8 mb-3 offset-2   col-md-4 offset-md-0   col-lg-3 offset-lg-0 col-xl-2 offset-xl-0"> -->
                                                                                <div class="card h-100 text-center border-warning border-2 text-white bg-black">
                                                                                    <p class="fs-4 text-decoration-underline">Most Favourite Product</p>
                                                                                    <!-- <img src="" class="card-img-top img-thumbnail bg-black border-2 border-start-0 border-end-0 border-top-0 border-warning " style="height: 250px;"> -->
                                                                                    <i class="bi bi-box-seam-fill text-warning" style="font-size: 168px;"></i>
                                                                                    <div class="card-body">
                                                                                        <h5 class="card-title">------------</h5>
                                                                                        <p><b class="text-warning">-- -------</b></p>
                                                                                        <h5>--- Items Avalable</h5>
                                                                                        <h5 class="card-title">Rs.-------.00</h5>
                                                                                        <a class="card-text">- ------ -</a>
                                                                                    </div>

                                                                                </div>

                                                                            <?php

                                                                            } else {

                                                                                $prs =  Database::search("SELECT * FROM `product` WHERE `id`='" . $wdata["product_id"] . "' ");

                                                                                $pdata = $prs->fetch_assoc();

                                                                                $cars = Database::search(" SELECT * FROM `category` WHERE id='" . $pdata["category_id"] . "'");
                                                                                $irs = Database::search("SELECT * FROM `images` WHERE product_id='" . $pdata["id"] . "'");

                                                                                $cadata = $cars->fetch_assoc();
                                                                                $idata = $irs->fetch_assoc();



                                                                            ?>

                                                                                <!-- <div class="col-8 mb-3 offset-2   col-md-4 offset-md-0   col-lg-3 offset-lg-0 col-xl-2 offset-xl-0"> -->
                                                                                <div class="card h-100 text-center border-warning border-2 text-white bg-black">
                                                                                    <p class="fs-4 text-decoration-underline">Most Favourite Product</p>
                                                                                    <img src="<?php echo $idata["path"]; ?>" class="card-img-top img-thumbnail bg-black border-2 border-start-0 border-end-0 border-top-0 border-warning " style="height: 250px;">
                                                                                    <div class="card-body">
                                                                                        <h5 class="card-title"><?php echo $pdata["title"]; ?></h5>

                                                                                        <?php

                                                                                        if ($pdata["qty"] > 0) {
                                                                                        ?>
                                                                                            <p><b class="text-warning">IN Stock</b></p>
                                                                                        <?php
                                                                                        } else {
                                                                                        ?>
                                                                                            <p><b class="text-danger">Out Of Stock</b></p>
                                                                                        <?php
                                                                                        }

                                                                                        ?>
                                                                                        <h5><?php echo $pdata["qty"]; ?> Items Avalable</h5>
                                                                                        <h5 class="card-title">Rs.<?php echo $pdata["price"]; ?>.00</h5>
                                                                                        <a class="card-text">-<?php echo $cadata["category"]; ?>-</a>
                                                                                    </div>

                                                                                </div>
                                                                                <!-- </div> -->
                                                                            <?php

                                                                            }
                                                                            ?>



                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-10 offset-1 col-xl-4 offset-xl-0 mt-3 mb-5">
                                                                <div class="row">
                                                                    <div class="col-12">
                                                                        <div class="row">

                                                                            <?php

                                                                            $wrs =  Database::search("SELECT `product_id`,COUNT(`product_id`) AS `value_occurence` 
                                                                                         FROM `order`  GROUP BY `product_id` 
                                                                                          ORDER BY `value_occurence` DESC LIMIT 1");

                                                                            $wdata = $wrs->fetch_assoc();

                                                                            if ($wrs->num_rows == 0) {

                                                                            ?>

                                                                                <!-- <div class="col-8 mb-3 offset-2   col-md-4 offset-md-0   col-lg-3 offset-lg-0 col-xl-2 offset-xl-0"> -->
                                                                                <div class="card h-100 text-center border-warning border-2 text-white bg-black">
                                                                                    <p class="fs-4 text-decoration-underline">Most Sold Product</p>
                                                                                    <!-- <img src="" class="card-img-top img-thumbnail bg-black border-2 border-start-0 border-end-0 border-top-0 border-warning " style="height: 250px;"> -->
                                                                                    <i class="bi bi-boxes text-warning" style="font-size: 168px;"></i>
                                                                                    <div class="card-body">
                                                                                        <h5 class="card-title">------------</h5>
                                                                                        <p><b class="text-warning">-- -------</b></p>
                                                                                        <h5>--- Items Avalable</h5>
                                                                                        <h5 class="card-title">Rs.-------.00</h5>
                                                                                        <a class="card-text">- ------ -</a>
                                                                                    </div>

                                                                                </div>

                                                                            <?php

                                                                            } else {

                                                                                $prs =  Database::search("SELECT * FROM `product` WHERE `id`='" . $wdata["product_id"] . "' ");

                                                                                $pdata = $prs->fetch_assoc();

                                                                                $cars = Database::search(" SELECT * FROM `category` WHERE id='" . $pdata["category_id"] . "'");
                                                                                $irs = Database::search("SELECT * FROM `images` WHERE product_id='" . $pdata["id"] . "'");

                                                                                $cadata = $cars->fetch_assoc();
                                                                                $idata = $irs->fetch_assoc();



                                                                            ?>

                                                                                <!-- <div class="col-8 mb-3 offset-2   col-md-4 offset-md-0   col-lg-3 offset-lg-0 col-xl-2 offset-xl-0"> -->
                                                                                <div class="card h-100 text-center border-warning border-2 text-white bg-black">
                                                                                    <p class="fs-4 text-decoration-underline">Most Sold Product</p>
                                                                                    <img src="<?php echo $idata["path"]; ?>" class="card-img-top img-thumbnail bg-black border-2 border-start-0 border-end-0 border-top-0 border-warning " style="height: 250px;">
                                                                                    <div class="card-body">
                                                                                        <h5 class="card-title"><?php echo $pdata["title"]; ?></h5>

                                                                                        <?php

                                                                                        if ($pdata["qty"] > 0) {
                                                                                        ?>
                                                                                            <p><b class="text-warning">IN Stock</b></p>
                                                                                        <?php
                                                                                        } else {
                                                                                        ?>
                                                                                            <p><b class="text-danger">Out Of Stock</b></p>
                                                                                        <?php
                                                                                        }

                                                                                        ?>
                                                                                        <h5><?php echo $pdata["qty"]; ?> Items Avalable</h5>
                                                                                        <h5 class="card-title">Rs.<?php echo $pdata["price"]; ?>.00</h5>
                                                                                        <a class="card-text">-<?php echo $cadata["category"]; ?>-</a>
                                                                                    </div>

                                                                                </div>
                                                                                <!-- </div> -->
                                                                            <?php

                                                                            }
                                                                            ?>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-10 offset-1 col-xl-4 offset-xl-0 px-4 mt-3 mb-5">
                                                                <div class="row">
                                                                    <div class="col-12">
                                                                        <div class="row">

                                                                            <?php

                                                                            $irs =  Database::search("SELECT `customer_id`,COUNT(`customer_id`) AS `value_occurence` 
                                                                                         FROM `invoice`  GROUP BY `customer_id` 
                                                                                          ORDER BY `value_occurence` DESC LIMIT 1");

                                                                            $idata = $irs->fetch_assoc();

                                                                            if ($irs->num_rows == 0) {

                                                                            ?>

                                                                                <!-- <div class="col-8 mb-3 offset-2   col-md-4 offset-md-0   col-lg-3 offset-lg-0 col-xl-2 offset-xl-0"> -->
                                                                                <div class="card h-100 text-center border-warning border-2 text-white bg-black">
                                                                                    <p class="fs-4 text-decoration-underline">Most Best Customer</p>
                                                                                    <!-- <img src="" class="card-img-top img-thumbnail bg-black border-2 border-start-0 border-end-0 border-top-0 border-warning " style="height: 250px;"> -->
                                                                                    <i class="bi bi-person-rolodex text-warning" style="font-size: 168px;"></i>
                                                                                    <div class="card-body">
                                                                                        <h5 class="card-title">------- -------</h5>
                                                                                        <p><b class="text-warning">---------@-----.---</b></p>
                                                                                        <h5>+94 00 0000000</h5>
                                                                                        <h5 class="card-title">---/---/--,------- -------</h5>
                                                                                        <a class="card-text">- ------ -</a>
                                                                                    </div>

                                                                                </div>

                                                                            <?php

                                                                            } else {



                                                                                $crs = Database::search(" SELECT * FROM `customer` WHERE id='" . $idata["customer_id"] . "'");
                                                                                $cdata = $crs->fetch_assoc();
                                                                                $grs = Database::search(" SELECT * FROM `gender` WHERE id='" . $cdata["gender_id"] . "'");
                                                                                $gdata = $grs->fetch_assoc();





                                                                            ?>

                                                                                <!-- <div class="col-8 mb-3 offset-2   col-md-4 offset-md-0   col-lg-3 offset-lg-0 col-xl-2 offset-xl-0"> -->
                                                                                <div class="card h-100 text-center border-warning border-2 text-white bg-black">
                                                                                    <p class="fs-4 text-decoration-underline">Most Best Customer</p>

                                                                                    <?php
                                                                                    if ($cdata["image"] == null) {
                                                                                    ?>
                                                                                        <i class="bi bi-person-rolodex text-warning" style="font-size: 168px;"></i>
                                                                                    <?php
                                                                                    } else {
                                                                                    ?>
                                                                                        <div class="col-8 offset-2" style="height: 250px;">
                                                                                            <img src="<?php echo $cdata["image"]; ?>" class="card-img-top rounded-circle bg-black border-2 border-start-0 border-end-0 border-top-0 border-warning " style="height: 250px;">
                                                                                        </div>
                                                                                    <?php
                                                                                    }
                                                                                    ?>


                                                                                    <div class="card-body">
                                                                                        <h5 class="card-title"><?php echo $cdata["fname"] . " " . $cdata["lname"]; ?></h5>
                                                                                        <p><b class="text-warning"><?php echo $cdata["email"]; ?></b></p>
                                                                                        <h5><?php echo $cdata["mobile"]; ?></h5>
                                                                                        <h5 class="card-title"><?php echo $cdata["address"]; ?></h5>
                                                                                        <a class="card-text">- <?php echo $gdata["gender"]; ?> -</a>
                                                                                    </div>

                                                                                </div>
                                                                                <!-- </div> -->
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
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>




                </div>
            </div>
        </div>
    </div>


    <script src="script.js"></script>
    <script src="bootstrap.js"></script>
    <script src="bootstrap.bundle.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>