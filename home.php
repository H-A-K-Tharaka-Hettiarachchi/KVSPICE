<?php

require "connection.php";


if (isset($_GET["status"]) && $_GET["status"] == "nl") {
?>
    <script>
        function m() {
            alert("Please Login First");
        }
        m();
    </script>
<?php
}


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

<body class="bg-black ">


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
                                                        <h1 class="fw-bold text-warning mt-2 mb-2">Home <i class="bi bi-house-fill fs-1 text-warning"></i></h1>
                                                    </div>
                                                </div>

                                                <div class="col-12 col-md-8 col-lg-5 offset-md-0 offset-lg-0">

                                                    <div class="input-group mt-3 mb-3">

                                                        <input type="text" class="form-control" aria-label="Text input with dropdown button" id="bst">

                                                        <select class="form-select" style="max-width: 250px;" id="bss">

                                                            <option value="0">All Categories</option>

                                                            <?php


                                                            $category_rs = Database::search("SELECT * FROM `category`");
                                                            $category_num = $category_rs->num_rows;

                                                            for ($x = 0; $x < $category_num; $x++) {
                                                                $category_data = $category_rs->fetch_assoc();
                                                            ?>

                                                                <option value="<?php echo $category_data["id"]; ?>"> <?php echo $category_data["category"]; ?></option>

                                                            <?php
                                                            }

                                                            ?>

                                                        </select>

                                                    </div>

                                                </div>
                                                <div class="col-1 offset-2 offset-md-0 offset-lg-0">
                                                    <div class="row">
                                                        <div class="col-12 d-grid">
                                                            <button class="btn btn-primary   mt-3 mb-3" onclick="basicSearch();">Search</button>
                                                        </div>

                                                    </div>
                                                </div>


                                                <div class=" col-4 offset-2 offset-md-4 offset-lg-0">
                                                    <div class="row">
                                                        <div class="col-12">
                                                            <!-- <button class="btn btn-outline-info mt-3 mb-3 border-0">Advanced Search</button> -->
                                                            <p class="text-info  btn mt-3 mb-3" onclick="window.location='advancedSearch.php'">Advanced Search</p>
                                                        </div>

                                                    </div>
                                                </div>

                                            </div>
                                        </div>

                                        <div class="col-12 col-lg-12 ">
                                            <div class="row">



                                                <div class=" col-12">
                                                    <div class="row">

                                                        <div class="col-12">
                                                            <div class="row ">




                                                                <!-- Slide -->

                                                                <div class="col-12 col-lg-12  rounded-4 offset-lg-0 mb-3 d-lg-block d-none d-md-block">


                                                                    <div class="row">
                                                                        <div id="carouselExampleFade" class="carousel slide carousel-fade" data-bs-ride="carousel">
                                                                            <div class="carousel-inner">




                                                                                <div class="carousel-item active">
                                                                                    <img src="resources/slider_images/1.jpg" class="d-block w-100 rounded-4" alt="..." style="height: 450px;">
                                                                                </div>
                                                                                <div class="carousel-item">
                                                                                    <img src="resources/slider_images/2.jpg" class="d-block w-100 rounded-4" alt="..." style="height: 450px;">
                                                                                </div>
                                                                                <div class="carousel-item">
                                                                                    <img src="resources/slider_images/3.jpg" class="d-block w-100 rounded-4" alt="..." style="height: 450px;">
                                                                                </div>
                                                                                <div class="carousel-item">
                                                                                    <img src="resources/slider_images/4.jpg" class="d-block w-100 rounded-4" alt="..." style="height: 450px;">
                                                                                </div>


                                                                            </div>
                                                                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
                                                                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                                                <span class="visually-hidden">Previous</span>
                                                                            </button>
                                                                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
                                                                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                                                <span class="visually-hidden">Next</span>
                                                                            </button>
                                                                        </div>
                                                                    </div>


                                                                </div>

                                                                <!-- Slide -->



                                                                <div class="col-12" id="basicSearchResult">
                                                                    <div class="row">

                                                                        <div class="col-12 text-center">
                                                                            <div class="row justify-content-center">




                                                                                <?php

                                                                                $prs =  Database::search("SELECT * FROM `product` WHERE `blo_status_id`='1' LIMIT 6 ");



                                                                                for ($x = 0; $x < $prs->num_rows; $x++) {

                                                                                    $pdata = $prs->fetch_assoc();

                                                                                    $cars = Database::search(" SELECT * FROM `category` WHERE id='" . $pdata["category_id"] . "'");
                                                                                    $irs = Database::search("SELECT * FROM `images` WHERE product_id='" . $pdata["id"] . "'");

                                                                                    $cadata = $cars->fetch_assoc();
                                                                                    $idata = $irs->fetch_assoc();



                                                                                ?>

                                                                                    <div class="col-8 mb-3 offset-2   col-md-4 offset-md-0   col-lg-3 offset-lg-0 col-xl-2 offset-xl-0">
                                                                                        <div class="card h-100 text-center border-warning border-2 text-white bg-black">
                                                                                            <img src="<?php echo $idata["path"]; ?>" class="card-img-top img-thumbnail bg-black border-2 border-start-0 border-end-0 border-top-0 border-warning " style="height: 180px;">
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
                                                                                                <h5>New Offer</h5>
                                                                                                <h5 class="card-title">Rs.<?php echo $pdata["price"]; ?>.00</h5>
                                                                                                <a class="card-text">-<?php echo $cadata["category"]; ?>-</a>
                                                                                            </div>
                                                                                            <div class="card-footer border-warning d-grid">
                                                                                                <?php

                                                                                                if ($pdata["qty"] > 0) {
                                                                                                ?>
                                                                                                    <a class="btn btn-warning mt-3" href="<?php echo "singleProductView.php?id=" . $pdata["id"];  ?> ">By Now</a>
                                                                                                    <button class="btn btn-success mt-3" onclick="addToCart('<?php echo $pdata['id'];  ?>');">Add To Cart</button>
                                                                                                <?php
                                                                                                } else {
                                                                                                ?>
                                                                                                    <a class="btn btn-warning mt-3 disabled" href="<?php echo "singleProductView.php?id=" . $pdata["id"];  ?> ">By Now</a>
                                                                                                    <button class="btn btn-success mt-3 disabled" onclick="addToCart('<?php echo $pdata['id'];  ?>');">Add To Cart</button>
                                                                                                <?php
                                                                                                }

                                                                                                ?>

                                                                                            </div>
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
                <script src="bootstrap.bundle.min.js"></script>
                <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>

</body>

</html>