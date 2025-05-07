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
            <div class="col-12">
                <div class="row">

                    <div class="col-12">
                        <div class="row">

                            <hr>
                            <div class="col-12 bg-dark">
                                <div class="row">
                                    <div class="col-12 title4 text-center text-white">KV SPICE</div>
                                </div>
                            </div>

                            <hr>

                            <div class="col-12 bg-dark">
                                <div class="row">

                                    <div class="col-12 fs-1 text-center text-white">Add New Product</div>

                                </div>
                            </div>

                        </div>
                    </div>

                    <div class=" col-12 col-lg-8 offset-lg-2 bg-dark mt-5 mb-5">

                        <div class="row">


                            <div class="col-12 text-white">
                                <div class="row">

                                    <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="adminPanel.php">DashBoard</a></li>
                                            <li class="breadcrumb-item active text-white" aria-current="page">Add Product</li>
                                        </ol>
                                    </nav>
                                </div>
                            </div>

                            <div class="col-12 mt-5">
                                <div class="row">
                                    <div class="col-10 offset-1">
                                        <div class="row">
                                            <div class="col-12">
                                                <label class=" form-label text-white">Title</label>
                                                <input type="text" class="form-control" id="t">
                                            </div>
                                            <div class="col-12 mt-3">
                                                <label class=" form-label text-white">Category</label>
                                                <select name="" id="c" class="form-select">

                                                    <option value="0">Select Category</option>


                                                    <?php

                                                    $c_rs = Database::search("SELECT * FROM `category`");
                                                    $c_num = $c_rs->num_rows;

                                                    for ($x == 0; $x < $c_num; $x++) {

                                                        $c_data = $c_rs->fetch_assoc();

                                                    ?>

                                                        <option value="<?php echo $c_data["id"]; ?>"><?php echo $c_data["category"]; ?></option>

                                                    <?php

                                                    }

                                                    ?>

                                                </select>
                                            </div>

                                            <div class="col-12 mt-3">
                                                <label class=" form-label text-white">Description</label>
                                                <textarea cols="30" rows="10" class="form-control" id="d"></textarea>
                                            </div>
                                            <div class="col-12 mt-3 mb-3 ">
                                                <label class=" form-label text-white">Quantity</label>
                                                <input type="number" value="0" min="1" class="form-control" id="q">
                                            </div>
                                            <div class="col-12 mt-3 mb-3 ">
                                                <label class=" form-label text-white">Price</label>
                                                <input type="text" class="form-control" id="p">
                                            </div>
                                            <div class="col-12 mt-3 mb-3 ">
                                                <label class=" form-label text-white">Delivery Fee</label>
                                                <input type="text" class="form-control" id="df">
                                            </div>
                                            <div class=" col-12 mt-5 mb-3">
                                                <label for="" class="form-label text-white">Add Images</label>
                                            </div>
                                            <div class=" col-8 offset-2 mb-5 text-center">

                                                <input type="file" class="d-none" id="iu" multiple />

                                                <label for="iu" class="col-12 btn btn-primary rounded-5" onclick="setImage();">
                                                    <img src="resources\9040482_folder_plus_icon.png" id="i" class="img-fluid rounded-5" style="height: 300px;">
                                                </label>
                                            </div>
                                            <div class="col-8 offset-2 mt-5 mb-5 d-grid">
                                                <button class="btn btn-warning fs-3 mb-5" onclick="addProduct();">Save Product</button>
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

</body>

</html>