<?php

require "connection.php";

$fn = $_POST["fn"];
$ln = $_POST["ln"];
$e = $_POST["e"];
$p = $_POST["p"];
$m = $_POST["m"];
$g = $_POST["g"];







if (empty($fn)) {

    echo ("Please Enter Your First Name");
} else if (strlen($fn) > 40) {

    echo ("First Name Must Be less than 40 Charcters");
} else if (empty($ln)) {

    echo ("Please Enter Your Last Name");
} else if (strlen($ln) > 40) {

    echo ("Last Name Must Be less than 40 Charcters");
} else if (empty($e)) {

    echo ("Please Enter Your Email !");
} else if (strlen($e) >= 100) {

    echo ("Email Must Have Less Than 100 Characters");
} else if (!filter_var($e, FILTER_VALIDATE_EMAIL)) {
    echo ("Invalid Email !");
} else if (empty($p)) {

    echo ("Please Enter Your Password !");
} else if (strlen($p) < 5 || strlen($p) > 20) {

    echo ("Password Must Be Between 8 - 20  Characters");
} else if (empty($m)) {

    echo ("Please Enter Your Mobile Number !");
} else if (strlen($m) != 12) {
    echo ("Mobile Must Have 10  Characters");
} else if (!preg_match("/947[0,1,2,4,5,6,7,8,][0-9]/", $m)) {
    echo ("Invalid Mobile Number !");
} else {

    $rs = Database::search("SELECT * FROM `customer` WHERE `email`='" . $e . "' OR `mobile`='" . $m . "' ");
    $num = $rs->num_rows;

    if ($num > 0) {

        echo ("Email or Mobile Number Is Already Using In Another Account.");
    } else {

        $d = new DateTime();
        $tz = new DateTimeZone("Asia/Colombo");
        $d->setTimezone($tz);
        $date = $d->format("y-m-d H:i:s");

        Database::iud("INSERT INTO `customer` (`email`,`fname`,`lname`,`password`,`mobile`,`gender_id`,`status_id`,`reg_date`,`blo_status_id`)
                       VALUES ('" . $e . "','" . $fn . "','" . $ln . "','" . $p . "','" . $m . "','" . $g . "','1','" . $date . "','1')");

        echo ("success");
    }
}
