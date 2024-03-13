<?php

include("conn.php");
session_start();
if ($_SESSION["userName"]) {
    $user = $_SESSION['userName'];

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
            <div class="bg-sky-100 mt-4 p-4 rounded-md shadow-md shadow-sky-200">
                <h1 class="text-xl font-semibold text-sky-500"><?php echo $greeting ?><span class="font-bold uppercase text-pink-500"><?php echo $user ?></span></h1>
            </div>
            <div class="grid grid-cols-4 mt-4 gap-4">
                <div class="bg-sky-200 p-5 rounded-md shadow-md shadow-sky-300">
                    <p class="text-xl font-semibold text-sky-800">Total tasks</p>
                    <p class="text-3xl font-bold text-sky-700">30</p>
                </div>
                <div class="bg-sky-200 p-5 rounded-md shadow-md shadow-sky-300">
                    <p class="text-xl font-semibold text-sky-800">Completed tasks</p>
                    <p class="text-3xl font-bold text-sky-700">10</p>
                </div>
                <div class="bg-sky-200 p-5 rounded-md shadow-md shadow-sky-300">
                    <p class="text-xl font-semibold text-sky-800">Today's tasks</p>
                    <p class="text-3xl font-bold text-sky-700">5</p>
                </div>
                <div class="bg-sky-200 p-5 rounded-md shadow-md shadow-sky-300">
                    <p class="text-xl font-semibold text-sky-800">Missed tasks</p>
                    <p class="text-3xl font-bold text-sky-700">2</p>
                </div>
            </div>
        </main>
    </body>

    </html>
    <?php
} else {
    header("location:logIn.php");
}