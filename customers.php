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


                            <!-- <div class="col-12 bg-dark mt-1">
                                <div class="row">
                                    <div class="col-12 title4 text-center text-white">KV SPICE</div>
                                </div>
                            </div>
                            <hr> -->
                            <!-- <div class="col-12 bg-dark">
                                <div class="row">

                                    <div class="col-12 fs-1 text-center text-white">Admin Panel</div>

                                </div>
                            </div> -->


                            <div class=" col-12  text-center mt-3">
                                <div class="row">

                                    <div class="col-12 mb-5">
                                        <div class="row">
                                            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                                                <a class="navbar-brand fs-4" href="adminPanel.php">KV SPICE</a>
                                                <a class="navbar-brand fs-5" href="adminPanel.php"> Admin Panel</a>

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



                                    <div class="col-12">
                                        <div class="row">


                                            <div class="col-12 offset-0">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="row">

                                                            <div class="col-12">

                                                                <div class="col-12">
                                                                    <div class="row text-center">
                                                                        <h1 class="fw-bold text-warning mt-2 mb-2">Manage Customers <i class="bi bi-people-fill fs-2"></i></h1>
                                                                    </div>
                                                                </div>


                                                                <div class="col-12">
                                                                    <hr class="border-3  border border-white">
                                                                </div>


                                                                <div class="col-12">
                                                                    <div class="row text-center ">
                                                                        <div class="col-5 col-lg-4 offset-2 offset-lg-4 mb-5">
                                                                            <input type="text" placeholder="Search..." class="form-control" id="t">
                                                                        </div>
                                                                        <div class="col-5 col-lg-4  mb-5">
                                                                            <button class="btn btn-outline-primary d-grid" onclick="mcSearch();">Search</button>
                                                                        </div>
                                                                    </div>
                                                                </div>


                                                                <div class="col-12">
                                                                    <hr class="border-3  border border-white">
                                                                </div>
                                                            </div>





                                                        </div>
                                                    </div>
                                                </div>
                                            </div>




                                            <div class="col-12 mt-3 mb-5 text-white">
                                                <div class="row">

                                                    <div class="col-12 mb-4">
                                                        <div class="row">
                                                            <div class="col-1 fs-5 fw-bold border-1 border-bottom border-white border-end">ID</div>
                                                            <div class="col-7 col-lg-5 col-xl-3 fs-5 fw-bold border-1 border-bottom border-white border-center">Name</div>
                                                            <div class="col-3 fs-5 fw-bold border-1 border-bottom border-white border-end d-none d-lg-none d-xl-block">Email</div>
                                                            <div class="col-2 fs-5 fw-bold border-1 border-bottom border-white border-end d-none d-lg-block">Mobile</div>
                                                            <div class="col-2 fs-5 fw-bold border-1 border-bottom border-white border-end">Status</div>
                                                            <div class="col-2 col-lg-2 col-xl-1 border-1 border-bottom border-white"></div>
                                                        </div>
                                                    </div>


                                                    <div class="col-12">
                                                        <div class="row" id="mcSearchResult">

                                                            <?php


                                                            $crs = Database::search("SELECT * FROM `customer`");
                                                            $cnum = $crs->num_rows;

                                                            for ($x = 1; $x <= $cnum; $x++) {

                                                                $cdata = $crs->fetch_assoc();

                                                                $srs = Database::search("SELECT * FROM `status` WHERE `id`='" . $cdata["status_id"] . "' ");
                                                                $sdata = $srs->fetch_assoc();


                                                            ?>

                                                                <div class="col-12 mb-3">
                                                                    <div class="row">



                                                                        <div class="col-1 fs-5 border-1 border-bottom border-white border-end">0<?php echo ($x); ?></div>
                                                                        <div class="col-7 col-lg-5 col-xl-3 fs-5 border-1 border-bottom border-white border-end"><?php echo ($cdata["fname"] . " " . $cdata["lname"]); ?></div>
                                                                        <div class="col-3 fs-5 d-none d-lg-none d-xl-block border-1 border-bottom border-white border-end"><?php echo ($cdata["email"]); ?></div>

                                                                        <?php


                                                                        $blo_status = $cdata["blo_status_id"];


                                                                        ?>
                                                                        <div class="col-2 fs-5 border-1 border-bottom border-white border-end text-center d-none d-lg-block"><?php echo ($cdata["mobile"]); ?></div>
                                                                        <div class="col-2 fs-6 border-1 border-bottom border-white border-end text-center"><?php echo ($sdata["status"]); ?></div>




                                                                        <?php
                                                                        if ($blo_status == 1) {
                                                                        ?>
                                                                            <div class="col-2 col-lg-2 col-xl-1 fs-5 border-1 border-bottom border-white"> <button class=" btn btn-danger mt-1 mb-1" onclick="cBlockUnblock('<?php echo $cdata['id']; ?>');" id="cblockbtn<?php echo $cdata['id']; ?>">Block</button></div>

                                                                        <?php

                                                                        } else if ($blo_status == 2) {
                                                                        ?>
                                                                            <div class="col-2 col-lg-2 col-xl-1 fs-5 border-1 border-bottom border-white"> <button class=" btn btn-danger mt-1 mb-1 " onclick="cBlockUnblock('<?php echo $cdata['id']; ?>');" id="cblockbtn<?php echo $cdata['id']; ?>">UnBlock</button></div>

                                                                        <?php
                                                                        }

                                                                        ?>


                                                                    </div>
                                                                </div>


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


    <script src="script.js"></script>
    <script src="bootstrap.js"></script>
    <script src="bootstrap.bundle.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>