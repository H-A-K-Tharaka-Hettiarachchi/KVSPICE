<?php

require "connection.php";

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>KV SPICE | Advanced Search</title>

    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="icon" href="resources/kv.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

</head>

<body class="bg-black ">

    <div class="container-fluid">

        <div class="row">

            <?php include "header.php"; ?>
            <div class="col-10">
                <hr class="border-3 border border-white">
            </div>

            <div class="bg-black">



                <div class="row">
                    <div class="offset-lg-4 col-12 col-lg-4">
                        <div class="row">
                            <div class="col-10 offset-1 text-center mt-3">
                                <p class="fs-1 text-warning fw-bold mt-3 mb-2 pt-2"><i class="bi bi-search fs-1"></i>&nbsp;Advanced Search</p>
                            </div>
                        </div>
                    </div>
                </div>




                <hr class="border-1 mb-5 text-white ">

                <div class="col-12 ">


                    <div class="row text-center">

                        <div class="col-lg-12 col-12 offset-lg-0 mb-3 bg-dark p-0 rounded-5">

                            <div class="col-12 border border-1 border-secondary rounded-5">


                                <div class="col-12  card-group mt-5 mb-3">
                                    <div class="col-lg-7 col-10 offset-1 mb-3">
                                        <input type="text" class="col-12 form-control" placeholder="Type KeyWord to Search..." id="t">
                                    </div>

                                    <div class="col-lg-2 col-6 offset-3 offset-lg-1 mb-3">
                                        <button class="col-12 btn btn-outline-primary " onclick="advancedSearch();">Search</button>
                                    </div>
                                </div>
                                <hr class="border border-2 border-secondary">

                                <div class="col-12 card-group mb-3 rounded-5">

                                    <div class="col-12 col-lg-4 border border-1 border-secondary rounded-5">

                                        <div class="col-12 mb-2 mt-5">

                                            <select class="bg-secondary col-12 p-2 mb-3 text-center text-white border-0  dropdown" id="c">
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









                                        <div class="col-10 offset-1 mb-5">
                                            <div class="col-12 mb-2">
                                                <input type="number" class="form-control col-12 mt-2" min="1" placeholder="Price From..." id="pf">
                                            </div>
                                            <div class="col-12 mb-2">
                                                <input type="number" class="form-control col-12 mb-2" min="1" placeholder="Price To..." id="pt">
                                            </div>
                                        </div>



                                        <div class="col-6 offset-3  mb-4 mt-5">

                                            <div class="form-check mb-2">
                                                <input class="form-check-input fs-5" type="radio" value="" name="price" id="phtl" >
                                                <label class="form-check-label text-white " for="phtl">
                                                    Price Hight to Low
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input fs-5" type="radio" value="" name="price" id="plth" >
                                                <label class="form-check-label text-white " for="plth">
                                                    Price Low to Hight
                                                </label>
                                            </div>

                                        </div>


                                        <div class="col-6 offset-3  mb-4">

                                            <div class="form-check mb-2">
                                                <input class="form-check-input fs-5" type="radio" value="" name="price" id="qhtl" >
                                                <label class="form-check-label text-white " for="qhtl">
                                                    Quantity Hight to Low
                                                </label>
                                            </div>
                                            <div class="form-check">
                                                <input class="form-check-input fs-5" type="radio" value="" name="price" id="qlth">
                                                <label class="form-check-label text-white " for="qlth">
                                                    Quantity Low to Hight
                                                </label>
                                            </div>

                                        </div>

                                    </div>

                                    <div class="col-12 col-lg-8 mb-5">

                                        <div class="col-12 chatBox" id="advancedSearchResult">
                                            <div class="row">

                                                <div class="col-12 text-white">
                                                    <span class="col-12 fw-bold"><i class="bi bi-search" style="font-size: 200px;"></i></span>
                                                </div>
                                                <div class="col-12 text-white">
                                                    <h1>No Items Search Yet.</h1>
                                                </div>


                                            </div>
                                        </div>

                                    </div>

                                </div>



                            </div>

                        </div>

                    </div>



                </div>

                <hr class="border-1 mb-5 text-white ">


            </div>



            <?php include "footer.php"; ?>


        </div>



    </div>







    <script src="script.js"></script>
    <script src="bootstrap.js"></script>
    <script src="bootstrap.bundle.js"></script>
</body>

</html>