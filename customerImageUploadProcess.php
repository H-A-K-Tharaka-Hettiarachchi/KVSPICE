<?php

session_start();

require "connection.php";


$email = $_POST["email"];

if (isset($_FILES["image"])) {
    $image = $_FILES["image"];

    $allowed_image_extentions = array("image/jpg", "image/jpeg", "image/png", "image/svg+xml");
    $file_ex = $image["type"];

    if (!in_array($file_ex, $allowed_image_extentions)) {
        echo ("Please select a valid image.");
    } else {

        $new_file_extention;

        if ($file_ex == "image/jpg") {
            $new_file_extention = ".jpg";
        } else if ($file_ex == "image/jpeg") {
            $new_file_extention = ".jpeg";
        } else if ($file_ex == "image/png") {
            $new_file_extention = ".png";
        } else if ($file_ex == "image/svg+xml") {
            $new_file_extention = ".svg";
        }

        $file_name = "resources/profile_image/" . $_SESSION["cus"]["fname"] . "_" . uniqid() . $new_file_extention;

        move_uploaded_file($image["tmp_name"], $file_name);



        Database::iud("UPDATE `customer` SET `image` = '" . $file_name . "' WHERE `email` = '" . $email . "'");

        echo ("success");
    }
} else {
    echo ("Please Select Image");
}
