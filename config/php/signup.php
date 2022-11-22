<?php
session_start();
include "db.php";
include "general_function.php";
$username = $connect->real_escape_string($_POST["username"]);
$password = $connect->real_escape_string(password_hash($_POST["password"], PASSWORD_DEFAULT, array("cost" => 9)));
$email = $connect->real_escape_string($_POST["email"]);
$channel_id = $connect->real_escape_string($_POST["channel_id"]);
$uid = generateWalletId();
$channel_status = checkChannel_Id($channel_id);
if ($channel_status == 400) {
    echo "400:Channel ID is invalid ! Please use your specific channel ID.";
} else if ($channel_status == 500) {
    echo "500:Server error occured.Please try again later or Contact support !";
} else {
    try {

        $sql = "INSERT INTO `od_networktv`.`users_account` (`USERNAME`, `EMAIL`, `PASSWORD`,`YOUTUBE_CHANNEL_ID`,`WALLET_BALANCE`, `WALLET_ID`) VALUES (?,?,?,?,0,?);";

        $stmt = $connect->prepare($sql);
        $stmt->bind_param("sssss", $username, $email, $password, $channel_id, $uid);
        $result = $stmt->execute();
        if ($result = 1) {
            $token = jwt(generateUid());
            echo "200:Welcome to odnetwork.tv! Click <a href='/login.html' target='_self'>here</a> to login and use your registered account.:" . $token;
        }
    } catch (Exception $e) {
        $err_code = $e->getCode();
        if ($err_code == 1062) {
            echo "1062:Username was already taken.";
        }
    }
}
