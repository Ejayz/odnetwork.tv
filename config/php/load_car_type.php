<?php
include "db.php";
$sql = "select * from car_type where IS_EXIST='true'";
$stmt = $connect->prepare($sql);
$stmt->execute();
$result = $stmt->get_result();
while ($row = $result->fetch_assoc()) {
    echo '<option value="' . $row["CAR_TYPE_ID"] . '">' . $row["CAR_TYPE_NAME"] . '</option>';
}
