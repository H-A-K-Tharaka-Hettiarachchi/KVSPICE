<?php

require "connection.php";

session_start();

if (isset($_SESSION["cus"])) {

    $cus = $_SESSION["cus"];




    $txt = $_POST["t"];


    $query = "SELECT `product`.`id`,`title`,`description`,`cart`.`qty`,`price`,`category_id`, `cart`.`id` AS `cart_id`,`cart`.`product_id`,`cart`.`customer_id` FROM `product` INNER JOIN `cart`  ON `product`.`id`=`cart`.`product_id`  WHERE `cart`.`customer_id`='" . $cus["id"] . "' ";

    if (!empty($txt)) {
        $query .= " AND `product`.`title` LIKE '%" . $txt . "%'";
    }
?>
    <div class="row">

        <div class="col-10 offset-1 col-md-10 offset-md-1 col-lg-8 offset-lg-0 mt-4">

            <div class="row">
                <div class="col-12 ">
                    <div class="row">

                        <?php

                        if ($query == "SELECT `product`.`id`,`title`,`description`,`cart`.`qty`,`price`,`category_id`, `cart`.`id` AS `cart_id`,`cart`.`product_id`,`cart`.`customer_id` FROM `product` INNER JOIN `cart`  ON `product`.`id`=`cart`.`product_id`  WHERE `cart`.`customer_id`='" . $cus["id"] . "' ") {

                            $query .= " AND `blo_status_id`='1'";
                        } else {

                            $query .= " AND `blo_status_id`='1'";
                        }

                        $selected_rs =  Database::search($query);


                        if ($selected_rs->num_rows == 0) {

                        ?>


                            <div class="col-12 col-lg-12 mb-5 text-center">

                                <div class="col-12 text-white">
                                    <span class="col-12 fw-bold"><i class="bi bi-cart-x text-warning" style="font-size: 200px;"></i></span>
                                </div>
                                <div class="col-12">
                                    <h1 class="text-warning">No Items You Have Search The Cart Yet.</h1>
                                </div>

                            </div>


                            <?php



                        } else {




                            for ($x = 0; $x < $selected_rs->num_rows; $x++) {



                                $pdata = $selected_rs->fetch_assoc();

                                // $cart_rs =   Database::search("SELECT * FROM `cart` WHERE `customer_id`= '" . $cus["id"] . "' AND `product_id`='" . $pdata["id"] . "' ");

                                $cars = Database::search(" SELECT * FROM `category` WHERE id='" . $pdata["category_id"] . "'");
                                $irs = Database::search("SELECT * FROM `images` WHERE product_id='" . $pdata["id"] . "'");

                                $cadata = $cars->fetch_assoc();
                                $idata = $irs->fetch_assoc();
                                // $cart_data = $cart_rs->fetch_assoc();


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
                                                                                    <h5 class="text-white"> Rs.150.00</h5>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-12">
                                                                            <div class="row">
                                                                                <div class="col-5">
                                                                                    <h5 class="text-white">Quantity :</h5>
                                                                                </div>
                                                                                <div class="col-7">
                                                                                    <input type="number" value="<?php echo $pdata["qty"]; ?>" min="1" class="form-control">
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
                                                                            <a class="btn btn-success" href="<?php echo "singleProductView.php?id=" . $pdata["id"]; ?>">Buy Now</a>
                                                                        </div>
                                                                        <div class=" col-12 d-grid mb-5">
                                                                            <button class="btn btn-danger">Remove From Cart</button>
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


                        ?>

                    </div>
                </div>


            </div>

        </div>






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




    </div>



<?php


} else {

    echo ("Please Login First");
}
