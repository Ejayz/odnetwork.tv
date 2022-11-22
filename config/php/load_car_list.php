<?php

include "db.php";
include 'general_function.php';
$page = json_decode(pagination_data_tracker($_POST["page_num"]),true);
$data_start = $page["limit_start"];
$data_end = $page["limit_end"];


$sql = "select * from car_information where IS_EXIST='true' LIMIT ?,?";
$stmt = $connect->prepare($sql);
$stmt->bind_param("ii",$data_start,$data_end);
$stmt->execute();
$result = $stmt->get_result();
if ($result->num_rows != 0) {
    while ($row = $result->fetch_assoc()) {

        echo ' <tr class="w-full h-12 text-center bg-gray-700 text-white font-light">
    <td>' . $row["CAR_NAME"] . '</td>
    <td>' . $row["CAR_TYPE"] . '</td>
    <td>' . $row["CAR_NUM_SEATS"] . '</td>
    <td>' . $row["CAR_BRAND"] . '</td>
    <td><a class="hover:text-blue-500" href="#edit?uid=' . $row["CAR_ID"] . '">Edit</a> | <a class="hover:text-blue-500" href="#delete?uid=' . $row["CAR_ID"] . '">Delete</a></td>
                    </tr>';
    }
} else {
    echo ' <tr class="w-full h-12 text-center bg-gray-700 text-white font-light">
    <td colspan="5">No data can be loaded at the moment . Add new car information first</td>
 </tr>';
}
