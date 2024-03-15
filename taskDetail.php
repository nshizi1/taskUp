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

        <body>
            <?php include_once ("header.php") ?>
            <main class="px-10">
                <div class="bg-sky-100 mt-4 p-4 rounded-md shadow-md shadow-sky-200">
                    <h2 class="text-xl font-semibold text-sky-500">Task Details | <span class="text-pink-400">
                            <?php echo $taskName ?>
                        </span></h2>
                </div>
                <div class="mt-4">
                    <div class="mt-4 p-4 rounded-md shadow-md shadow-gray-200">
                        <form action="" method="post" class="flex gap-4 justify-end">
                            <button id="updateData"
                                class="py-2 px-6 rounded-md transition ease-in-out hover:bg-sky-500 text-gray-50 bg-sky-600">Update
                                Task</button>
                            <button id="complete"
                                class="py-2 px-6 rounded-md transition ease-in-out hover:bg-green-500 text-gray-50 bg-green-600">Complete
                                Task</button>
                        </form>
                    </div>
                    <?php
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
                            <h3>This is the view tab</h3>
                            <div>
                                <h4 class="font-semibold text-xl text-gray-600">Name: <span class="text-sky-800">
                                        <?php echo $data["taskName"] ?>
                                    </span></h4>
                            </div>
                            <div>
                                <h4 class="font-semibold text-xl text-gray-600">Due Date: <span class="text-sky-800">
                                        <?php echo $data["dueDate"] ?>
                                    </span></h4>
                            </div>
                            <div>
                                <h4 class="font-semibold text-xl text-gray-600">Created At: <span class="text-sky-800">
                                        <?php echo $data["createdAt"] ?>
                                    </span></h4>
                            </div>
                            <div>
                                <h4 class="font-semibold text-xl text-gray-600">Completed: <span class="text-sky-800">
                                        <?php echo $completed ?>
                                    </span></h4>
                            </div>
                            <div class="col-span-2">
                                <label class="font-semibold text-xl text-gray-600" for="">Description:</label>
                                <p class="font-semibold text-xl text-sky-800">
                                    <?php echo $data["description"] ?>
                                </p>
                            </div>
                        </div>
                        <form method="post" action="" id="edit" class="hidden mt-4 p-4 rounded-md shadow-md shadow-gray-200 grid-cols-2 gap-4">
                            <div>
                                <h4 class="text-xl text-gray-600">Name: </h4>
                                <input class="w-full text-sky-800 outline-none border-2 border-sky-800 px-2 py-1 rounded-md" type="text" name="" value="<?php echo $data["taskName"] ?>" id="" required>
                            </div>
                            <div>
                                <h4 class="text-xl text-gray-600">Due Date: </h4>
                                <input class="w-full text-sky-800 outline-none border-2 border-sky-800 px-2 py-1 rounded-md" type="date" min="<?php echo $date ?>" name="" value="<?php echo $data["dueDate"] ?>" id="" required>
                            </div>
                            <div class="col-span-2">
                                <h4 class="text-xl text-gray-600">Description: </h4>
                                <textarea class="w-full text-sky-800 outline-none border-2 border-sky-800 px-2 py-1 rounded-md resize-none" name="" required><?php echo $data["description"] ?></textarea>
                            </div>
                            <button class="py-2 px-6 rounded-md transition ease-in-out hover:bg-green-500 text-gray-50 bg-green-600 w-fit" type="submit">Update task</button>
                        </form>
                    <?php } ?>
                </div>

            </main>
        </body>

        </html>
        <?php
    } else {
        header("location: index.php");
    }

    // <?php
} else {
    header("location: logIn.php");
}