<?php

session_start();

require "connection.php";

if (isset($_GET["pid"])) {

    $pid = $_GET["pid"];



    $rs = Database::search("SELECT * FROM `invoice` WHERE `product_id`='" . $pid . "' ");

    if ($rs->num_rows == 0) {
        header("Location:singleProductView.php?id=" . $pid);
    } else {



        $data = $rs->fetch_assoc();

        $crs = Database::search("SELECT * FROM `customer` WHERE `id`='" . $data["customer_id"] . "'");
        $prs = Database::search("SELECT * FROM `product` WHERE `id`='" . $data["product_id"] . "'");

        $pdata = $prs->fetch_assoc();
        $cdata = $crs->fetch_assoc();

?>


        <!DOCTYPE html>
        <html>

        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">


            <title>KV SPICE | Invoice</title>


            <link rel="stylesheet" href="bootstrap.css">
            <link rel="stylesheet" href="style.css">
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
            <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
            <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">

            <link rel="icon" href="resources/kv.png">
        </head>

        <body class="bg-black">

            <div class="container-fluid ">

                <div class="row">

                    <div class="col-12 bg-black">


                        <div class=" col-12 mt-5">
                            <div class=" row">

                                <div class=" bg-dark col-12 btn-toolbar justify-content-end  rounded border border-2 border-dark border-start-0 border-end-0">


                                    <button class=" btn btn-primary me-3 mt-3 mb-3" onclick="printInvoice();"><i class="bi bi-printer-fill"></i>&nbsp; Print</button>

                                    <button class=" btn btn-danger me-3 mt-3 mb-3" onclick="printInvoice();"><i class="bi bi-file-earmark-pdf-fill"></i>&nbsp; Export as PDF</button>

                                </div>

                            </div>
                        </div>



                        <div class=" col-12  mt-5" id="invoice">

                            <div class="row">

                                <div class=" col-lg-10 offset-lg-1 bg-dark rounded rounded-3 mb-5">

                                    <div class=" col-12 ">
                                        <div class="row">
                                            <div class="col-3 bg-warning"></div>
                                            <div class=" col-1 offset-0 text-end">
                                                <div class="logo1 mt-3 text-end mb-3 ms-3"></div>
                                            </div>
                                            <div class="col-3 mt-5 offset-1 ">
                                                <h1 class="text-white fw-bold d-none d-lg-none d-xl-block">INVOICE</h1>
                                            </div>
                                            <div class=" col-4 text-end text-white mt-3">
                                                <span class="me-4 fs-4  text-decoration-underline">KV SPICE</span><br><br>
                                                <span class="me-4">Delgoda Gampaha, Sri Lanka</span><br>
                                                <span class="me-4">kshprime@gmail.com</span><br>
                                                <span class="me-4">kvspice@gmail.com</span><br>
                                                <span class="me-4">+94 76 2206 166</span>
                                            </div>

                                        </div>

                                    </div>


                                    <div class="col-12">
                                        <hr class="border-3  border border-white">
                                    </div>

                                    <div class="col-12 text-white">

                                        <div class="row">

                                            <div class=" col-6">
                                                <h5 class="fw-bold">INVOICE TO : <?php echo $cdata["fname"] . " " . $cdata["lname"]; ?></h5><br>
                                                <span><?php echo $data["address"]; ?></span><br>
                                                <span><?php echo $data["cus_email"]; ?></span><br>
                                                <span><?php echo $cdata["mobile"]; ?></span>
                                            </div>

                                            <div class=" col-6 text-end mt-4">

                                                <h1 class="">INVOICE #0<?php echo $data["id"]; ?></h1>
                                                <span class="fs-5">Date : </span>
                                                <span><?php echo $data["date_time"]; ?></span>

                                            </div>

                                        </div>

                                    </div>


                                    <div class="col-12">
                                        <hr class="border-3  border border-white">
                                    </div>





                                    <div class=" col-12 mt-5 mb-5  ">

                                        <div class="row">


                                            <div class="col-12 border border-3 border-secondary">
                                                <div class="row">
                                                    <div class="col-1  text-white mb-2 mt-2">#</div>
                                                    <div class="col-3 text-center text-white mb-2 mt-2">DESCRIPTION</div>
                                                    <div class="col-2  text-center text-white mb-2 mt-2">QTY</div>
                                                    <div class="col-3 text-end text-white mb-2 mt-2">UNIT PRICE</div>
                                                    <div class="col-3 text-end text-white mb-2 mt-2">TOTAL</div>
                                                </div>
                                            </div>
                                            <div class="col-12 border border-1 border-white border-start-0 border-end-0 border-top-0">
                                                <div class="row">
                                                    <div class="col-1  text-white mb-2 mt-2">0<?php echo $data["id"]; ?></div>
                                                    <div class="col-3 text-center text-white mb-2 mt-2"><?php echo $pdata["title"]; ?></div>
                                                    <div class="col-2  text-center text-white mb-2 mt-2"><?php echo $data["qty"]; ?></div>
                                                    <div class="col-3 text-end text-white mb-2 mt-2">Rs.<?php echo $pdata["price"]; ?></div>
                                                    <div class="col-3 text-end text-white mb-2 mt-2">Rs.<?php echo $pdata["price"] * $data["qty"]; ?></div>
                                                </div>
                                            </div>





                                            <div class="col-12">
                                                <div class="row">
                                                    <div class="col-7 offset-5">
                                                        <div class="row">

                                                            <div class="col-12 border  border-1 border-white border-start-0 border-end-0 border-top-0">
                                                                <div class="row">
                                                                    <div class="col-7 fs-5 fw-bold text-white p-2">
                                                                        SUBTOTAL
                                                                    </div>
                                                                    <div class="col-5 text-end fs-5 text-white p-2">
                                                                        Rs.<?php echo ($pdata["price"] * $data["qty"]) //- (($pdata["price"] * $data["qty"]) * 5 / 100); 
                                                                            ?>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-12 border border-1 border-white border-start-0 border-end-0 border-top-0">
                                                                <div class="row">
                                                                    <div class="col-7 fs-5 fw-bold text-white p-2">
                                                                        DELIVERY FEE

                                                                    </div>
                                                                    <div class="col-5 text-end fs-5 bg-secondary text-white p-2">
                                                                        Rs.<?php echo $data["delivery_fee"]; ?>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-12 border border-1 border-white border-start-0 border-end-0 border-top-0">
                                                                <div class="row">
                                                                    <div class="col-7 fs-5 fw-bold text-danger p-2">
                                                                        TOTAL AMOUNT

                                                                    </div>
                                                                    <div class="col-5 text-end fs-5 bg-danger text-white p-2">
                                                                        Rs.<?php echo (($pdata["price"] * $data["qty"]) + $pdata["delivery_fee"]) - ((($pdata["price"] * $data["qty"]) + $pdata["delivery_fee"]) * 5 / 100); ?>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                        </div>

                                    </div>



                                    <div class=" col-12 text-center text-success fs-1 fw-bolder mb-5 mt-5">THANK YOU !</div>


                                    <div class=" col-12 text-center text-primary fs-5  mb-5 mt-5">It Has Been a Pleasure Doing Business With You.</div>



                                    <div class="col-12 ">

                                        <div class="row">
                                            <div class="bg-warning rounded" style="height: 100px;"></div>
                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>




                    </div>

                    <?php include "footer.php"; ?>


                </div>


            </div>




            <script src="script.js"></script>
            <script src="bootstrap.js"></script>
            <script src="bootstrap.bundle.js"></script>
            <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

        </html>

    <?php
    }
} else if (isset($_GET["orderid"])) {


    // $reqObject = json_decode($_POST["reqJsonText"]);


    $rs = Database::search("SELECT * FROM `invoice` WHERE `order_id`='" . $_GET["orderid"] . "' ");
    // $rs = Database::search("SELECT * FROM `invoice` WHERE `order_id`='640a01c84e585' ");
    $irs = Database::search("SELECT * FROM `invoice` WHERE  `order_id`='" . $_GET["orderid"] . "' ");


    for ($y = 0; $y < $irs->num_rows; $y++) {

        $idata = $irs->fetch_assoc();
    }

    if ($rs->num_rows == 0) {
        header("Location:cart.php");
    } else {


        // $crs = Database::search("SELECT * FROM `customer` WHERE `id`='" . $reqObject->id . "'");
        $crs = Database::search("SELECT * FROM `customer` WHERE `id`='" . $_SESSION["cus"]["id"] . "'");

        $cdata = $crs->fetch_assoc();

    ?>



        <!DOCTYPE html>
        <html>

        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">


            <title>KV SPICE | Invoice</title>


            <link rel="stylesheet" href="bootstrap.css">
            <link rel="stylesheet" href="style.css">
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
            <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
            <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">

            <link rel="icon" href="resources/kv.png">
        </head>

        <body class="bg-black">

            <div class="container-fluid ">

                <div class="row">

                    <div class="col-12 bg-black">


                        <div class=" col-12 mt-5">
                            <div class=" row">

                                <div class=" bg-dark col-12 btn-toolbar justify-content-end  rounded border border-2 border-dark border-start-0 border-end-0">


                                    <button class=" btn btn-primary me-3 mt-3 mb-3" onclick="printInvoice();"><i class="bi bi-printer-fill"></i>&nbsp; Print</button>

                                    <button class=" btn btn-danger me-3 mt-3 mb-3" onclick="printInvoice();"><i class="bi bi-file-earmark-pdf-fill"></i>&nbsp; Export as PDF</button>

                                </div>

                            </div>
                        </div>



                        <div class=" col-12  mt-5" id="invoice">

                            <div class="row">

                                <div class=" col-lg-10 offset-lg-1 bg-dark rounded rounded-3 mb-5">

                                    <div class=" col-12 ">
                                        <div class="row">
                                            <div class="col-3 bg-warning"></div>
                                            <div class=" col-1 offset-0 text-end">
                                                <div class="logo1 mt-3 text-end mb-3 ms-3"></div>
                                            </div>
                                            <div class="col-3 mt-5 offset-1 ">
                                                <h1 class="text-white fw-bold d-none d-lg-none d-xl-block">INVOICE</h1>
                                            </div>
                                            <div class=" col-4 text-end text-white mt-3">
                                                <span class="me-4 fs-4  text-decoration-underline">KV SPICE</span><br><br>
                                                <span class="me-4">Delgoda Gampaha, Sri Lanka</span><br>
                                                <span class="me-4">kshprime@gmail.com</span><br>
                                                <span class="me-4">kvspice@gmail.com</span><br>
                                                <span class="me-4">+94 76 2206 166</span>
                                            </div>

                                        </div>

                                    </div>


                                    <div class="col-12">
                                        <hr class="border-3  border border-white">
                                    </div>

                                    <div class="col-12 text-white">

                                        <div class="row">

                                            <div class=" col-6">
                                                <h5 class="fw-bold">INVOICE TO : <?php echo $cdata["fname"] . " " . $cdata["lname"]; ?></h5><br>
                                                <span><?php echo $cdata["address"]; ?></span><br>
                                                <span><?php echo $cdata["email"]; ?></span><br>
                                                <span><?php echo $cdata["mobile"]; ?></span>
                                            </div>

                                            <div class=" col-6 text-end mt-4">

                                                <h1 class="">INVOICE #0<?php echo $idata["id"]; ?></h1>
                                                <span class="fs-5">Date : </span>
                                                <span><?php echo $idata["date_time"]; ?></span>

                                            </div>

                                        </div>

                                    </div>


                                    <div class="col-12">
                                        <hr class="border-3  border border-white">
                                    </div>





                                    <div class=" col-12 mt-5 mb-5  ">

                                        <div class="row">


                                            <div class="col-12 border border-3 border-secondary">
                                                <div class="row">
                                                    <div class="col-1  text-white mb-2 mt-2">#</div>
                                                    <div class="col-3 text-center text-white mb-2 mt-2">DESCRIPTION</div>
                                                    <div class="col-2  text-center text-white mb-2 mt-2">QTY</div>
                                                    <div class="col-3 text-end text-white mb-2 mt-2">UNIT PRICE</div>
                                                    <div class="col-3 text-end text-white mb-2 mt-2">TOTAL</div>
                                                </div>
                                            </div>

                                            <?php


                                            $subTotal = 0;
                                            $shipping = 0;
                                            $total = 0;


                                            for ($x = 0; $x < $rs->num_rows; $x++) {

                                                $data = $rs->fetch_assoc();

                                                $prs = Database::search("SELECT * FROM `product` WHERE `id`='" . $data["product_id"] . "'");

                                                $pdata = $prs->fetch_assoc();





                                                $shipping = $shipping + $pdata["delivery_fee"];

                                                $subTotal = $subTotal +  ($pdata["price"] * $data["qty"]);


                                                $total =   (($subTotal + $shipping) - (($subTotal + $shipping) * 5 / 100));






                                                // $st =  ($pdata["price"] * $data["qty"]);

                                                // $sp =  $pdata["delivery_fee"];

                                                // $stx =  ($sp * 10 / 100);

                                                // $of =  (($st + $sp + $stx) * 5 / 100);

                                                // $tt =  (($st + $stx) - $of);


                                            ?>



                                                <div class="col-12 border border-1 border-white border-start-0 border-end-0 border-top-0">
                                                    <div class="row">
                                                        <div class="col-1  text-white mb-2 mt-2">0<?php echo $data["id"]; ?></div>
                                                        <div class="col-3 text-center text-white mb-2 mt-2"><?php echo $pdata["title"]; ?></div>
                                                        <div class="col-2  text-center text-white mb-2 mt-2"><?php echo $data["qty"]; ?></div>
                                                        <div class="col-3 text-end text-white mb-2 mt-2">Rs.<?php echo $pdata["price"]; ?></div>
                                                        <div class="col-3 text-end text-white mb-2 mt-2">Rs.<?php echo $pdata["price"] * $data["qty"]; //echo ((($pdata["price"]) * $data["qty"] - $pdata["delivery_fee"]) + ($pdata["delivery_fee"] * 10 / 100)) - ((($pdata["price"]) * $data["qty"]) + ($pdata["delivery_fee"] * 10 / 100)) * 5 / 100; 
                                                                                                            ?></div>
                                                    </div>
                                                </div>

                                            <?php
                                            }


                                            ?>







                                            <div class="col-12">
                                                <div class="row">
                                                    <div class="col-7 offset-5">
                                                        <div class="row">

                                                            <div class="col-12 border  border-1 border-white border-start-0 border-end-0 border-top-0">
                                                                <div class="row">
                                                                    <div class="col-7 fs-5 fw-bold text-white p-2">
                                                                        SUBTOTAL
                                                                    </div>
                                                                    <div class="col-5 text-end fs-5 text-white p-2">
                                                                        Rs.<?php echo $subTotal; ?>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <!-- <div class="col-12 border  border-1 border-white border-start-0 border-end-0 border-top-0">
                                                                <div class="row">
                                                                    <div class="col-7 fs-5 fw-bold text-white p-2">
                                                                        SERVICE TAX
                                                                    </div>
                                                                    <div class="col-5 text-end fs-5 text-white p-2">
                                                                        Rs.<?php //echo $serviceTax; 
                                                                            ?>
                                                                    </div>
                                                                </div>
                                                            </div> -->

                                                            <div class="col-12 border border-1 border-white border-start-0 border-end-0 border-top-0">
                                                                <div class="row">
                                                                    <div class="col-7 fs-5 fw-bold text-white p-2">
                                                                        DELIVERY FEE

                                                                    </div>
                                                                    <div class="col-5 text-end fs-5 bg-secondary text-white p-2">
                                                                        Rs.<?php echo $shipping; ?>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-12 border border-1 border-white border-start-0 border-end-0 border-top-0">
                                                                <div class="row">
                                                                    <div class="col-7 fs-5 fw-bold text-danger p-2">
                                                                        TOTAL AMOUNT

                                                                    </div>
                                                                    <div class="col-5 text-end fs-5 bg-danger text-white p-2">
                                                                        Rs.<?php echo $total; ?>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                        </div>

                                    </div>



                                    <div class=" col-12 text-center text-success fs-1 fw-bolder mb-5 mt-5">THANK YOU !</div>


                                    <div class=" col-12 text-center text-primary fs-5  mb-5 mt-5">It Has Been a Pleasure Doing Business With You.</div>



                                    <div class="col-12 ">

                                        <div class="row">
                                            <div class="bg-warning rounded" style="height: 100px;"></div>
                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>




                    </div>

                    <?php include "footer.php"; ?>


                </div>


            </div>




            <script src="script.js"></script>
            <script src="bootstrap.js"></script>
            <script src="bootstrap.bundle.js"></script>
            <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

        </html>


    <?php
    }
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