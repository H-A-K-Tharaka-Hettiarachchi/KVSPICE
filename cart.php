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

                                                <div class="col-12 col-md-2 col-lg-2">
                                                    <div class="row text-start">
                                                        <h1 class="fw-bold text-warning mt-2 mb-2">Cart <i class="bi bi-cart3 fs-1 text-warning"></i></h1>
                                                    </div>
                                                </div>

                                                <div class="col-12 col-md-8 col-lg-5 offset-md-0 offset-lg-0">

                                                    <div class="input-group mt-3 mb-3">

                                                        <input type="text" class="form-control" aria-label="Text input with dropdown button" id="cst">

                                                    </div>

                                                </div>
                                                <div class="col-2 offset-5 col-md-1 col-lg-1 offset-md-0 offset-lg-0">
                                                    <div class="row">
                                                        <div class="col-12 d-grid">
                                                            <button class="btn btn-primary   mt-3 mb-3" onclick="cartSearch();">Search</button>
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
                                                        <li class="breadcrumb-item active text-white" aria-current="page">Cart</li>
                                                    </ol>
                                                </nav>
                                            </div>
                                        </div>


                                        <div class="col-12">
                                            <hr class="border-1 mb-5 text-white ">
                                        </div>



                                        <div class="col-12" id="cartSearchResult">
                                            <div class="row">

                                                <div class="col-10 offset-1 col-md-10 offset-md-1 col-lg-8 offset-lg-0 mt-4">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <div class="row">

                                                                <?php



                                                                if ($cus_data == "") {

                                                                ?>


                                                                    <div class="col-12 col-lg-12 mb-5 text-center">

                                                                        <div class="col-12 text-white">
                                                                            <span class="col-12 fw-bold"><i class="bi bi-cart-x text-warning" style="font-size: 200px;"></i></span>
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


                                                                    $c_rs =   Database::search("SELECT * FROM `cart` INNER JOIN `product` ON `cart`.`product_id`=`product`.`id` WHERE `customer_id`= '" . $cus_data["id"] . "' AND `blo_status_id`='1' AND `product`.`qty`!='0'  ");
                                                                    $order_qty = 0;
                                                                    $order_price = 0;
                                                                    $order_shipping = 0;

                                                                    if ($c_rs->num_rows == 0) {

                                                                    ?>


                                                                        <div class="col-12 col-lg-12 mb-5 text-center">

                                                                            <div class="col-12 text-white">
                                                                                <span class="col-12 fw-bold"><i class="bi bi-cart-plus text-warning" style="font-size: 200px;"></i></span>
                                                                            </div>
                                                                            <div class="col-12">
                                                                                <h1 class="text-warning">No Items You Have Add The Cart Yet.</h1>
                                                                            </div>
                                                                            <div class="col-10 offset-1 col-md-6 offset-md-3 col-lg-6 offset-lg-3 d-grid text-white mt-5 mb-3">
                                                                                <button class=" btn btn-outline-primary fs-3" style="height: 50px;" onclick="window.location='shop.php'">Start Shopping</button>
                                                                            </div>

                                                                        </div>


                                                                        <?php

                                                                    } else {

                                                                        $pdrs = Database::search("SELECT * FROM `product` WHERE `qty`!='0' AND `blo_status_id`='1' ");

                                                                        for ($z = 0; $z < $pdrs->num_rows; $z++) {
                                                                            $pddata = $pdrs->fetch_assoc();
                                                                            $cart_rs =   Database::search("SELECT * FROM `cart`  WHERE `customer_id`= '" . $cus_data["id"] . "' AND `product_id`='" . $pddata["id"] . "' ");


                                                                            for ($x = 0; $x < $cart_rs->num_rows; $x++) {

                                                                                $cart_data = $cart_rs->fetch_assoc();

                                                                                $prs = Database::search("SELECT * FROM `product` WHERE `id`='" . $cart_data["product_id"] . "' AND `blo_status_id`='1' ");

                                                                                $order_qty = $order_qty + $cart_data["qty"];

                                                                                for ($y = 0; $y < $prs->num_rows; $y++) {

                                                                                    $pdata = $prs->fetch_assoc();

                                                                                    $cars = Database::search(" SELECT * FROM `category` WHERE id='" . $pdata["category_id"] . "'");

                                                                                    $irs = Database::search("SELECT * FROM `images` WHERE `product_id`='" . $pdata["id"] . "'");

                                                                                    $idata = $irs->fetch_assoc();
                                                                                    $cadata = $cars->fetch_assoc();

                                                                                    $order_price = $order_price + ($pdata["price"] * $cart_data["qty"]);
                                                                                    $order_shipping = $order_shipping + $pdata["delivery_fee"];


                                                                        ?>

                                                                                    <div class="col-12 offset-0 col-md-12 col-lg-12 offset-md-0 offset-lg-0 bg-dark rounded-4 border border-1 border-warning mt-3 mb-3">
                                                                                        <div class="row">

                                                                                            <div class="col-10 offset-1 col-md-5 offset-md-0 col-lg-4 col-xl-3 pt-2 pb-2 ">
                                                                                                <img src="<?php echo $idata["path"]; ?>" class="card-img-top img-thumbnail rounded-3 bg-dark border-2 border-start-0 border-end-0 border-bottom-0 border-top-0 border-warning " style="height: 180px;">
                                                                                            </div>

                                                                                            <div class="col-12 offset-0 col-md-12 offset-md-0 col-lg-8 offset-lg-0 col-xl-9 ">
                                                                                                <div class="row">
                                                                                                    <div class="col-12">
                                                                                                        <div class="row">
                                                                                                            <div class="col-12 col-md-8 col-lg-12 col-xl-6">
                                                                                                                <div class="row">
                                                                                                                    <div class="col-12 text-center mt-2 mb-2">
                                                                                                                        <div class="col-12 offset-0 text-start">


                                                                                                                            <div class="col-12 mb-3 mt-3">
                                                                                                                                <h3 class="text-white "><?php echo $pdata["title"]; ?></h3>
                                                                                                                            </div>

                                                                                                                            <div class="col-12">
                                                                                                                                <div class="row">
                                                                                                                                    <div class="col-5">
                                                                                                                                        <h5 class="text-white">Price :</h5>
                                                                                                                                    </div>
                                                                                                                                    <div class="col-7">
                                                                                                                                        <h5 class="text-white"> Rs.<?php echo $pdata["price"]; ?>.00</h5>
                                                                                                                                    </div>
                                                                                                                                </div>
                                                                                                                            </div>
                                                                                                                            <div class="col-12">
                                                                                                                                <div class="row">
                                                                                                                                    <div class="col-5">
                                                                                                                                        <h5 class="text-white">Delivery Fee :</h5>
                                                                                                                                    </div>
                                                                                                                                    <div class="col-7">
                                                                                                                                        <h5 class="text-white"> Rs.<?php echo $pdata["delivery_fee"]; ?>.00</h5>
                                                                                                                                    </div>
                                                                                                                                </div>
                                                                                                                            </div>
                                                                                                                            <div class="col-12">
                                                                                                                                <div class="row">
                                                                                                                                    <div class="col-5">
                                                                                                                                        <h5 class="text-white">Quantity :</h5>
                                                                                                                                    </div>
                                                                                                                                    <div class="col-7">
                                                                                                                                        <input type="number" value="<?php echo $cart_data["qty"]; ?>" min="1" class="form-control">
                                                                                                                                    </div>
                                                                                                                                </div>
                                                                                                                            </div>
                                                                                                                            <div class="col-12">
                                                                                                                                <div class="row">
                                                                                                                                    <div class="col-12">
                                                                                                                                        <a class="card-text">-<?php echo $cadata["category"]; ?>-</a>
                                                                                                                                    </div>
                                                                                                                                </div>
                                                                                                                            </div>



                                                                                                                        </div>
                                                                                                                    </div>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                            <div class="col-12 col-md-4 col-lg-12 col-xl-6">
                                                                                                                <div class="row">
                                                                                                                    <div class="col-12">

                                                                                                                        <div class="row">
                                                                                                                            <div class="col-12 d-grid mb-5 mt-5">
                                                                                                                                <?php

                                                                                                                                if ($pdata["qty"] > 0) {
                                                                                                                                ?>
                                                                                                                                    <a class="btn btn-success" href="<?php echo "singleProductView.php?id=" . $pdata["id"]; ?>">Buy Now</a>
                                                                                                                                <?php
                                                                                                                                } else {
                                                                                                                                ?>
                                                                                                                                    <a class="btn btn-success disabled" href="<?php echo "singleProductView.php?id=" . $pdata["id"]; ?>">Buy Now</a>
                                                                                                                                <?php
                                                                                                                                }

                                                                                                                                ?>

                                                                                                                            </div>
                                                                                                                            <div class=" col-12 d-grid mb-5">
                                                                                                                                <button class="btn btn-danger" onclick="removeFromCart('<?php echo $pdata['id']; ?>');">Remove From Cart</button>
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

                                                                <?php



                                                                                }
                                                                            }
                                                                        }
                                                                    }
                                                                }


                                                                ?>





                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <?php

                                                if ($cus_data == "" || $c_rs->num_rows == 0) {

                                                ?>


                                                    <div class="col-10 offset-1 col-md-10 col-lg-4 offset-md-1 offset-lg-0 mt-4">
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <div class="row">

                                                                    <div class="col-12 col-lg-10 offset-lg-1 bg-dark mb-5 rounded-4">

                                                                        <div class="text-white fs-4 text-center">ORDER SUMMARY</div>
                                                                        <hr class="text-white">

                                                                        <div class="col-12 card-group ">
                                                                            <div class="text-white fs-5 col-6 ">Sub Total</div>
                                                                            <div class="text-white fs-6 col-6 ">Rs. 00 .00</div>
                                                                        </div>
                                                                        <hr class="text-white">
                                                                        <hr class="text-white">
                                                                        <div class="col-12 card-group">
                                                                            <div class="text-white fs-5 col-6 mt-2">Shipping</div>
                                                                            <div class="text-white fs-6 col-6 mt-2">Rs. 00 .00</div>
                                                                        </div>
                                                                        <!-- <hr class="text-white">
                                                                        <hr class="text-white">
                                                                        <div class="col-12 card-group">
                                                                            <div class="text-white fs-5 col-6">Service Tax</div>
                                                                            <div class="text-white fs-6 col-6">Rs. 00 .00</div>
                                                                        </div> -->
                                                                        <hr class="text-white">
                                                                        <hr class="text-white">
                                                                        <div class="col-12 card-group">
                                                                            <div class="text-white fs-5 col-6">Offer</div>
                                                                            <div class="text-white fs-6 col-6">Rs. 00 .00</div>
                                                                        </div>
                                                                        <hr class="text-white">
                                                                        <hr class="text-white">
                                                                        <div class="col-12 card-group">
                                                                            <div class="text-white fs-5 col-6">Total</div>
                                                                            <div class="text-white fs-6 col-6">Rs. 00 .00</div>
                                                                        </div>
                                                                        <hr class="text-white">
                                                                        <hr class="text-white">
                                                                        <div class="col-12 card-group mb-3">
                                                                            <div class="text-white col-12 d-grid"><button class="btn btn-outline-warning  fs-5">Check Out</button></div>
                                                                        </div>

                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>


                                                <?php


                                                } else {
                                                ?>

                                                    <div class="col-10 offset-1 col-md-10 col-lg-4 offset-md-1 offset-lg-0 mt-4">
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <div class="row">

                                                                    <div class="col-12 col-lg-10 offset-lg-1 bg-dark mb-5 rounded-4">

                                                                        <div class="text-white fs-4 text-center">ORDER SUMMARY</div>
                                                                        <hr class="text-white">

                                                                        <div class="col-12 card-group ">
                                                                            <div class="text-white fs-5 col-6 ">Sub Total</div>
                                                                            <div class="text-white fs-6 col-6 ">Rs. <?php echo $order_price; ?> .00</div>
                                                                        </div>
                                                                        <hr class="text-white">
                                                                        <hr class="text-white">
                                                                        <div class="col-12 card-group">
                                                                            <div class="text-white fs-5 col-6 mt-2">Shipping</div>
                                                                            <div class="text-white fs-6 col-6 mt-2">Rs. <?php echo $order_shipping; ?> .00</div>
                                                                        </div>
                                                                        <!-- <hr class="text-white">
                                                                        <hr class="text-white">
                                                                        <div class="col-12 card-group">
                                                                            <div class="text-white fs-5 col-6">Service Tax</div>
                                                                            <div class="text-white fs-6 col-6">Rs. <?php //echo $order_shipping * 10 / 100; 
                                                                                                                    ?></div>
                                                                        </div> -->
                                                                        <hr class="text-white">
                                                                        <hr class="text-white">
                                                                        <div class="col-12 card-group">
                                                                            <div class="text-white fs-5 col-6">Offer</div>
                                                                            <div class="text-white fs-6 col-5">Rs. <?php echo (($order_price) + $order_shipping) * 5 / 100; ?></div>
                                                                            <div class=" text-decoration-line-through fs-5 text-danger col-1"> -5%</div>

                                                                        </div>
                                                                        <hr class="text-white">
                                                                        <hr class="text-white">
                                                                        <div class="col-12 card-group">
                                                                            <div class="text-white fs-5 col-6">Total</div>
                                                                            <div class="text-white fs-6 col-6">Rs. <?php echo (((($order_price) + $order_shipping))) - (((($order_price) + $order_shipping)) * 5 / 100) ?></div>
                                                                        </div>
                                                                        <hr class="text-white">
                                                                        <hr class="text-white">
                                                                        <div class="col-12 card-group mb-3">
                                                                            <div class="text-white col-12 d-grid"><button class="btn btn-outline-warning  fs-5" onclick="checkout('<?php echo $cus_data['id']; ?>');">Check Out</button></div>
                                                                        </div>

                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                <?php
                                                }


                                                ?>





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
                </div>
            </div>
        </div>
    </div>



    <script src="script.js"></script>
    <script src="bootstrap.js"></script>
    <script src="bootstrap.bundle.js"></script>
    <script type="text/javascript" src="https://www.payhere.lk/lib/payhere.js"></script>s

</body>

</html>