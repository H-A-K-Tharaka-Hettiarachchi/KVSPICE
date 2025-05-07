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
                                                                <h1 class="fw-bold text-warning mt-2 mb-2">Recent Products <i class="bi bi-box2-fill fs-2"></i></h1>
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
                                                                    <button class="btn btn-outline-primary d-grid" onclick="rpSearch();">Search</button>
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




                                    <div class="col-12">
                                        <div class="row">

                                            <div class="col-12">
                                                <div class="row">



                                                    <div class="col-12 bg-dark mb-5">
                                                        <div class="row">

                                                            <div class="col-1 mt-2 mb-2">
                                                                <h5 class="text-white mt-1 mb-1">#</h5>
                                                            </div>
                                                            <div class="col-2 col-lg-2 text-center mt-2 mb-2">
                                                                <h5 class="text-white mt-1 mb-1">Title</h5>
                                                            </div>
                                                            <div class="col-1 d-none d-lg-block text-center mt-2 mb-2">
                                                                <h5 class="text-white mt-1 mb-1">Qty</h5>
                                                            </div>
                                                            <div class="col-2 col-lg-2 text-center mt-2 mb-2">
                                                                <h5 class="text-white mt-1 mb-1">Price</h5>
                                                            </div>
                                                            <div class="col-6 d-block d-lg-none text-center mt-2 mb-2">
                                                                <h5 class="text-white mt-1 mb-1">Actions</h5>
                                                            </div>
                                                            <div class="col-3 d-none d-lg-block text-center mt-2 mb-2">
                                                                <h5 class="text-white mt-1 mb-1">Register Date</h5>
                                                            </div>
                                                            <div class="col-3 text-center d-none d-lg-block mt-2 mb-2">
                                                                <h5 class="text-white mt-1 mb-1">Actions</h5>
                                                            </div>

                                                        </div>
                                                    </div>

                                                    <div class="co12" id="rpSearchResult">

                                                        <div class="row">

                                                            <?php

                                                            $rrs = Database::search("SELECT * FROM `recent` ");


                                                            if ($rrs->num_rows == 0) {
                                                            ?>

                                                                <div class="col-12 col-lg-10 offset-lg-1 text-center mb-5">

                                                                    <div class="col-12 text-white">
                                                                        <span class="col-12 fw-bold"><i class="bi bi-box2-fill  text-warning" style="font-size: 200px;"></i></span>
                                                                    </div>
                                                                    <div class="col-12 text-white">
                                                                        <h1>No Items Recently Added Yet.</h1>
                                                                    </div>

                                                                </div>

                                                                <?php

                                                            } else {




                                                                for ($x = 0; $x < $rrs->num_rows; $x++) {

                                                                    $rdata = $rrs->fetch_assoc();


                                                                    $prs = Database::search("SELECT * FROM `product` WHERE `id`='" . $rdata["product_id"] . "' ");

                                                                    for ($y = 0; $y < $prs->num_rows; $y++) {

                                                                        $pdata = $prs->fetch_assoc();

                                                                        $date_time = strtotime($pdata["add_date"]);
                                                                        $date = date('Y/m/d ', $date_time);

                                                                ?>






                                                                        <div class="col-12 bg-dark mt-3">
                                                                            <div class="row">

                                                                                <div class="col-1 mt-2 mb-2">
                                                                                    <h5 class="text-white mt-1 mb-1">0<?php echo $x + 1 ?></h5>
                                                                                </div>
                                                                                <div class="col-2 col-lg-2 text-center mt-2 mb-2">
                                                                                    <h5 class="text-white mt-1 mb-1"><?php echo $pdata["title"]; ?></h5>
                                                                                </div>
                                                                                <div class="col-1 d-none d-lg-block text-center mt-2 mb-2">
                                                                                    <h5 class="text-white mt-1 mb-1"><?php echo $pdata["qty"]; ?></h5>
                                                                                </div>
                                                                                <div class="col-2 col-lg-2 text-center mt-2 mb-2">
                                                                                    <h5 class="text-white mt-1 mb-1">Rs.<?php echo $pdata["price"]; ?>.00</h5>
                                                                                </div>
                                                                                <div class="col-6 offset-1  d-block d-lg-none  mt-2 mb-2">
                                                                                    <div class="row">
                                                                                        <div class="col-12">
                                                                                            <div class="row">
                                                                                                <div class="col-6 text-center d-grid">
                                                                                                    <button class="btn btn-success" onclick="window.location='updateProduct.php?id=<?php echo $pdata['id']; ?>'">Update</button>
                                                                                                </div>
                                                                                                <div class="col-6 text-center d-grid">
                                                                                                    <button class="btn btn-warning" onclick="productDeleteAndRecover('<?php echo $pdata['id']; ?>');">Re-Add</button>
                                                                                                </div>

                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-3 d-none d-lg-block text-center mt-2 mb-2">
                                                                                    <h5 class="text-white mt-1 mb-1"><?php echo $date; ?></h5>
                                                                                </div>
                                                                                <div class="col-3 d-none d-lg-block mt-2 mb-2">
                                                                                    <div class="row">
                                                                                        <div class="col-12">
                                                                                            <div class="row">
                                                                                                <div class="col-6 d-grid">
                                                                                                    <button class="btn btn-success" onclick="window.location='updateProduct.php?id=<?php echo $pdata['id']; ?>'">Update</button>
                                                                                                </div>
                                                                                                <div class="col-6 d-grid">
                                                                                                    <button class="btn btn-warning" onclick="productDeleteAndRecover('<?php echo $pdata['id']; ?>');">Re-Add</button>
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