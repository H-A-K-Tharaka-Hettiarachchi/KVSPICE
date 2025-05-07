<?php
session_start();

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


    <div class="container-fluid justify-content-center">
        <div class="row align-self-center">


            <div class="col-12">
                <div class="row">

                    <div class="col-12">
                        <div class="row">

                            <div class="col-12 fixed-top">
                                <div class="row">
                                    <!-- 

                                    <nav class="navbar navbar-dark bg-dark fixed-top">
                                        <div class="container-fluid">
                                            <a class="navbar-brand text-white" href="#">KV SPICE</a>
                                            <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar">
                                                <span class="navbar-toggler-icon"></span>
                                            </button>
                                            <div class="offcanvas offcanvas-end text-bg-dark" tabindex="-1" id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel">
                                                <div class="offcanvas-header">
                                                    <h5 class="offcanvas-title" id="offcanvasDarkNavbarLabel">Dark offcanvas</h5>
                                                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                                                </div>
                                                <div class="offcanvas-body">
                                                    <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                                                        <li class="nav-item">
                                                            <a class="nav-link active" aria-current="page" href="#">Home</a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link active" href="#">Cart</a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link active" href="#">WatchList</a>
                                                        </li>
                                                      
                                                    </ul>
                                                    <form class="d-flex mt-3" role="search">
                                                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                                                        <button class="btn btn-success" type="submit">Search</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </nav> -->

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


    <script src="script.js"></script>
    <script src="bootstrap.js"></script>
    <script src="bootstrap.bundle.js"></script>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</body>

</html>