<?php

include ("conn.php");
session_start();
if ($_SESSION["userName"]) {
    if ($_GET["taskId"] && $_GET["taskName"]) {
        $user = $_SESSION['userName'];
        $taskId = $_GET["taskId"];
        $taskName = $_GET["taskName"];
        $getUserId = mysqli_query($conn, "SELECT * FROM users where username = '$user' ");
        $row = mysqli_fetch_assoc($getUserId);
        $userId = $row['userId'];
        ?>
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Task Details |
                <?php echo $user ?>
            </title>
            <script defer src="update.js"></script>
            <?php include ("tailwind.html") ?>
        </head>

        <body class="font-poppins">
            <?php include_once ("header.php") ?>
            <main class="px-10">
                <form action="" method="POST" class="bg-sky-100 mt-4 p-4 rounded-md shadow-md shadow-sky-200 flex items-center justify-between">
                    <h2 class="text-base font-semibold text-sky-500">Task Details | <span class="text-pink-400"> <?php echo $taskName ?> </span></h2>
                    <button name="deleteTask" class="text-sm py-2 px-6 rounded-md transition ease-in-out hover:bg-red-500 text-gray-50 bg-red-600" type="submit">Delete Task</button>
                </form>
                <div class="mt-4">
                    <div class="mt-4 p-4 rounded-md shadow-md shadow-gray-200">
                        <form action="" method="POST" class="flex gap-4 justify-end">
                            <button id="updateData" type="submit"
                                class="text-sm py-2 px-6 rounded-md transition ease-in-out hover:bg-sky-500 text-gray-50 bg-sky-600">Update
                                Task</button>
                            <button id="complete" type="submit"
                                class="text-sm py-2 px-6 rounded-md transition ease-in-out hover:bg-green-500 text-gray-50 bg-green-600"
                                name="completeTask">Complete Task</button>
                        </form>
                    </div>
                    <?php
                    if(isset($_POST["deleteTask"])){
                        $deleteTask = mysqli_query($conn, "DELETE FROM tasks WHERE taskId = '$taskId' AND userId = '$userId' ");
                        if ($deleteTask) {
                            echo "<script>alert('Task deleted successfully');
                            window.location.href='index.php';</script>";
                        } else {
                            echo "<script>alert('Task not deleted');</script>";
                        }
                    }
                    if (isset ($_POST["completeTask"])) {
                        $checkCompleted = mysqli_query($conn, "SELECT * FROM tasks where completed = 1 AND taskId = '$taskId'");
                        if (mysqli_num_rows($checkCompleted) > 0) {
                            echo "<script>alert('Task already completed');</script>";
                        } else {

                            $completeTask = mysqli_query($conn, "UPDATE tasks set completed = 1 where taskId = '$taskId' AND userId ='$userId' ");
                            if ($completeTask) {
                                echo "<script>alert('Task Completed');
                                window.location='index.php';</script>";
                            } else {
                                echo "<script>alert('Failed, try again');</script>";
                            }
                        }
                    }
                    $getTaskDetails = mysqli_query($conn, "SELECT * from tasks where taskId ='$taskId' AND userId = '$userId'");
                    while ($data = mysqli_fetch_array($getTaskDetails)) {
                        if ($data['completed'] == 0) {
                            $completed = "Not Completed";
                        } else {
                            $completed = "Completed";
                        }
                        $date = date("Y-m-d");
                        ?>
                        <div id="view" class="mt-4 p-4 rounded-md shadow-md shadow-gray-200 grid grid-cols-2 gap-4">
                            <div>
                                <h4 class="font-semibold text-base text-gray-600">Name: <span class="text-sky-800">
                                        <?php echo $data["taskName"] ?>
                                    </span></h4>
                            </div>
                            <div>
                                <h4 class="font-semibold text-base text-gray-600">Due Date: <span class="text-sky-800">
                                        <?php echo $data["dueDate"] ?>
                                    </span></h4>
                            </div>
                            <div>
                                <h4 class="font-semibold text-base text-gray-600">Created At: <span class="text-sky-800">
                                        <?php echo $data["createdAt"] ?>
                                    </span></h4>
                            </div>
                            <div>
                                <h4 class="font-semibold text-base text-gray-600">Completed: <span class="text-sky-800">
                                        <?php echo $completed ?>
                                    </span></h4>
                            </div>
                            <div class="col-span-2">
                                <label class="font-semibold text-base text-gray-600" for="">Description:</label>
                                <p class="font-semibold text-base text-sky-800">
                                    <?php echo $data["description"] ?>
                                </p>
                            </div>
                        </div>
                        <form method="POST" action="" id="edit"
                            class="hidden mt-4 p-4 rounded-md shadow-md shadow-gray-200 grid-cols-2 gap-4">
                            <div>
                                <h4 class="text-base text-gray-600">Name: </h4>
                                <input class="w-full text-sky-800 outline-none border mt-2 border-sky-800 px-2 py-1 rounded-md"
                                    type="text" name="name" value="<?php echo $data["taskName"] ?>" id="" required>
                            </div>
                            <div>
                                <h4 class="text-base text-gray-600">Due Date: </h4>
                                <input class="w-full text-sky-800 outline-none border mt-2 border-sky-800 px-2 py-1 rounded-md"
                                    type="date" min="<?php echo $date ?>" name="dueDate" value="<?php echo $data["dueDate"] ?>"
                                    id="" required>
                            </div>
                            <div class="col-span-2">
                                <h4 class="text-base text-gray-600">Description: </h4>
                                <textarea
                                    class="w-full text-sky-800 outline-none border mt-2 border-sky-800 px-2 py-1 rounded-md resize-none"
                                    name="description" required><?php echo $data["description"] ?></textarea>
                            </div>
                            <button
                                class="text-sm py-2 px-6 rounded-md transition ease-in-out hover:bg-green-500 text-gray-50 bg-green-600 w-fit"
                                type="submit" name="update">Update task</button>
                        </form>
                    <?php } ?>
                </div>

            </main>
        </body>

        </html>
        <?php
        if (isset ($_POST["update"])) {
            $name = $_POST["name"];
            $dueDate = $_POST["dueDate"];
            $description = $_POST["description"];
            $updateTask = mysqli_query($conn, "UPDATE tasks set taskName = '$name', dueDate = '$dueDate', description = '$description' where taskId = '$taskId' AND userId = '$userId' ");
            if ($updateTask) {
                echo "<script>alert('Task updated!');
                window.location.href='index.php';</script>";
            } else {
                echo "<script>alert('Failed to update, try again!');</script>";
            }
        }

    } else {
        header("location: index.php");
    }

    // <?php
} else {
    header("location: logIn.php");
}