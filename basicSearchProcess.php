<?php

require "connection.php";

$txt = $_POST["t"];
$select = $_POST["s"];

$query = "SELECT * FROM `product`";

if (!empty($txt) && $select == 0) {
    $query .= " WHERE `title` LIKE '%" . $txt . "%'  ";
} else if (empty($txt) && $select != 0) {
    $query .= " WHERE `category_id`='" . $select . "'";
} else if (!empty($txt) && $select != 0) {
    $query .= " WHERE `title` LIKE '%" . $txt . "%' AND `category_id`='" . $select . "' ";
}

?>

<div class="row">
    <div class="col-12 text-center">
        <div class="row justify-content-center">

            <?php

            if ($query == "SELECT * FROM `product`") {
                $query .= " WHERE `blo_status_id`='1' ";
            } else {
                $query .= " AND `blo_status_id`='1' ";
            }

            $selected_rs =  Database::search($query);

            $selected_num = $selected_rs->num_rows;

            if ($selected_num == 0) {

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
                for ($x = 0; $x < $selected_rs->num_rows; $x++) {

                    $pdata = $selected_rs->fetch_assoc();

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
                                <a class="btn btn-warning mt-3" href="<?php echo "singleProductView.php?id=" . $pdata["id"];  ?> ">By Now</a>
                                <button class="btn btn-success mt-3" onclick="addToCart('<?php echo 'singleProductView.php?id=' . $pdata['id'];  ?>');">Add To Cart</button>
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