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


    <div class=" container-fluid align-items-center">
        <div class="row align-self-center">

            <div class="col-12">
                <div class="row">

                    <div class="col-12 text-center text-white bg-dark title1 mt-5">
                        KV SPICE
                    </div>




                    <!-- Admin Sign In -->

                    <div class=" col-12 col-lg-6 offset-lg-3 bg-dark mt-5 rounded " id="login">

                        <div class="row">

                            <div class="col-12 mt-3 mb-3 text-warning text-center fs-1 mt-5">Admin Sign In</div>



                            <div class="col-12 mb-3">
                                <div class="row">
                                    <div class="col-12 mb-1">
                                        <label class="form-label fs-4 text-white">Email</label>
                                        <input type="email" class="form-control" id="e">
                                    </div>

                                    <div class="col-12 mb-1 mt-3 d-grid">
                                        <button class="btn btn-primary fs-5" onclick="sendAdminVerificationCode();">Send Verification Code</button>
                                    </div>

                                    <div class="col-12 mb-1">
                                        <label class="form-label fs-4 text-white">Verification Code</label>
                                        <input type="password" class="form-control" id="vc">
                                    </div>
                                </div>
                            </div>







                            <div class="col-12 mt-5 mb-3 ">

                                <div class="row">
                                    <div class="col-6 mb-1 d-grid">
                                        <button class="btn btn-success fs-5" onclick="adminVerify();">Verify</button>
                                    </div>
                                    <div class="col-6 mb-1 d-grid">
                                        <button class="btn btn-warning fs-5" onclick="window.location='index.php'">Back To Customer Log In</button>
                                    </div>
                                </div>

                            </div>



                        </div>

                    </div>

                    <!-- Admin Sign In -->



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