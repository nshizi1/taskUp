<?php

include("conn.php");
session_start();
if ($_SESSION["userName"]) {
    $user = $_SESSION['userName'];
    // generating greeting according to the time
    // date_default_timezone_set('Asia/Kolkata');
    // $time = date("H:i:s");
    // if ($time >= "08:00:00" && $time <= "17:00:00") {
    //     $greeting = "Good Morning";
    // } elseif ($time >= "17:00:00" && $time <= "23:59:59") {
    //     $greeting = "Good Afternoon";
    // } elseif ($time >= "00:00:00" && $time <= "07:59:59") {
    //     $greeting = "Good Evening";
    // } else {
    //     $greeting = "Good Night";
    // }
    // echo $greeting;

    $currentHour = date('G');
    if ($currentHour >= 0 && $currentHour < 5) {
        $greeting = "Good Early Morning, ";
    } elseif ($currentHour >= 5 && $currentHour < 12) {
        $greeting = "Good Morning, ";
    } elseif ($currentHour >= 12 && $currentHour < 18) {
        $greeting = "Good Afternoon, ";
    } else {
        $greeting = "Good Evening, ";
    }

    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <?php include("tailwind.html") ?>
    </head>

    <body>
        <?php include("header.php"); ?>
        <main class="px-10">
            <h1><?php echo $greeting.$user ?></h1>
        </main>
    </body>

    </html>
    <?php
} else {
    header("location:logIn.php");
}