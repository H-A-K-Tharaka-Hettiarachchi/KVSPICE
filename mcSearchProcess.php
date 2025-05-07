<?php

require "connection.php";

$txt = $_POST["t"];

$query = "SELECT * FROM `customer`";

if (!empty($txt)) {
    $query .= " WHERE `fname` LIKE '%" . $txt . "%' OR `lname` LIKE '%" . $txt . "%'  ";
}



$crs =  Database::search($query);

$cnum = $crs->num_rows;

if ($cnum != 0) {




    for ($x = 1; $x <= $cnum; $x++) {

        $cdata = $crs->fetch_assoc();

        $srs = Database::search("SELECT * FROM `status` WHERE `id`='" . $cdata["status_id"] . "' ");
        $sdata = $srs->fetch_assoc();


?>

        <div class="col-12 mb-3">
            <div class="row">



                <div class="col-1 fs-5 border-1 border-bottom border-white border-end">0<?php echo ($x); ?></div>
                <div class="col-7 col-lg-5 col-xl-3 fs-5 border-1 border-bottom border-white border-end"><?php echo ($cdata["fname"] . " " . $cdata["lname"]); ?></div>
                <div class="col-3 fs-5 d-none d-lg-none d-xl-block border-1 border-bottom border-white border-end"><?php echo ($cdata["email"]); ?></div>

                <?php


                $blo_status = $cdata["blo_status_id"];


                ?>
                <div class="col-2 fs-5 border-1 border-bottom border-white border-end text-center d-none d-lg-block"><?php echo ($cdata["mobile"]); ?></div>
                <div class="col-2 fs-6 border-1 border-bottom border-white border-end text-center"><?php echo ($sdata["status"]); ?></div>




                <?php
                if ($blo_status == 1) {
                ?>
                    <div class="col-2 col-lg-2 col-xl-1 fs-5 border-1 border-bottom border-white"> <button class=" btn btn-danger mt-1 mb-1" onclick="cBlockUnblock('<?php echo $cdata['id']; ?>');" id="cblockbtn<?php echo $cdata['id']; ?>">Block</button></div>

                <?php

                } else if ($blo_status == 2) {
                ?>
                    <div class="col-2 col-lg-2 col-xl-1 fs-5 border-1 border-bottom border-white"> <button class=" btn btn-danger mt-1 mb-1 " onclick="cBlockUnblock('<?php echo $cdata['id']; ?>');" id="cblockbtn<?php echo $cdata['id']; ?>">UnBlock</button></div>

                <?php
                }

                ?>


            </div>
        </div>


    <?php


    }
} else {

    ?>

    <div class="col-12 col-lg-8 offset-lg-2 mb-5 text-center">

        <div class="col-12 text-white">
            <span class="col-12 fw-bold"><i class="bi bi-search text-warning" style="font-size: 200px;"></i></span>
        </div>
        <div class="col-12 text-white">
            <h1>Not Found Customers.</h1>
        </div>

    </div>

<?php

}

?>