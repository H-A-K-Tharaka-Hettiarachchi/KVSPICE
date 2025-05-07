<?php

session_start();
require "connection.php";

if (isset($_SESSION["cus"])) {

    Database::iud("UPDATE `customer` SET `verification_code`='' ");

    $_SESSION["cus"] = null;
    session_destroy();

    echo ("success");
}
