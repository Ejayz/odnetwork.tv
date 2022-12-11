<?php
session_start();

include "config/php/general_function.php";
include 'config/php/db.php';
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
    <div id="copy_link_container" class="absolute flex hover:cursor-not-allowed bg-white/0 w-screen h-screen hidden">
        <div class="w-1/2 mx-auto my-auto bg-gray-700 h-36 flex flex-col hover:cursor-default">
            <input class="focus:outline-none mx-auto mt-auto mb-0 w-3/4 h-12 copy text-center" type="text" id="copy_link" disabled>
            <div class="mx-auto mt-2 mb-auto flex flex-row w-full h-12">
                <span class="mt-0 mb-auto text-center text-xl copy mx-auto w-1/4 h-full   bg-blue-500 cursor-pointer">Copy</span>
                <span class="mt-0 mb-auto text-center text-xl  mx-auto w-1/4 h-full   bg-blue-500 cursor-pointer" id="cancel_copy">Cancel</span>
            </div>
        </div>
    </div>
    <div class="w-screen h-screen bg-gray-800 flex flex-col no-scroll overflow-y-scroll">
        <?php
        if (count($_SESSION) === 5) {
            printMenu();
        }

        ?>

        <div id="content-container" class="h-full w-full flex flex-col no-scroll bg-gray-700">
            <div id="cofull nt-scrollable" class="w-98per mx-auto no-scroll h-full overflow-y-auto">
                <div class="w-full h-10 mt-2 flex flex-row">
                    <form class="w-full   flex flex-row h-10 ">
                        <input type="search" placeholder="Search..." class="w-1/4 focus:outline-none h-10 mt-auto ml-12 mb-auto">
                        <button class="w-32 h-10 bg-gray-500 flex flex-row">
                            <span class="my-auto ml-6 mr-auto text-xl font-bold">Search</span>
                            <img class="h-8 my-auto mx-auto w-8" src="assets/svg/search.png" alt="">
                        </button>
                    </form>
<?php 
if(count($_SESSION)==5){

}else{
    echo '<a href="login.php" class="h-8 w-1/4 text-xl text-center font-bold hover:bg-pink-500 rounded-full  mr-auto ml-0 bg-blue-500 my-auto">Sign up/Login</a>';
}
?>
                </div>
                <div class="w-full rounded-md h-auto mt-2 mb-2 overflow-x-hidden pb-4 overflow-y-auto no-scroll  flex flex-col">
                    <?php
                    include 'config/php/db.php';
                    if (isset($_GET["video"])) {
                        $video_id = $connect->real_escape_string($_GET["video"]);
                        $sql = "select * from videos where VIDEO_ID=? and IS_EXIST='true'";
                        $stmt = $connect->prepare($sql);
                        $stmt->bind_param("s", $video_id);
                        $stmt->execute();
                        $result = $stmt->get_result();
                        if ($result->num_rows !== 0) {
                            $row = $result->fetch_assoc();
                            $data = json_decode($row["VIDEO_DETAILS"], true);
                            $embeddable_video_id = explode("v=", $row["VIDEO_URL"]);
                            if (count($_SESSION) === 5) {
                                echo '<div id="video_container" class="w-5/6 mx-auto h-3/4 overflow-x-hidden overflow-y-auto no-scroll">
    <iframe id="video_player" class="w-full aspect-video" src="https://www.youtube.com/embed/' . $embeddable_video_id[1] . '?enablejsapi=1" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen>
    </iframe>
    </div>
    <div class="w-full h-auto">
    <div class="flex flex-row mt-4 ">
        <div class="w-auto h-12 pr-4 pl-4 bg-white mr-2 ml-2 rounded-full flex flex-row  cursor-default">
            <img class="w-8 my-auto h-8 mx-auto" src="assets/profile/default.png" alt="">
            <span class="my-auto mx-auto">' . $data["channelTitle"] . '</span>
        </div>
        <div id="claim" class="w-auto h-12 pr-4 pl-4 bg-white mr-2 ml-2 rounded-full flex flex-row cursor-pointer">
            <img class="w-8 my-auto h-8 mx-auto" src="assets/svg/coin.png" alt="">
            <span id="claim-text" class="my-auto mx-auto pl-4">30s</span>
        </div>
        <div id="share" class="w-auto h-12 pr-4 pl-4 bg-white mr-2 ml-2 rounded-full flex flex-row cursor-pointer">
            <img class="w-8 my-auto h-8 mx-auto" src="assets/svg/share.png" alt="">
            <span class="my-auto mx-auto pl-4">Share</span>
        </div>
        <div id="visit" class="w-auto h-12 pr-4 pl-4 bg-white mr-2 ml-2 rounded-full flex flex-row cursor-pointer">
            <img class="w-8 my-auto h-8 mx-auto" src="assets/svg/youtube.png" alt="">
            <a target="_blank" href="https://youtube.com/channel/' . $data["channelId"] . '" class="my-auto mx-auto pl-4">Visit Channel</a>
        </div>
    </div>
    <div class="bg-gray-500 rounded-md w-1/2">
    <h1 class="text-xl p-4 font-bold font-mono mt-2">' . $data["title"] . '</h1>
      <br/>
      <h1 class="w-1/2 p-4 h-auto " id="video_title">' . $data["description"] . '</h1>
    </div>
</div>
    ';
                            } else {
                                echo '<div id="video_container" class="w-5/6 mx-auto h-3/4 overflow-x-hidden overflow-y-auto no-scroll">
    <iframe id="video_player" class="w-full aspect-video" src="https://www.youtube.com/embed/' . $embeddable_video_id[1] . '?enablejsapi=1" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen>
    </iframe>
    </div>
    <div class="w-full h-auto">
    <div class="flex  flex-row mt-4 ">
        <div class="w-auto h-12 pr-4 pl-4 bg-white mr-2 ml-2 rounded-full flex flex-row  cursor-default">
            <img class="w-8 my-auto h-8 mx-auto" src="assets/profile/default.png" alt="">
            <span class="my-auto mx-auto">' . $data["channelTitle"] . '</span>
        </div> 
        <div id="share" class="w-auto h-12 pr-4 pl-4 bg-white mr-2 ml-2 rounded-full flex flex-row cursor-pointer">
            <img class="w-8 my-auto h-8 mx-auto" src="assets/svg/share.png" alt="">
            <span class="my-auto mx-auto pl-4">Share</span>
        </div>
        <div id="visit" class="w-auto h-12 pr-4 pl-4 bg-white mr-2 ml-2 rounded-full flex flex-row cursor-pointer">
            <img class="w-8 my-auto h-8 mx-auto" src="assets/svg/youtube.png" alt="">
            <a target="_blank" href="https://youtube.com/channel/' . $data["channelId"] . '" class="my-auto mx-auto pl-4">Visit Channel</a>
        </div>
    </div>
  <div class="bg-gray-500 rounded-md w-1/2">
  <h1 class="text-xl p-4 font-bold font-mono mt-2">' . $data["title"] . '</h1>
    <br/>
    <h1 class="w-1/2 p-4 h-auto " id="video_title">' . $data["description"] . '</h1>
  </div>
</div>
    ';
                            }
                        } else {
                            echo '<div id="video_container" class="w-full no-scroll overflow-x-hidden overflow-y-hidden  h-1/2">
    <img class="w-full mx-auto aspect-video" src="/assets/svg/error-video-not-found.webp" >
    </div>
    ';
                        }
                    } else {
                        echo '<div id="video_container" class="w-full no-scroll overflow-x-hidden overflow-y-hidden  h-1/2">
<img class="w-full mx-auto aspect-video" src="/assets/svg/invalid-link.webp" >
</div>
';
                    }

                    ?>
                    <span class="mt-26 h-12"> </span>
                </div>

            </div>
        </div>
    </div>
    </div>

</body>
<script src="assets/notyf/notyf.min.js"></script>
<script src="config/js/notification.js"></script>
<script src="config/js/response_handler.js"></script>
<script src="config/js/playback_handler.js"></script>
<script src="config/js/menu.js"></script>
<script src="https://www.youtube.com/iframe_api"></script>


</html>