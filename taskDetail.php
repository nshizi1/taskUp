<?php

include("conn.php");
session_start();
if ($_SESSION["userName"]) {
    $user = $_SESSION['userName'];
    $taskId = $_GET["taskId"];
    $taskName = $_GET["taskName"];
    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Task Details |
            <?php echo $user ?>
        </title>
        <?php include("tailwind.html") ?>
    </head>

    <body>
        <?php include_once("header.php") ?>
        <main class="px-10">
            <div class="bg-sky-100 mt-4 p-4 rounded-md shadow-md shadow-sky-200">
                <h2 class="text-xl font-semibold text-sky-500">Task Details | <span class="text-pink-400"><?php echo $taskName ?></span></h2>
            </div>
            <div class="mt-4">
                <div>
                    <h4>Name: <span>Lorem, ipsum.</span></h4>
                </div>
                <div>
                    <h4>Due Date: <span>Lorem, ipsum.</span></h4>
                </div>
                <div>
                    <h4>Created At: <span>Lorem, ipsum dolor.</span></h4>
                </div>
                <div>
                    <h4>Completed: <span>Lorem, ipsum.</span></h4>
                </div>
            </div>
            <div>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Non, velit?</p>
            </div>
        </main>
    </body>

    </html>
    <?php
} else {

}