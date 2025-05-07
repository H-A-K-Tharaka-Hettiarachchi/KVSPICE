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
    <div class="container-fluid">
        <div class="row">

            <div class="col-12 mb-5">
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
                                                                                        <label for="image" onclick="changeCImage();">

                                                                                            <?php

                                                                                            $crs = Database::search("SELECT * FROM `customer` WHERE `id`='" . $cus_data["id"] . "' ");
                                                                                            $cdata = $crs->fetch_assoc();

                                                                                            if (empty($cdata["image"])) {
                                                                                            ?>
                                                                                                <img src="resources\user.png" class="rounded-circle" style="width: 150px; height: 150px;" id="img">
                                                                                            <?php
                                                                                            } else {
                                                                                            ?>
                                                                                                <img src="<?php echo $cdata["image"]; ?>" class="rounded-circle" style="width: 150px; height: 150px;" id="img">
                                                                                            <?php
                                                                                            }

                                                                                            ?>


                                                                                        </label>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-12 text-center">
                                                                                    <label class="form-label  text-white mt-3 mb-3"><?php echo $cdata["fname"] . " " . $cdata["lname"]; ?></label>
                                                                                </div>
                                                                                <div class="col-6 offset-3 mb-3 mt-3  text-center">
                                                                                    <button class=" btn btn-warning" onclick="uploadCImage('<?php echo $cdata['email']; ?>');">Upload Image</button>
                                                                                </div>

                                                                                <div class="col-8 offset-2 mb-3 mt-5 text-center ">
                                                                                    <button class=" btn btn-danger" onclick="cLogout();">Log Out</button>
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
                                                                                    <input type="text " class="form-control" value="<?php echo $cdata["fname"]; ?>" id="f">
                                                                                </div>

                                                                                <div class="col-12 text-start mb-3">
                                                                                    <label class="form-label fw-bold text-white ">Last Name</label>
                                                                                    <input type="text" class="form-control" value="<?php echo $cdata["lname"]; ?>" id="l">
                                                                                </div>
                                                                                <div class="col-12 text-start mb-3">
                                                                                    <label class="form-label fw-bold text-white ">Email</label>
                                                                                    <input type="text" class="form-control" value="<?php echo $cdata["email"]; ?>" readonly>
                                                                                </div>
                                                                                <div class="col-12 text-start mb-3">
                                                                                    <label class="form-label fw-bold text-white ">Mobile</label>
                                                                                    <input type="text" class="form-control" value="<?php echo $cdata["mobile"]; ?>" id="m">
                                                                                </div>
                                                                                <div class="col-12 text-start mb-3">
                                                                                    <label class="form-label fw-bold text-white">Address</label>
                                                                                    <input type="text" class="form-control" value="<?php echo $cdata["address"]; ?>" id="a">
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
                                                                                    <button class="btn btn-success" onclick="updateCProfile('<?php echo $cdata['email']; ?>');">Update Profile</button>
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


</body>

</html>

<?php

?>