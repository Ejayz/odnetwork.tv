<?php
include "db.php";

$sql = "select * from transmission_type where IS_EXIST='true'";
$stmt = $connect->prepare($sql);
$stmt->execute();
$result = $stmt->get_result();
while ($row = $result->fetch_assoc()) {
    echo '<option value="' . $row["TRANSMISSION_TYPE_ID"] . '">' . $row["TRANSMISSION_TYPE_NAME"] . '</option>';
}
