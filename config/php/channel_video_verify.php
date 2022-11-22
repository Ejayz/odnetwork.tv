<?php
include "general_function.php";
session_start();
$video_url = $_POST["youtube_link"];
$channel_id = $_SESSION["channel_id"];
if (!str_contains($video_url, "v=")) {
    echo json_encode(["0" => ["code" => 201, "message" => "Youtube url is invalid."]]);
    return 0;
}
$data = explode("v=", $video_url);
$response = get_youtube_details($data[1]);
$err = "";

if ($err) {
    echo json_encode(["0" => ["code" => 500, "message" => $err]]);
} else if (str_contains($response, "Not Found")) {
    echo json_encode(["0" => ["code" => 404, "message" => "Video not found . Are you using the correct link?"]]);
} else {
    $validator = json_decode($response, true);
    if (verify_ownership("UC9w8ssNRpCs78WaGsLJmX6A", $validator["items"]["0"]["snippet"]["channelId"]) == 200) {
        $res_handle = $validator;
        $res_handle[] = ["code" => 200];

        $res_handle["items"]["0"]["snippet"]["description"] = appendBr($res_handle["items"]["0"]["snippet"]["description"]);;
        echo   json_encode($res_handle);
    } else {
        $res_handle = json_decode($response, true);
        $res_handle[] = ["code" => 401, "message" => "This video do not belong to you! Link video that you own.If you think this is a mistake. Please contact support."];
        echo json_encode($res_handle);
    }
}
