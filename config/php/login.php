<?php

include "db.php";
include "general_function.php";
session_start();
// if (isset($_POST["ses_id"])) {
//     session_start();
//     if (session_id() != $_POST["ses_id"]) {
//         echo "404:Unauthorized Access.Session ID does not match";
//         return 0;
//     }
// } else {
//     echo "404:Unauthorized Access.Session does not exist";
//     return 0;
// }
$randomstring = generateUid();
$username = $connect->real_escape_string($_POST["username"]);
$password = $connect->real_escape_string($_POST["password"]);

$sql = "select * from users_account where USERNAME=?  AND IS_EXIST='true'";
$stmt = $connect->prepare($sql);
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();
$row_num = $result->num_rows;
if ($row_num == 1) {
    $row = $result->fetch_assoc();
    if (password_verify($password, $row["PASSWORD"])) {
        $_SESSION["userid"] = $row["USER_ID"];
        $_SESSION["username"] = $row["USERNAME"];
        $_SESSION["token"] = jwt($randomstring);
        $_SESSION["channel_id"] = $row["YOUTUBE_CHANNEL_ID"];
        $_SESSION["wallet"]=$row["WALLET_ID"];
        echo "200:Welcome back " . $username . ".:" . $_SESSION["token"];
    } else {
        echo "401:Please check your username or password";
    }
} else {
    echo "401:Please check your username or password";
}
