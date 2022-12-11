<?php
include "db.php";
include "general_function.php";
session_start();
$wallet = $connect->real_escape_string($_SESSION["wallet"]);
$video_id=$connect->real_escape_string($_POST["?video_id"]);
echo $video_id;
$sql="select * from videos where VIDE_ID=? and IS_EXIST='true'";