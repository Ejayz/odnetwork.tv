<?php
include "db.php";
include "general_function.php";
session_start();
if (isset($_POST["token"])) {
    if (!jwt_verify($_POST["token"])) {
        echo "401:Unauthorized action! Please be sure you are logged in and using authorized account to do this action.";
        return 0;
    }
} else {
    echo "404:Something went wrong ! Data sent to server is incomplete. Please try again!";
    return 0;
}
$car_name = $connect->real_escape_string($_POST["car_name"]);
$car_brand = $connect->real_escape_string($_POST["car_brand"]);
$car_num_seat = $connect->real_escape_string($_POST["car_num_seat"]);
$car_color = $connect->real_escape_string($_POST["car_color"]);
$car_type = $connect->real_escape_string($_POST["car_type"]);
$transmission_type = $connect->real_escape_string($_POST["transmission_type"]);
$car_plate_num = $connect->real_escape_string($_POST["car_plate_num"]);
$car_id = generateUid();
$sql = "INSERT INTO `carmanagement`.`car_information` (`CAR_ID`, `CAR_PLATE_NUMER`, `CAR_NAME`, `CAR_BRAND`, `CAR_TRANSMISSION_TYPE_ID`, `CAR_NUM_SEATS`, `CAR_COLOR`, `CAR_TYPE`, `IS_CAR_AVAILABLE`) VALUES (?,?,?,?,?,?,?,?,'true');";
$stmt = $connect->prepare($sql);
$stmt->bind_param("ssssiisi", $car_id, $car_plate_num, $car_name, $car_brand, $transmission_type, $car_num_seat, $car_color, $car_type);
$result = $stmt->execute();
if ($result) {
    $_SESSION["token"] = jwt($car_id);
    echo "200:New car was added to record.:" . $_SESSION["token"] . "";
} else {
    echo "500:Something went wrong ! Please try again later .If error persist please contact support!";
}
