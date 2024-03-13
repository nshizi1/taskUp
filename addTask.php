<?php

include("conn.php");
session_start();
if ($_SESSION["userName"]) {
    $user = $_SESSION['userName'];
    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Add Task |
            <?php echo $user ?>
        </title>
        <?php include("tailwind.html") ?>
    </head>

    <body>
        <?php include("header.php"); ?>
        <main class="h-screen flex items-center justify-center">
            <form action="#">
                <h2>Add new task</h2>
                <div>
                    <div>
                        <label for="title">Title:</label>
                        <input type="text" name="name" id="title">
                    </div>
                    <div>
                        <label for="dueDate">Due date:</label>
                        <input type="text" name="dueDate" id="dueDate">
                    </div>
                </div>
                <div>
                    <label for="description">Description:</label>
                    <textarea class="resize-none" name="description" id="description"></textarea>
                </div>
                <div>
                    <button type="reset">Reset</button>
                    <button type="submit" name="submit">Add Task</button>
                </div>
                </div>
            </form>
        </main>
    </body>

    </html>
    <?php
} else {
    header("location:logIn.php");
}