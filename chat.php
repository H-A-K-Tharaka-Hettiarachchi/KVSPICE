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

                                    <?php

                                    session_start();

                                    if (isset($_SESSION["cus"]) || isset($_SESSION["admin"])) {

                                        if (isset($_SESSION["cus"]) && isset($_SESSION["admin"])) {

                                            if ($_GET["key"] == "a") {

                                                Database::iud("UPDATE `customer` SET `verification_code`='' ");
                                                $_SESSION["cus"] = null;
                                                session_destroy();
                                            } else if ($_GET["key"] == "c") {
                                                Database::iud("UPDATE `admin` SET `verification_code`='' ");
                                                $_SESSION["admin"] = null;
                                                session_destroy();
                                            }
                                        }

                                        if (isset($_SESSION["admin"]) && $_GET["key"] == "c" || isset($_SESSION["cus"]) && $_GET["key"] == "a") {
                                    ?>
                                            <script>
                                                function n() {
                                                    alert("Please Login First");
                                                    window.location = "index.php";
                                                }
                                                n();
                                            </script>
                                        <?php
                                        }

                                        if (isset($_SESSION["cus"])) {
                                        ?>


                                            <div class="container-fluid justify-content-center mb-5">
                                                <div class="row align-self-center">


                                                    <div class="col-12">
                                                        <div class="row">

                                                            <div class="col-12">
                                                                <div class="row">

                                                                    <div class="col-12 fixed-top">
                                                                        <div class="row">


                                                                            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                                                                                <a class="navbar-brand" href="home.php">KV SPICE</a>
                                                                                <?php



                                                                                if (isset($_SESSION["cus"])) {

                                                                                    $c = $_SESSION["cus"];

                                                                                ?>
                                                                                    <a class="navbar-brand ms-3 fs-5 fw-bold" href="#">Welcome </a>

                                                                                    <a class="navbar-brand ms-1 fs-5" href="#"> <?php echo $c["fname"] . " " . $c["lname"]; ?></a>

                                                                                <?php

                                                                                } else {
                                                                                ?>
                                                                                    <a class="navbar-brand ms-3" href="index.php">Register| Login</a>
                                                                                <?php
                                                                                }
                                                                                ?>
                                                                                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                                                                                    <span class="navbar-toggler-icon"></span>
                                                                                </button>
                                                                                <div class="collapse navbar-collapse" id="navbarNav">
                                                                                    <ul class="navbar-nav ml-auto">
                                                                                        <li class="nav-item">
                                                                                            <a class="nav-link text-white fs-5" href="home.php">Home</a>
                                                                                        </li>
                                                                                        <li class="nav-item">
                                                                                            <a class="nav-link text-white fs-5" href="shop.php">Shop</a>
                                                                                        </li>
                                                                                        <li class="nav-item">
                                                                                            <a class="nav-link text-white fs-5" href="cart.php">Cart</a>
                                                                                        </li>
                                                                                        <li class="nav-item">
                                                                                            <a class="nav-link text-white fs-5" href="watchlist.php">WatchList</a>
                                                                                        </li>
                                                                                        <li class="nav-item">
                                                                                            <a class="nav-link text-white fs-5" href="chat.php?key=c">Chat</a>
                                                                                        </li>

                                                                                        <li class="nav-item dropdown">
                                                                                            <a class="nav-link dropdown-toggle text-white fs-5" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                                                <i class="fas fa-user"></i>
                                                                                                Account
                                                                                            </a>
                                                                                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                                                                                <a class="dropdown-item" href="profile.php">Profile</a>
                                                                                                <a class="dropdown-item" href="orders.php">Orders</a>
                                                                                                <div class="dropdown-divider"></div>
                                                                                                <a class="dropdown-item" href="#" onclick="cLogout();">
                                                                                                    <i class="fas fa-sign-out-alt"></i> Logout
                                                                                                </a>
                                                                                            </div>
                                                                                        </li>
                                                                            </nav>




                                                                        </div>
                                                                    </div>


                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>


                                                </div>
                                            </div>




                                        <?php
                                        } else if (isset($_SESSION["admin"])) {
                                        ?>
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
                                        <?php
                                        }
                                    } else {
                                        ?>
                                        <script>
                                            function m() {
                                                alert("Please Login First");
                                                window.location = "index.php";
                                            }
                                            m();
                                        </script>
                                    <?php
                                    }


                                    ?>





                                    <div class="col-12 mt-5">
                                        <div class="row">


                                            <div class="col-12 offset-0">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <div class="row">

                                                            <div class="col-10 offset-1 col-lg-4 offset-lg-1">
                                                                <div class="row">
                                                                    <div class="col-12">
                                                                        <div class="row">

                                                                            <div class="col-12 mt-5 mb-5 rounded rounded-2 bg-dark msgBox border border-1 border-warning">
                                                                                <div class="row">


                                                                                    <div class="col-12 mt-5">
                                                                                        <div class="row">

                                                                                            <?php
                                                                                            $to = '';
                                                                                            if (isset($_SESSION["cus"])) {
                                                                                                $to = $_SESSION["cus"]["email"];
                                                                                                $rs = Database::search("SELECT * FROM `admin` ");
                                                                                                $rquery = "SELECT * FROM `admin` ";



                                                                                                $rrs = Database::search($rquery);

                                                                                                for ($x = 0; $x < $rrs->num_rows; $x++) {
                                                                                                    $adata = $rs->fetch_assoc();
                                                                                                    $mquery = "SELECT * FROM `chat` WHERE `from`='" . $_SESSION["cus"]["email"] . "' AND `to`='" . $adata["email"] . "' OR `from`='" . $adata["email"] . "' AND `to`='" . $_SESSION["cus"]["email"]   . "' ORDER BY `date_time` DESC LIMIT 1 ";

                                                                                                    $data = $rrs->fetch_assoc();
                                                                                                    $mrs = Database::search($mquery);
                                                                                                    $mdata = $mrs->fetch_assoc();

                                                                                                    if ($mdata == null) {
                                                                                                        $mdata["date_time"] = "00:00";
                                                                                                        $mdata["msg"] = "Type Message";
                                                                                                    }



                                                                                            ?>


                                                                                                    <div class="col-10 offset-1 mt-2 mb-1 cursor" onclick="viewMsg('<?php echo $data['email'] ?>','<?php echo $to; ?>');">
                                                                                                        <div class="row">

                                                                                                            <div class="col-12 mt-2 bg-secondary rounded rounded-3">
                                                                                                                <div class="row">

                                                                                                                    <div class="col-12 mb-2 mt-2">
                                                                                                                        <div class="row">
                                                                                                                            <div class="col-2 d-none d-lg-none d-xl-block text-end">
                                                                                                                                <?php

                                                                                                                                if ($data["image"] == null) {
                                                                                                                                ?>
                                                                                                                                    <img src="resources\user.png" class="prof">
                                                                                                                                <?php
                                                                                                                                } else {
                                                                                                                                ?>
                                                                                                                                    <img src="<?php echo $data["image"]; ?>" class="prof">
                                                                                                                                <?php
                                                                                                                                }

                                                                                                                                ?>


                                                                                                                            </div>
                                                                                                                            <div class="col-lg-12 col-xl-10">
                                                                                                                                <div class="row">
                                                                                                                                    <div class="col-12">
                                                                                                                                        <div class="row">

                                                                                                                                            <div class="col-8 text-white text-start fs-5">
                                                                                                                                                <?php echo $data["fname"] . " " . $data["lname"];  ?>
                                                                                                                                            </div>
                                                                                                                                            <div class="col-4 text-end">
                                                                                                                                                <small class="text-white text-end"><?php echo $mdata["date_time"]; ?></small>
                                                                                                                                            </div>
                                                                                                                                            <div class="col-12 offset-0 text-start text-white ">
                                                                                                                                                <?php echo $mdata["msg"]; ?>
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
                                                                                            } else if (isset($_SESSION["admin"])) {
                                                                                                $to = $_SESSION["admin"]["email"];
                                                                                                $rs = Database::search("SELECT * FROM `customer`");
                                                                                                $rquery = "SELECT * FROM `customer`";



                                                                                                $rrs = Database::search($rquery);

                                                                                                for ($x = 0; $x < $rrs->num_rows; $x++) {
                                                                                                    $cdata = $rs->fetch_assoc();
                                                                                                    $mquery = "SELECT * FROM `chat` WHERE `from`='" . $_SESSION["admin"]["email"] . "' AND `to`='" . $cdata["email"] . "' OR `from`='" . $cdata["email"] . "' AND `to`='" . $_SESSION["admin"]["email"]  . "' ORDER BY `date_time` DESC LIMIT 1 ";

                                                                                                    $data = $rrs->fetch_assoc();
                                                                                                    $mrs = Database::search($mquery);
                                                                                                    $mdata = $mrs->fetch_assoc();

                                                                                                    if ($mdata == null) {
                                                                                                        $mdata["date_time"] = "00:00";
                                                                                                        $mdata["msg"] = "Type Message";
                                                                                                    }



                                                                                                ?>


                                                                                                    <div class="col-10 offset-1 mt-2 mb-1 cursor" onclick="viewMsg('<?php echo $data['email'] ?>','<?php echo $to; ?>');">
                                                                                                        <div class="row">

                                                                                                            <div class="col-12 mt-2 bg-secondary rounded rounded-3">
                                                                                                                <div class="row">

                                                                                                                    <div class="col-12 mb-2 mt-2">
                                                                                                                        <div class="row">
                                                                                                                            <div class="col-2 d-none d-lg-none d-xl-block text-end">
                                                                                                                                <?php

                                                                                                                                if ($data["image"] == null) {
                                                                                                                                ?>
                                                                                                                                    <img src="resources\user.png" class="prof">
                                                                                                                                <?php
                                                                                                                                } else {
                                                                                                                                ?>
                                                                                                                                    <img src="<?php echo $data["image"]; ?>" class="prof">
                                                                                                                                <?php
                                                                                                                                }

                                                                                                                                ?>


                                                                                                                            </div>
                                                                                                                            <div class="col-lg-12 col-xl-10">
                                                                                                                                <div class="row">
                                                                                                                                    <div class="col-12">
                                                                                                                                        <div class="row">

                                                                                                                                            <div class="col-8 text-white text-start fs-5">
                                                                                                                                                <?php echo $data["fname"] . " " . $data["lname"];  ?>
                                                                                                                                            </div>
                                                                                                                                            <div class="col-4 text-end">
                                                                                                                                                <small class="text-white text-end"><?php echo $mdata["date_time"]; ?></small>
                                                                                                                                            </div>
                                                                                                                                            <div class="col-12 offset-0 text-start text-white ">
                                                                                                                                                <?php echo $mdata["msg"]; ?>
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

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-10 offset-1 col-lg-5 offset-lg-1 mt-5 mb-5">
                                                                <div class="row">
                                                                    <div class="col-12 bg-dark border border-1 border-warning">
                                                                        <div class="row">


                                                                            <div class="col-12 mb-5" id="chatBox" style="height: 510px;">
                                                                                <!-- MSG Area -->
                                                                            </div>


                                                                            <div class="col-12 mb-3">
                                                                                <div class="row">

                                                                                    <div class="col-7 offset-1">
                                                                                        <input type="text" class="form-control rounded border-0 py-3 bg-light" placeholder="Type a message ..." aria-describedby="send_btn" id="msgTxt" />
                                                                                    </div>
                                                                                    <div class="col-2 offset-0 d-grid">
                                                                                        <button class="btn btn-primary " id="send_btn" onclick="sendMsg();"><i class="bi bi-send-fill"></i></button>
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
            </div>


            <script src="script.js"></script>
            <script src="bootstrap.js"></script>
            <script src="bootstrap.bundle.js"></script>
            <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>