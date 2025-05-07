<?php

session_start();
require "connection.php";


if (isset($_SESSION["admin"])) {

    if (isset($_POST["t"])) {

        $txt = $_POST["t"];

        $rs = Database::search("SELECT * FROM `category` WHERE `category`='" . $txt . "'");

        if ($rs->num_rows == 1) {
            echo ("3");
        } else {

            Database::iud("INSERT INTO `category` (`category`) VALUES ('" . $txt . "')");

            $crs = Database::search("SELECT * FROM `category`");

?>
            <div class="row">
                <?php
                for ($x = 0; $x < $crs->num_rows; $x++) {

                    $cdata = $crs->fetch_assoc();

                ?>


                    <div class="col-3 offset-2 bg-ash text-center mt-3 mb-3 rounded rounded-2">
                        <p class="text-warning fs-5 mt-2 mb-2"><?php echo $cdata["category"];
                                                                ?></p>
                    </div>

                <?php


                }

                ?>

            </div>

<?php
        }
    } else {
        echo ("2");
    }
} else {

    echo ("1");
}
?>