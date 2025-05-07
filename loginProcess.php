<?php

session_start();

require "connection.php";

$email = $_POST["e"];
$password = $_POST["p"];
$rememberme = $_POST["r"];





if (empty($email)) {
    echo ("Please Enter Your Email.");
} else if (strlen($email) >= 100) {
    echo ("Email Must Have Less Than 100 Characters");
} else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo ("Invalid Email.");
} else if (empty($password)) {
    echo ("Please Enter Your Password.");
} else if (strlen($password) < 8 || strlen($password) > 20) {
    echo ("Passwoord Must Have Between 5-20 Characters");
} else {



    $rs = Database::search("SELECT * FROM `customer` WHERE `email`='" . $email . "' AND `password`='" . $password . "' ");
    $num = $rs->num_rows;



    if ($num == 1) {
        $data = $rs->fetch_assoc();
        if ($data["blo_status_id"] == 2) {
            echo ("Youre Account Has Banned");
        } else {
            Database::iud("UPDATE `customer` SET `status_id`='2' WHERE `email`='" . $email . "' ");


            if (isset($_SESSION["admin"])) {
                Database::iud("UPDATE `admin` SET `verification_code`='' ");
                $_SESSION["admin"] = null;
                session_destroy();

                if (!isset($_SESSION["admin"])) {
                    session_start();
                    $_SESSION["cus"] = $data;
                }
            } else {
                $_SESSION["cus"] = $data;
            }



            if ($rememberme == "true") {

                setcookie("email", $email, time() + (60 * 60 * 24 * 365));
                setcookie("password", $password, time() + (60 * 60 * 24 * 365));
                setcookie("rememberme", $rememberme, time() + (60 * 60 * 24 * 365));
            } else {

                setcookie("email", "", -1);
                setcookie("password", "", -1);
                setcookie("rememberme", "", -1);
            }

            echo ("success");
        }
    } else {

        echo ("Invalid Email or Password");
    }
}
