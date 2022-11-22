<?php
function generateUid()
{
    $list = "abcdefghijkmnopqstuvwxyz1234567890";
    $uid = "";
    $split = str_split($list, 1);
    for ($i = 0; $i < 1; $i++) {
        for ($c = 0; $c < 64; $c++) {
            $ran = rand(0, 33);
            $uid = $uid . "" . $split[$ran];
        }
    }
    return $uid;
}
function generateVideoUid()
{
    $list = "abcdefghijkmnopqstuvwxyz1234567890";
    $uid = "";
    $split = str_split($list, 1);
    for ($i = 0; $i < 1; $i++) {
        for ($c = 0; $c < 12; $c++) {
            $ran = rand(0, 33);
            $uid = $uid . "" . $split[$ran];
        }
    }
    return $uid;
}
function returnDate()
{
    date_default_timezone_set('Asia/Manila');
    $date = new DateTime();
    $date = $date->format("d-m-Y H:i:s");
    return $date;
}

function jwt($randomString)
{
    $token = hash("sha256", $randomString);
    $_SESSION['token'] = $token;
    return $token;
}

function jwt_verify($token)
{
    if ($token == $_SESSION['token']) {
        return true;
    } else {
        return false;
    }
}

function appendBr($description)
{

    while (str_contains($description, "\n")) {
        $description = str_replace("\n", "</br>", $description);
    }

    return $description;
}

function getTotalPrice($quantity, $item_price)
{
    return $quantity * $item_price;
}

function idStripper($item_id)
{
    $data =  explode(":", $item_id);
    return $data[0];
}

function checkPassword($connect, $password, $user_id)
{
    $sql = "select * from accounts where USER_ID=?  AND IS_EXIST='true'";
    $stmt = $connect->prepare($sql);
    $stmt->bind_param("s", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row["PASSWORD"])) {
            return 200;
        } else {
            return 401;
        }
    } else {
        return 404;
    }
}

function getTotalCars($connection)
{
    $sql = "select * from car_information where IS_EXIST='true'";
    $stmt = $connection->prepare($sql);
    $stmt->execute();
    $result = $stmt->get_result();
    return   $result->num_rows;
}


function pagination_data_tracker($page_num)
{
    $number_of_data = 2;
    $start_data = 0;
    $end_data = $number_of_data;

    $limit_end = $page_num * $end_data;
    $limit_start = $limit_end - $number_of_data;
    $data = array("limit_start" => $limit_start, "limit_end" => $limit_end);
    return json_encode($data);
}
function generateWalletId()
{
    $walletid = "";
    for ($i = 0; $i < 25; $i++) {
        $walletid = $walletid . rand(0, 9);
    }
    return $walletid;
}
function checkChannel_Id($channel_id)
{
    $curl = curl_init();

    curl_setopt_array($curl, [
        CURLOPT_URL => "https://www.googleapis.com/youtube/v3/channels?id=" . $channel_id . "&part=snippet&key=AIzaSyAlvMUXWtwcYW10MVHlo_lVTrhL6_a_87o",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => [
            "Accept: */*",
            "User-Agent: Thunder Client (https://www.thunderclient.com)"
        ],
    ]);

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    if ($err) {
        return 500;
    } else {
        if (str_contains($response, "items")) {
            return 200;
        } else {
            return 400;
        }
    }
}
function verify_ownership($channel_id, $author_channel)
{
    $curl = curl_init();

    curl_setopt_array($curl, [
        CURLOPT_URL => "https://www.googleapis.com/youtube/v3/channels?id=" . $channel_id . "&part=snippet&key=AIzaSyAlvMUXWtwcYW10MVHlo_lVTrhL6_a_87o",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => [
            "Accept: */*",
            "User-Agent: Thunder Client (https://www.thunderclient.com)"
        ],
    ]);

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    if ($err) {
        return 500;
    } else {
        if (str_contains($response,  $author_channel)) {
            return 200;
        } else {
            return 401;
        }
    }
}
function get_youtube_details($video_id)
{
    $curl = curl_init();

    curl_setopt_array($curl, [
        CURLOPT_URL => "https://www.googleapis.com/youtube/v3/videos?id=" . $video_id . "&part=snippet&key=AIzaSyAlvMUXWtwcYW10MVHlo_lVTrhL6_a_87o",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => [
            "Accept: */*",
            "User-Agent: Thunder Client (https://www.thunderclient.com)"
        ],
    ]);

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    if ($err) {
        return 500;
    } else {
        return $response;
    }
}

//

function printThumbs($video_thumb, $video_title, $username, $views, $date, $video_link, $user_pic)
{
    return '<div class="w-5/6 h-full mt-2 mb-2 shadow-2xl" onclick="window.open(\'' . $video_link . '\',\'_self\');">
                            <img src="' . $video_thumb . '" alt="vodep" class="w-full aspect-video h-36 mx-auto ">
                            <div class="w-full mt-2 flex flex-row">
                                <img src="' . $user_pic . '" class="w-12 h-12 rounded-full bg-white" alt="">
                                <div class="w-3/4 text-white ml-2 flex flex-col text-center">
                                    <h1 class="my-auto font-bold truncate text-white">' . $video_title . '</h1>
                                    <span id="video_owner_user" class="mx-auto  text-base font-bold text-slate-300">' . $username . '</span>
                                    <span id="video_information" class="ml-auto mr-2 text-sm truncate text-slate-300">' . $views . ' view . ' . $date . '</span>
                                </div>
                            </div>
                        </div>';
}

function printMenu()
{
    echo ' <div class="h-8per flex flex-row bg-emerald-700">
    <span class="mt-auto mb-auto text-2xl font-mono font-extrabold ml-auto mr-6">OD Network.Tv</span>
</div>
<div class="h-92per w-full flex flex-row bg-gray-400">
    <div id="menu-container" class="h-full flex flex-col text-white w-10 hover:w-1/6 bg-gray-800">
        <div id="menu_close" class="w-full h-12  flex flex-row text-center text-sm ">
            <img class="menu_icon h-8 ml-auto w-8  mr-auto mt-auto mb-auto" src="assets/svg/menu.png" alt="">
            <h1 class="menu_name text-xl mt-auto mb-auto ml-8 cursor-pointer hidden">MENU</h1>
        </div>
        <div id="video_feeds" class="w-full flex flex-row cursor-pointer  text-white hover:bg-gray-600 h-12 bg-gray-800 ">
            <img id="" class="menu_icon w-8 mt-auto ml-auto h-8 mr-auto mb-auto" src="/assets/svg/video.png" alt="">
            <h1 class="menu_name text-xl mt-auto mb-auto ml-8 cursor-pointer hidden">Video Feeds</h1>
        </div>
        <div id="account_management" class="w-full flex flex-row cursor-pointer  text-white hover:bg-gray-600 h-12 bg-gray-800 ">
            <img id="" class="menu_icon w-8 mt-auto ml-auto h-8 mr-auto mb-auto" src="assets/svg/account.png" alt="">
            <h1 class="menu_name text-xl mt-auto mb-auto ml-8 cursor-pointer hidden">Account Management</h1>
        </div>
        <div id="wallets" class="w-full cursor-pointer flex flex-row text-white hover:bg-gray-600 h-12 bg-gray-800 ">
            <img id="" class="menu_icon w-8 mt-auto ml-auto h-8 mr-auto mb-auto" src="assets/svg/wallet.png" alt="">
            <h1 class="menu_name text-xl mt-auto mb-auto ml-8 cursor-pointer hidden">Wallet</h1>
        </div>
        <div id="logout" class="w-full  cursor-pointer flex flex-row text-white hover:bg-gray-600 h-12 bg-gray-800 ">
            <img id="" class="menu_icon w-8 mt-auto ml-auto h-8 mr-auto mb-auto" src="assets/svg/logout.png" alt="">
            <h1 class="menu_name text-xl mt-auto mb-auto ml-8 cursor-pointer hidden">Logout</h1>
        </div>
    </div>';
}
