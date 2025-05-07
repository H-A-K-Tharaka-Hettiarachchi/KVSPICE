<?php
require "connection.php";



session_start();
if (isset($_SESSION["admin"])) {

    $admindata = $_SESSION["admin"];
} else {
    header("Location:index.php?status=nl");
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
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">

    <link rel="icon" href="resources/kv.png">

</head>

<body class="bg-black">
    <div class="container-fluid">
        <div class="row">

            <div class="col-12 mb-5">
                <div class="row">

                    <div class=" col-12  text-center mt-3">
                        <div class="row">


                            <div class="col-12 mb-5">
                                <div class="row">
                                    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                                        <a class="navbar-brand fs-4 ms-3" href="adminPanel.php">KV SPICE</a>
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

                    <div class="col-12 bg-dark mt-5 rounded-5 col-lg-10 offset-lg-1 border border-1 border-warning">
                        <div class="row">

                            <div class="col-12  mt-5 mb-5">
                                <div class="row">



                                    <div class="col-12 col-lg-4 mt-5">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="row">
                                                    <div class="col-8 mt-5 offset-2">
                                                        <div class="row">
                                                            <div class="col-12 mt-5">
                                                                <div class="row">

                                                                    <div class="col-12 mt-5 mb-3">
                                                                        <div class="d-flex flex-column align-items-center">
                                                                            <input type="file" id="image" class="d-none" accept="image/*" />
                                                                            <label for="image" onclick="changeAImage();">

                                                                                <?php

                                                                                $ars = Database::search("SELECT * FROM `admin` WHERE `id`='" . $admindata["id"] . "' ");
                                                                                $adata = $ars->fetch_assoc();

                                                                                if (empty($adata["image"])) {
                                                                                ?>
                                                                                    <img src="resources\user.png" class="rounded-circle" style="width: 150px; height: 150px;" id="img">
                                                                                <?php
                                                                                } else {
                                                                                ?>
                                                                                    <img src="<?php echo $adata["image"]; ?>" class="rounded-circle" style="width: 150px; height: 150px;" id="img">
                                                                                <?php
                                                                                }

                                                                                ?>


                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-12 text-center">
                                                                        <label class="form-label  text-white mt-3 mb-3"><?php echo $adata["fname"] . " " . $adata["lname"]; ?></label>
                                                                    </div>
                                                                    <div class="col-6 offset-3 mb-3 mt-3  text-center">
                                                                        <button class=" btn btn-warning" onclick="uploadAImage('<?php echo $adata['email']; ?>');">Upload Image</button>
                                                                    </div>

                                                                    <div class="col-8 offset-2 mb-3 mt-5 text-center ">
                                                                        <button class=" btn btn-danger" onclick="aLogout();">Log Out</button>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-12 col-lg-8">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="row">

                                                    <div class="col-8 offset-2 mt-5 mb-5">
                                                        <div class="row">
                                                            <div class="col-12">
                                                                <div class="row">

                                                                    <div class="col-12 text-start mt-5 mb-3 ">
                                                                        <label class="form-label fw-bold text-white ">First Name</label>
                                                                        <input type="text " class="form-control" value="<?php echo $adata["fname"]; ?>" id="f">
                                                                    </div>

                                                                    <div class="col-12 text-start mb-3">
                                                                        <label class="form-label fw-bold text-white ">Last Name</label>
                                                                        <input type="text" class="form-control" value="<?php echo $adata["lname"]; ?>" id="l">
                                                                    </div>
                                                                    <div class="col-12 text-start mb-3">
                                                                        <label class="form-label fw-bold text-white ">Email</label>
                                                                        <input type="text" class="form-control" value="<?php echo $adata["email"]; ?>" readonly>
                                                                    </div>
                                                                    <div class="col-12 text-start mb-3">
                                                                        <label class="form-label fw-bold text-white ">Mobile</label>
                                                                        <input type="text" class="form-control" value="<?php echo $adata["mobile"]; ?>" id="m">
                                                                    </div>
                                                                    <div class="col-12 text-start mb-3">
                                                                        <label class="form-label fw-bold text-white">Address</label>
                                                                        <input type="text" class="form-control" value="<?php echo $adata["address"]; ?>" id="a">
                                                                    </div>
                                                                    <div class="col-12 text-start mb-3">
                                                                        <label class="form-label fw-bold text-white ">Gender</label>
                                                                        <select name="gender" class="form-select" id="g">

                                                                            <?php

                                                                            $gender_rs = Database::search("SELECT * FROM `gender`");
                                                                            $gender_num = $gender_rs->num_rows;

                                                                            for ($x = 0; $x < $gender_num; $x++) {

                                                                                $gender_data = $gender_rs->fetch_assoc();

                                                                            ?>
                                                                                <option value="<?php echo $gender_data["id"]; ?>"><?php echo $gender_data["gender"]; ?></option>
                                                                            <?php
                                                                            }

                                                                            ?>


                                                                        </select>
                                                                    </div>


                                                                    <div class="col-12 mt-3 mb-5 d-grid">
                                                                        <button class="btn btn-success" onclick="updateAProfile('<?php echo $adata['email']; ?>');">Update Profile</button>
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