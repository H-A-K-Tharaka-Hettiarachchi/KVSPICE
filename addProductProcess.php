<?php



require "connection.php";

$title = $_POST["t"];
$category = $_POST["c"];
$description = $_POST["d"];
$qty = $_POST["q"];
$price = $_POST["p"];
$delivery_fee = $_POST["df"];




if (empty($title)) {
    echo ("Please Enter  Title !");
} else if (strlen($title) >= 100) {
    echo ("Title Should Have Lower Than 100 Characters. ");
} else if ($category == "0") {
    echo ("Please Select Category !");
} else if (empty($description)) {
    echo ("Please Enter  Description !");
} else if (empty($qty)) {
    echo ("Please Set Quantity !");
} else if ($qty == "0" | $qty == "e" | $qty < 0) {
    echo ("Invalid Value For Quantity!");
} else if (empty($price)) {
    echo ("Please Enter  Price !");
} else if (empty($delivery_fee)) {
    echo ("Please Enter Delivery Fee !");
} else {



    $d = new DateTime();
    $tz = new DateTimeZone("Asia/Colombo");
    $d->setTimezone($tz);
    $date = $d->format("Y-m-d H:i:s");



    Database::iud("INSERT INTO `product` (`title`,`category_id`,`description`,`qty`,`price`,`add_date`,`delivery_fee`,`blo_status_id`,`rem_status_id`) VALUES ('" . $title . "','" . $category . "','" . $description . "','" . $qty . "','" . $price . "','" . $date . "','" . $delivery_fee . "','1','1') ");

    $product_id = Database::$connection->insert_id;


    $length = sizeof($_FILES);

    if ($length > 1) {
        echo ("You Can Select Only One Image");
    } else {

        $allowed_img_extentions = array("image/jpg", "image/jpeg", "image/png", "image/svg+xml");


        if (isset($_FILES["iu"])) {

            $img_file = $_FILES["iu"];
            $file_extention = $img_file["type"];

            if (in_array($file_extention, $allowed_img_extentions)) {

                $new_image_extention;

                if ($file_extention == "image/jpg") {
                    $new_image_extention = ".jpg";
                } else if ($file_extention == "image/jpeg") {
                    $new_image_extention = ".jpeg";
                } else if ($file_extention == "image/png") {
                    $new_image_extention = ".png";
                } else if ($file_extention == "image/svg+xml") {
                    $new_image_extention = ".svg";
                }

                $file_name = "resources/product_img/" . $title . "_" . uniqid() . $new_image_extention;
                move_uploaded_file($img_file["tmp_name"], $file_name);

                Database::iud("INSERT INTO `images`(`path`,`product_id`) VALUES ('" . $file_name . "','" . $product_id . "')");

                echo ("success");
            } else {
                echo ("Invalid image type!");
            }
        }
    }
}
