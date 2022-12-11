<?php
include "db.php";

$video_id = $connect->real_escape_string($_POST["video_id"]);


$sql = "UPDATE `videos` SET`VIDEO_VIEWS`=VIDEO_VIEWS+1 WHERE VIDEO_ID=? AND IS_EXIST='true'";
$stmt = $connect->prepare($sql);
$stmt->bind_param("s", $video_id);
if ($stmt->execute()) {
    
}
