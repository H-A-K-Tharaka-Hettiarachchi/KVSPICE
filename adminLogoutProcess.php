<?php

session_start();
require "connection.php";

if (isset($_SESSION["admin"])) {

    Database::iud("UPDATE `admin` SET `verification_code`='' ");

    $_SESSION["admin"] = null;
    session_destroy();

    echo ("success");
}
