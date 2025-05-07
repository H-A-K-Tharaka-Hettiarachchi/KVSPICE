<?php

require "connection.php";

$txt = $_POST["t"];

$query = "SELECT * FROM `product`";

if (!empty($txt)) {
    $query .= " WHERE `title` LIKE '%" . $txt . "%'  ";
}


if ($query == "SELECT * FROM `product`") {
    $query .= " WHERE `rem_status_id`='1' ";
} else {
    $query .= " AND `rem_status_id`='1' ";
}

$selected_rs =  Database::search($query);

$selected_num = $selected_rs->num_rows;

if ($selected_num == 0) {

?>

    <div class="row">

        <div class="col-12 col-lg-8 offset-lg-2 mb-5 text-center">

            <div class="col-12 text-white">
                <span class="col-12 fw-bold"><i class="bi bi-search text-warning" style="font-size: 200px;"></i></span>
            </div>
            <div class="col-12 text-white">
                <h1>Not Found Products .</h1>
            </div>

        </div>
    </div>

<?php
} else {

?>


    <div class="col-12 text-center">
        <div class=" row justify-content-center">

            <?php
            $prs = Database::search($query);

            for ($x = 0; $x < $prs->num_rows; $x++) {

                $pdata = $prs->fetch_assoc();

                $date_time = strtotime($pdata["add_date"]);
                $date = date('Y/m/d ', $date_time);


            ?>
                <div class="col-12 bg-dark mt-3">
                    <div class="row">

                        <div class="col-1 mt-2 mb-2">
                            <h5 class="text-white mt-1 mb-1">0<?php echo $pdata["id"]; ?></h5>
                        </div>
                        <div class="col-2 col-lg-2 text-center mt-2 mb-2">
                            <h5 class="text-white mt-1 mb-1"><?php echo $pdata["title"]; ?></h5>
                        </div>
                        <div class="col-1 d-none d-lg-block text-center mt-2 mb-2">
                            <h5 class="text-white mt-1 mb-1"><?php echo $pdata["qty"]; ?></h5>
                        </div>
                        <div class="col-2 col-lg-2 text-center mt-2 mb-2">
                            <h5 class="text-white mt-1 mb-1">Rs.<?php echo $pdata["price"]; ?>.00</h5>
                        </div>
                        <div class="col-6 offset-1  d-block d-lg-none  mt-2 mb-2">
                            <div class="row">
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-4 text-center d-grid">
                                            <button class="btn btn-success" onclick="window.location='updateProduct.php?id=<?php echo $pdata['id']; ?>'">Update</button>
                                        </div>
                                        <div class="col-4 text-center d-grid">
                                            <?php

                                            $blo_status = $pdata["blo_status_id"];

                                            if ($blo_status == 1) {
                                            ?>
                                                <button class="btn btn-warning" id="pblockbtn<?php echo $pdata["id"]; ?>" onclick="productBlock('<?php echo $pdata['id']; ?>');">Block</button>

                                            <?php

                                            } else if ($blo_status == 2) {
                                            ?>
                                                <button class="btn btn-warning" id="pblockbtn<?php echo $pdata["id"]; ?>" onclick="productBlock('<?php echo $pdata['id']; ?>');">UnBlock</button>

                                            <?php
                                            }

                                            ?>
                                        </div>
                                        <div class="col-4 text-center d-grid">
                                            <button class="btn btn-danger" onclick="productDeleteAndRecover('<?php echo $pdata['id']; ?>');"><i class="bi bi-trash-fill fs-5"></i></button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-3 d-none d-lg-block text-center mt-2 mb-2">
                            <h5 class="text-white mt-1 mb-1"><?php echo $date; ?></h5>
                        </div>
                        <div class="col-3 d-none d-lg-block mt-2 mb-2">
                            <div class="row">
                                <div class="col-12">
                                    <div class="row">
                                        <div class="col-4 d-grid">
                                            <button class="btn btn-success" onclick="window.location='updateProduct.php?id=<?php echo $pdata['id']; ?>'">Update</button>
                                        </div>
                                        <div class="col-4 d-grid">
                                            <?php

                                            $blo_status = $pdata["blo_status_id"];

                                            if ($blo_status == 1) {
                                            ?>
                                                <button class="btn btn-warning" id="pblockbtn<?php echo $pdata["id"]; ?>" onclick="productBlock('<?php echo $pdata['id']; ?>');">Block</button>

                                            <?php

                                            } else if ($blo_status == 2) {
                                            ?>
                                                <button class="btn btn-warning" id="pblockbtn<?php echo $pdata["id"]; ?>" onclick="productBlock('<?php echo $pdata['id']; ?>');">UnBlock</button>

                                            <?php
                                            }

                                            ?>

                                        </div>
                                        <div class="col-2 d-grid">
                                            <button class="btn btn-danger" onclick="productDeleteAndRecover('<?php echo $pdata['id']; ?>');"><i class="bi bi-trash-fill fs-5"></i></button>
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
        </div>
    </div>

<?php

}

?>