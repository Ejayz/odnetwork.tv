<?php
include "general_function.php";
include "db.php";
session_start();
$video_id = generateVideoUid();
$user_id = $connect->real_escape_string($_SESSION["userid"]);
$video_url = $connect->real_escape_string($_POST["youtube_link"]);
$channel_id = $connect->real_escape_string($_SESSION["channel_id"]);
if (!str_contains($video_url, "v=")) {
    echo json_encode(["0" => ["code" => 201, "message" => "Youtube url is invalid."]]);
    return 0;
}
if (checkDups($connect, $user_id, $video_url)) {
    echo json_encode(["0" => ["code" => 944, "message" => "This video has been already posted!"]]);
    return 0;
}
$data = explode("v=", $video_url);
$response = get_youtube_details($data[1]);
if (str_contains($response, "Not Found")) {
    echo json_encode(["0" => ["code" => 404, "message" => "Video not found . Are you using the correct link?"]]);
} else {
    $validator = json_decode($response, true);
    if (verify_ownership($channel_id, $validator["items"]["0"]["snippet"]["channelId"]) == 200) {
        $res_handle = json_encode($validator["items"]["0"]["snippet"]);

        $sql = "INSERT INTO `od_networktv`.`videos` (`VIDEO_ID`, `USER_ID`, `VIDEO_URL`, `VIDEO_DETAILS`, `VIDEO_VIEWS`, `VIDEO_LIKES`) VALUES (?,?,?,?,0,0) ;";
        $stmt = $connect->prepare($sql);
        $stmt->bind_param("ssss", $video_id, $user_id, $video_url, $res_handle);
        if ($stmt->execute()) {
            echo json_encode(["0" => ["code" => 200, "message" => "New video was posted!"]]);
        } else {
            echo json_encode(["0" => ["code" => 500, "message" => "Something went wrong . Please contact support!"]]);
        }
    } else {
        $res_handle = json_decode($response, true);
        $res_handle[] = ["code" => 401, "message" => "This video do not belong to you! Link video that you own.If you think this is a mistake. Please contact support."];
        echo json_encode($res_handle);
    }
}
