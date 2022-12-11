<?php
session_start();
if (count($_SESSION) !== 5) {
    header("Location:/login.php");
}
include "config/php/general_function.php";

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/tailwind.css">
    <link rel="stylesheet" href="assets/notyf/notyf.min.css">
    <link rel="stylesheet" href="css/custom.css">
    <script src="assets/jquery.js"></script>
    <title>Video Feeds</title>
</head>

<body>
    <div id="new_video" class="absolute flex hidden h-full w-full overflow-hidden bg-gray-900/90">
        <div class="w-98per h-full flex flex-col my-auto">
            <div class="mt-2 w-full flex flex-row">
                <span class="text-white text-xl mr-auto ml-4 font-mono">Create New Video</span>
                <img id="close_new_video" class="w-12 ml-auto mr-4 h-12 cursor-pointer" src="/assets/svg/close.png" alt="">
            </div>
            <span class="text-white font-mono ml-8">
                <li>Enter your youtube video link in the input feild.</li>
                <li>Make sure you ticked <b>Allow embedding</b> in your youtube video.</li>
                <li>Make sure you use your own video.</li>
                <li>You can <b>not</b> edit video information</li>
            </span>
            <div class="w-3/4 mt-4 mx-auto h-12 flex flex-row">
                <input class="w-1/4 px-6 h-full  focus:outline-none" type="text" name="youtube_link" id="youtube_link" placeholder="Youtube Video Link">
                <button id="link_video" class="px-2 bg-blue-500 flex flex-row">
                    <img class="w-10 my-auto ml-2 h-10" src="/assets/svg/link.png" alt="">
                    <span class="text-xl  ml-2 my-auto">Link Video</span>
                </button>
                <button id="post_video" class="px-2 ml-2 hidden bg-blue-500 flex flex-row">
                    <img class="w-10 my-auto ml-2 h-10" src="/assets/svg/post.png" alt="">
                    <span class="text-xl  ml-2 my-auto">Post Video</span>
                </button>
            </div>
            <div id="video_details" class="w-3/4 hidden h-1/2 mx-auto mt-2 flex flex-col rounded-md overflow-y-auto no-scroll bg-white">
                <span class="ml-4 text-xl mt-4">Video Details</span>
                <span class="text-xl ml-4 mt-2 mb-2">Thumbnail</span>
                <img class="w-1/4 h-1/2 ml-8" id="thumbnail" src="/assets/svg/thumbnail.png" alt="">
                <span class="text-xl ml-4 mt-2 mb-2">Title</span>
                <h1 id="video_title" class="ml-8"></h1>
                <span class="text-xl ml-4 mt-2 mb-2">Description</span>
                <p id="description" class="ml-8"></p>
            </div>

        </div>
    </div>
    <div class="w-screen h-screen bg-gray-800 flex flex-col overflow-hidden">
        <?php printMenu(); ?>
        <div id="content-container" class="h-full flex flex-col bg-gray-700 w-full">
            <div class="w-98per mx-auto h-full overflow-y-auto">
                <div class="w-full h-10 mt-2 flex flex-row">
                    <form class="w-full   flex flex-row h-10 ">
                        <input type="search" placeholder="Search..." class="w-1/4 focus:outline-none h-10 mt-auto ml-12 mb-auto">
                        <button class="w-32 h-10 bg-gray-500 flex flex-row">
                            <span class="my-auto ml-6 mr-auto text-xl font-bold">Search</span>
                            <img class="h-8 my-auto mx-auto w-8" src="assets/svg/search.png" alt="">
                        </button>
                    </form>
                    <div class="w-1/4 h-10 ">
                        <button id="new_video_open" class="flex flex-row h-10 bg-blue-500 hover:bg-pink-500 focus:outline-none">
                            <img class="h-8 w-8 mx-2 my-auto" src="assets/svg/new_video.png" alt="">
                            <span class="text-white px-4 my-auto">New Video</span>
                        </button>
                    </div>
                </div>
                <div class="w-full rounded-md mx-auto no-scroll overflow-x-hidden overflow-y-hidden  h-auto mt-2 mb-2  grid grid-cols-4">
                    <?php
                    include 'config/php/db.php';
                    $sql = "select * from videos  INNER JOIN users_account on videos.USER_ID=users_account.USER_ID where  videos.IS_EXIST='true'";
                    $stmt = $connect->prepare($sql);
                    $stmt->execute();
                    $result = $stmt->get_result();
                    while ($row = $result->fetch_assoc()) {
                        $data = json_decode($row["VIDEO_DETAILS"], true);
                        //   echo var_dump($data);
                        $thumb_nail = "/assets/svg/default.jpg";
                        if (str_contains(json_encode($data["thumbnails"]), "maxres")) {
                            $thumb_nail = $data["thumbnails"]["maxres"]["url"];
                        } else if (str_contains(json_encode($data["thumbnails"]), "standard")) {
                            $thumb_nail = $data["thumbnails"]["standard"]["url"];
                        } else if (str_contains(json_encode($data["thumbnails"]), "high")) {
                            $thumb_nail = $data["thumbnails"]["high"]["url"];
                        } else if (str_contains(json_encode($data["thumbnails"]), "medium")) {
                            $thumb_nail = $data["thumbnails"]["medium"]["url"];
                        } else if (str_contains(json_encode($data["thumbnails"]), "default")) {
                            $thumb_nail = $data["thumbnails"]["default"]["url"];
                        }
                        $video_title = $data["title"];
                        $username = $row["USERNAME"];
                        $views = $row["VIDEO_VIEWS"];
                        $date = $row["POSTED_DATE"];
                        $user_profile = $row["PROFILE_PIC"];
                        $video_link = 'https://odnetwork.tv/video.php?video=' . $row["VIDEO_ID"];
                        echo printThumbs($thumb_nail, $video_title, $username, $views, $date, $video_link, $user_profile);
                    }
                    ?>

                </div>
            </div>
        </div>
    </div>
    </div>

</body>
<script src="assets/notyf/notyf.min.js"></script>
<script src="config/js/notification.js"></script>
<script src="config/js/response_handler.js"></script>
<script src="config/js/newsfeed.js"></script>
<script src="config/js/menu.js"></script>


</html>