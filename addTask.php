<?php

include("conn.php");
session_start();
if ($_SESSION["userName"]) {
    $user = $_SESSION['userName'];
    $date = date("Y-m-d");
    $getUserId = mysqli_query($conn, "SELECT * FROM users where username = '$user' ");
    $row = mysqli_fetch_assoc($getUserId);
    $userId = $row['userId'];
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

    <body class="font-poppins">
        <?php include("header.php"); ?>
        <main class="h-screen flex items-center justify-center">
            <form class="shadow-md shadow-sky-300 p-4 rounded-md flex flex-col gap-4" action="" method="post">
                <h2 class="text-center text-3xl font-semibold text-sky-700">Add new task</h2>
                <div class="flex gap-4">
                    <div class="flex flex-col gap-2">
                        <label class="text-sky-700 text-sm" for="title">Title:</label>
                        <input class="border p-2 outline-none rounded-md " type="text" name="name" required id="title">
                    </div>
                    <div class="flex flex-col gap-2">
                        <label class="text-sky-700 text-sm" for="dueDate">Due date:</label>
                        <input class="border p-2 outline-none rounded-md" type="date" min="<?php echo $date ?>" name="dueDate" required id="dueDate">
                    </div>
                </div>
                <div class="flex flex-col gap-2">
                    <label class="text-sky-700 text-sm" for="description">Description:</label>
                    <textarea class="border p-2 outline-none rounded-md resize-none" name="description" required id="description"></textarea>
                </div>
                <div class="flex gap-4 justify-center">
                    <button class="text-sm border-2 text-red-500 border-red-300 px-6 py-2 rounded-md" type="reset">Reset</button>
                    <button class="text-sm border-2 border-green-700 bg-green-700 text-gray-50 px-6 py-2 rounded-md" type="submit" name="submit">Add Task</button>
                </div>
                </div>
            </form>
        </main>
    </body>

    </html>
    <?php
    if(isset($_POST["submit"])){
        $name = $_POST["name"];
        $dueDate = $_POST["dueDate"];
        $description = $_POST["description"];
        $query = "INSERT INTO tasks(userId, taskName, dueDate, description) VALUES('$userId','$name', '$dueDate', '$description')";
        $result = mysqli_query($conn, $query);
        if($result){
            echo "<script>alert('Task added successfully');</script>";
            echo "<script>window.location.href='index.php';</script>";
        }
        else{
            echo "<script>alert('Task not added, try again');</script>";
        }
    }
} else {
    header("location:logIn.php");
}
