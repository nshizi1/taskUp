<?php

include("conn.php");
session_start();
if ($_SESSION["userName"]) {
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
    </body>

    </html>
    <?php
} else {
    header("location:logIn.php");
}