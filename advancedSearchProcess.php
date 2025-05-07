<?php

require "connection.php";

$t = $_POST["t"];
$c = $_POST["c"];
$pf = $_POST["pf"];
$pt = $_POST["pt"];
$phtl = $_POST["phtl"];
$plth = $_POST["plth"];
$qhtl = $_POST["qhtl"];
$qlth = $_POST["qlth"];



$query = "";


if ($t != null) {
    $query = "SELECT * FROM `product` WHERE `title` LIKE '%" . $t . "%' ";
} else {
    $query = "SELECT * FROM `product`";
}
if ($t == null && $c != 0) {
    if ($query == "SELECT * FROM `product`") {
        $query .= " WHERE `category_id`='" . $c . "'";
    } else {
        $query .= " AND `category_id`='" . $c . "'";
    }
}
if ($t != null && $c != 0) {
    if ($query == "SELECT * FROM `product`") {
        $query .= " WHERE `title` LIKE '%" . $t . "%' AND `category_id`='" . $c . "'";
    } else {
        $query .= " AND `title` LIKE '%" . $t . "%' AND `category_id`='" . $c . "'";
    }
}
if ($t == null && $c == 0 && $pf != null) {
    if ($query == "SELECT * FROM `product`") {
        $query .= " WHERE `price`>='" . $pf . "'";
    } else {
        $query .= " AND `price`>='" . $pf . "'";
    }
}
if ($t == null && $c != 0 && $pf != null) {
    if ($query == "SELECT * FROM `product`") {
        $query .= " WHERE `category_id`='" . $c . "' AND `price`>='" . $pf . "'";
    } else {
        $query .= " AND `category_id`='" . $c . "' AND `price`>='" . $pf . "'";
    }
}
if ($t != null && $c == 0 && $pf != null) {
    if ($query == "SELECT * FROM `product`") {
        $query .= " WHERE `title` LIKE '%" . $t . "%' AND `price`>='" . $pf . "'";
    } else {
        $query .= " AND `title` LIKE '%" . $t . "%' AND `price`>='" . $pf . "'";
    }
}
if ($t != null && $c != 0 && $pf != null) {
    if ($query == "SELECT * FROM `product`") {
        $query .= " WHERE `title` LIKE '%" . $t . "%' AND `category_id`='" . $c . "' AND `price`>='" . $pf . "'";
    } else {
        $query .= " AND `title` LIKE '%" . $t . "%' AND `category_id`='" . $c . "' AND `price`>='" . $pf . "'";
    }
}
if ($t == null && $c == 0 && $pf == null && $pt != null) {
    if ($query == "SELECT * FROM `product`") {
        $query .= " WHERE `price` <= '" . $pt . "'";
    } else {
        $query .= " AND `price` <= '" . $pt . "'";
    }
}
if ($t != null && $c == 0 && $pf == null && $pt != null) {
    if ($query == "SELECT * FROM `product`") {
        $query .= " WHERE `title` LIKE '%" . $t . "%' AND `price`<='" . $pt . "' ";
    } else {
        $query .= " AND `title` LIKE '%" . $t . "%' AND `price`<='" . $pt . "' ";
    }
}
if ($t == null && $c != 0 && $pf == null && $pt != null) {
    if ($query == "SELECT * FROM `product`") {
        $query .= " WHERE `category`='" . $c . "' AND `price`<='" . $pt . "' ";
    } else {
        $query .= " AND `category`='" . $c . "' AND `price`<='" . $pt . "' ";
    }
}
if ($t == null && $c == 0 && $pf != null && $pt != null) {
    if ($query == "SELECT * FROM `product`") {
        $query .= " WHERE `price`>='" . $pf . "' AND `price`<='" . $pt . "'";
    } else {
        $query .= " AND `price`>='" . $pf . "' AND `price`<='" . $pt . "'";
    }
}

if ($t == null && $c != 0 && $pf != null && $pt != null) {
    if ($query == "SELECT * FROM `product`") {
        $query .= " WHERE `category_id`='".$c."' AND  `price`>='" . $pf . "' AND `price`<='" . $pt . "'";
    } else {
        $query .= " AND `category_id`='" . $c . "' AND `price`>='" . $pf . "' AND `price`<='" . $pt . "'";
    }
}
if ($t != null && $c != 0 && $pf == null && $pt != null) {
    if ($query == "SELECT * FROM `product`") {
        $query .= " WHERE `title` LIKE '%" . $t . "%' AND `category_id`='" . $c . "' AND `price`<='" . $pt . "' ";
    } else {
        $query .= " AND `title` LIKE '%" . $t . "%' AND `category_id`='" . $c . "' AND `price`<='" . $pt . "' ";
    }
}
if ($t != null && $c != 0 && $pf != null && $pt != null) {
    if ($query == "SELECT * FROM `product`") {
        $query .= " WHERE `title` LIKE '%" . $t . "%' AND `category_id`='" . $c . "' AND `price`>='" . $pf . "' AND `price` <='" . $pt . "' ";
    } else {
        $query .= " AND `title` LIKE '%" . $t . "%' AND `category_id`='" . $c . "' AND `price`>='" . $pf . "' AND `price` <='" . $pt . "' ";
    }
}
if ($t != null && $c == 0 && $pf != null && $pt != null) {
    if ($query == "SELECT * FROM `product`") {
        $query .= " WHERE `title` LIKE '%" . $t . "%'  AND `price`>='" . $pf . "' AND `price` <='" . $pt . "' ";
    } else {
        $query .= " AND `title` LIKE '%" . $t . "%' AND `price`>='" . $pf . "' AND `price` <='" . $pt . "' ";
    }
}

if ($phtl == "true") {
    $query .= " ORDER BY `price` DESC ";
    echo ($query);
} else if ($plth == "true") {
    $query .= " ORDER BY `price` ASC ";
    echo ($query);
} else if ($qhtl == "true") {
    $query .= " ORDER BY `qty` DESC ";
    echo ($query);
} else if ($qlth == "true") {
    $query .= " ORDER BY `qty` ASC ";
    echo ($query);
}

if ($phtl == "true" && $qhtl == "true") {
    $query .= " ORDER BY `price` DESC  , `qty` DESC ";
    echo ($query);
} else if ($phtl == "true" && $qlth == "true") {
    $query .= " ORDER BY `price` DESC , `qty` ASC ";
    echo ($query);
}
if ($plth == "true" && $qhtl == "true") {
    $query .= " ORDER BY `price` ASC , `qty` DESC ";
    echo ($query);
} else if ($plth == "true" && $qlth == "true") {
    $query .= " ORDER BY `price` ASC , `qty` ASC ";
    echo ($query);
}


$rs = Database::search($query);


if ($rs->num_rows == 0) {
?>
    <div class="col-12 col-lg-8 mb-5">

        <div class="col-12 text-white">
            <span class="col-12 fw-bold"><i class="bi bi-search text-warning" style="font-size: 200px;"></i></span>
        </div>
        <div class="col-12 text-white">
            <h1>No Items Search Yet.</h1>
        </div>

    </div>
<?php
} else {
?>

    <div class="row">
        <?php include "header.php";
        if (isset($_SESSION["cus"])) {
            $cus = $_SESSION["cus"];
        } else {
            $cus = "";
        }

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
                    $cus = "";
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

                            <div class="col-12 ">
                                <div class="row">

                                    <div class="col-10 offset-0 col-md-7 offset-md-0 col-lg-11 offset-lg-0 mt-4 ">
                                        <div class="row">
                                            <div class="col-12 ms-5">
                                                <div class="row">

                                                    <?php

                                                    if ($cus == "") {


                                                    ?>

                                                        <div class="col-12 col-lg-12 mb-5 text-center">

                                                            <div class="col-12 text-white">
                                                                <span class="col-12 fw-bold"><i class="bi bi-heartbreak text-warning" style="font-size: 200px;"></i></span>
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





                                                        for ($x = 0; $x < $rs->num_rows; $x++) {

                                                            $pdata = $rs->fetch_assoc();



                                                            $cars = Database::search(" SELECT * FROM `category` WHERE id='" . $pdata["category_id"] . "'");

                                                            $irs = Database::search("SELECT * FROM `images` WHERE `product_id`='" . $pdata["id"] . "'");

                                                            $idata = $irs->fetch_assoc();
                                                            $cadata = $cars->fetch_assoc();


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

                                                                                                    <div class="col-12 mt-5">
                                                                                                        <div class="row">
                                                                                                            <div class="col-5">
                                                                                                                <h5 class="text-white">Price :</h5>
                                                                                                            </div>
                                                                                                            <div class="col-7">
                                                                                                                <h5 class="text-white"> Rs.<?php echo $pdata["price"]; ?>.00</h5>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="col-12 mt-3">
                                                                                                        <div class="row">
                                                                                                            <div class="col-5">
                                                                                                                <h5 class="text-white">Quantity :</h5>
                                                                                                            </div>
                                                                                                            <div class="col-7">
                                                                                                                <h5 class="text-white"><?php echo $pdata["qty"]; ?> Items Avalable</h5>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="col-12 mt-3">
                                                                                                        <div class="row">
                                                                                                            <div class="col-5">
                                                                                                                <h5 class="text-white">Description :</h5>
                                                                                                            </div>
                                                                                                            <div class="col-7">
                                                                                                                <p class="text-white"><?php echo $pdata["description"]; ?></p>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    </div>
                                                                                                    <div class="col-12 mt-3">
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
                                                                                                    <?php

                                                                                                    if ($pdata["qty"] > 0) {
                                                                                                    ?>
                                                                                                        <div class="col-12 d-grid mb-5 mt-5">
                                                                                                            <a class="btn btn-outline-success" href="<?php echo "singleProductView.php?id=" . $pdata["id"]; ?>">Buy Now</a>
                                                                                                        </div>
                                                                                                        <div class=" col-12 d-grid mb-5">
                                                                                                            <button class="btn btn-outline-warning" onclick="addToCart('<?php echo $pdata['id'];  ?>');">Add To Cart</i></button>
                                                                                                        </div>
                                                                                                    <?php
                                                                                                    } else {
                                                                                                    ?>
                                                                                                        <div class="col-12 d-grid mb-5 mt-5">
                                                                                                            <a class="btn btn-outline-success disabled" href="<?php echo "singleProductView.php?id=" . $pdata["id"]; ?>">Buy Now</a>
                                                                                                        </div>
                                                                                                        <div class=" col-12 d-grid mb-5">
                                                                                                            <button class="btn btn-outline-warning disabled" onclick="addToCart('<?php echo $pdata['id'];  ?>');">Add To Cart</i></button>
                                                                                                        </div>
                                                                                                    <?php
                                                                                                    }


                                                                                                    $wa_rs = Database::search("SELECT * FROM `watchlist` WHERE `product_id`='" . $pdata["id"] . "' AND `customer_id`='" . $cus["id"] . "'");

                                                                                                    if ($wa_rs->num_rows == 1) {
                                                                                                    ?>
                                                                                                        <div class=" col-12 d-grid mb-5">
                                                                                                            <button class="btn btn-outline-danger" onclick="addToWatchList('<?php echo $pdata['id']; ?>');"><i id="addWatchlist<?php echo $pdata["id"]; ?>" class="bi bi-heart-fill fs-5"></i></button>
                                                                                                        </div>
                                                                                                    <?php
                                                                                                    } else {
                                                                                                    ?>
                                                                                                        <div class=" col-12 d-grid mb-5">
                                                                                                            <button class="btn btn-outline-danger" onclick="addToWatchList('<?php echo $pdata['id']; ?>');"><i id="addWatchlist<?php echo $pdata["id"]; ?>" class="bi bi-heart fs-5"></i></button>
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


                    </div>
                </div>
    </div>

<?php
}

?>