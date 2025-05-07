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

<body class="bg-black">


    <div class=" container-fluid align-items-center">
        <div class="row align-self-center">

            <div class="col-12">
                <div class="row">

                    <div class="col-12 text-center text-white bg-dark title1 mt-5">
                        KV SPICE
                    </div>

                    <!-- Registration -->

                    <div class=" col-12 col-lg-8 offset-lg-2 bg-dark mt-5 rounded mb-5" id="registration">
                        <div class=" row">

                            <div class="col-12 mt-3 mb-3 text-warning text-center fs-1">Registration</div>

                            <div class="col-12 mt-3 mb-3">

                                <div class="row">
                                    <div class="col-6 mb-1">
                                        <label class="form-label fs-4 text-white">First Name</label>
                                        <input type="text" class="form-control" id="fn">
                                    </div>
                                    <div class="col-6 mb-1">
                                        <label class="form-label fs-4 text-white">Last Name</label>
                                        <input type="text" class="form-control" id="ln">
                                    </div>
                                </div>

                            </div>
                            <div class="col-12 mb-3">
                                <div class="row">
                                    <div class="col-12 mb-1">
                                        <label class="form-label fs-4 text-white">Email</label>
                                        <input type="email" class="form-control" id="e">
                                    </div>
                                    <div class="col-12 mb-1">
                                        <label class="form-label fs-4 text-white">Password</label>
                                        <input type="password" class="form-control" id="p">
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 mt-3 mb-3">

                                <div class="row">
                                    <div class="col-6 mb-1">
                                        <label class="form-label fs-4 text-white">Mobile</label>
                                        <input type="text" class="form-control" value="+94" id="m">
                                    </div>
                                    <div class="col-6 mb-1">
                                        <label class="form-label fs-4 text-white">Gender</label>
                                        <select name="gender" id="g" class="form-select">

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
                                </div>

                            </div>
                            <div class="col-12 mt-5 mb-3 ">

                                <div class="row">
                                    <div class="col-6 mb-1 d-grid">
                                        <button class="btn btn-warning fs-5" onclick="register();">Register</button>
                                    </div>
                                    <div class="col-6 mb-1 d-grid">
                                        <button class="btn btn-primary fs-5" onclick="changeView();">Log In</button>
                                    </div>
                                </div>

                            </div>
                            <div class="col-12 mb-5 mt-5">
                                <div class="row">
                                    <div class="col-6 offset-3 d-grid">
                                        <button class="btn btn-danger fs-5" onclick="window.location='adminSignIn.php'">Admin Sign In</button>
                                    </div>
                                </div>
                            </div>

                        </div>


                    </div>
                    <!-- Registration -->



                    <!-- Log In -->

                    <div class=" col-12 col-lg-6 offset-lg-3 bg-dark mt-5 rounded d-none" id="login">

                        <div class="row">

                            <div class="col-12 mt-3 mb-3 text-warning text-center fs-1 mt-5">Log In</div>

                            <?php

                            $email = "";
                            $password = "";
                            $rememberme = "";

                            if (isset($_COOKIE["email"])) {
                                $email = $_COOKIE["email"];
                            }

                            if (isset($_COOKIE["password"])) {
                                $password = $_COOKIE["password"];
                            }

                            ?>

                            <div class="col-12 mb-3">
                                <div class="row">
                                    <div class="col-12 mb-1">
                                        <label class="form-label fs-4 text-white">Email</label>
                                        <input type="email" class="form-control" id="e2" value="<?php echo $email; ?>">
                                    </div>
                                    <div class="col-12 mb-1">
                                        <label class="form-label fs-4 text-white">Password</label>
                                        <input type="password" class="form-control" id="p2" value="<?php echo $password; ?>">
                                    </div>
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="form-check fs-4 text-white">
                                    <input class="form-check-input" type="checkbox" value="1" id="rememberme" <?php if (isset($_COOKIE["rememberme"])) {
                                                                                                                    $rememberme = $_COOKIE["rememberme"];
                                                                                                                    if ($rememberme == "true") {
                                                                                                                ?>checked <?php
                                                                                                                        }
                                                                                                                    } ?>>
                                    <label class="form-check-label" for="flexCheckDefault">Remember Me</label>
                                </div>
                            </div>
                            <div class="col-6 text-end">
                                <a href="#" class="link-light" onclick="forgotPassword();">Forgot Password</a>
                            </div>

                            <!-- FPWM -->
                            <div class="modal" tabindex="-1" id="forgotpwm">
                                <div class="modal-dialog  modal-dialog-centered">
                                    <div class="modal-content bg-dark">
                                        <div class="modal-header">
                                            <h5 class="modal-title text-white">Reset Password</h5>
                                            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row g-3">
                                                <div class="col-6">
                                                    <label class="form-label text-white">New Password</label>
                                                    <div class="input-group mb-3">
                                                        <input type="password" class="form-control text-white bg-black" id="npi">
                                                        <button class="btn btn-outline-secondary" type="button" onclick="showPassword1();"><i id="eye1" class="bi bi-eye-slash-fill text-white"></i></button>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <label class="form-label text-white">Re-Type Password</label>
                                                    <div class="input-group mb-3">
                                                        <input type="password" class="form-control text-white bg-black" id="rnp">
                                                        <button class="btn btn-outline-secondary" type="button" onclick="showPassword2();"><i id="eye2" class="bi bi-eye-slash-fill text-white"></i></button>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <label class="form-label text-white">Verification Code</label>
                                                    <input type="text" class="form-control text-white bg-black" id="vc">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary" onclick="resetpw();">Reset</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- FPWM -->


                            <div class="col-12 mt-5 mb-3 ">

                                <div class="row">
                                    <div class="col-6 mb-1 d-grid">
                                        <button class="btn btn-primary fs-5" onclick="login();">Log In</button>
                                    </div>
                                    <div class="col-6 mb-1 d-grid">
                                        <button class="btn btn-warning fs-5" onclick="changeView();">Are You New ? Register</button>
                                    </div>
                                </div>

                            </div>
                            <div class="col-12 mb-5 mt-5">
                                <div class="row">
                                    <div class="col-6 offset-3 d-grid">
                                        <button class="btn btn-danger fs-5" onclick="window.location='adminSignIn.php'">Admin Sign In</button>
                                    </div>
                                </div>
                            </div>


                        </div>

                    </div>

                    <!-- Log In -->



                    <div class=" col-12 fixed-bottom text-center bg-dark mt-5 d-none d-lg-block">
                        <div class="row">
                            <div class="col-12 fs-5 text-white">
                                Copyright &copy; 2022 KSHPRIME All Right Reserved.
                            </div>
                        </div>
                    </div>


                </div>

            </div>

        </div>
    </div>

    <script src="script.js"></script>
    <script src="bootstrap.bundle.js"></script>
    <script src="bootstrap.js"></script>

</body>

</html>