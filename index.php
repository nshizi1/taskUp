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

    $getUserId = mysqli_query($conn, "SELECT * FROM users where username = '$user' ");
    $row = mysqli_fetch_assoc($getUserId);
    $userId = $row['userId'];
    $getTasks = mysqli_query($conn, "SELECT * FROM tasks WHERE userId ='$userId' order by completed");
    $count = 1;
    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>TaskUp | Dashboard |
            <?php echo $user ?>
        </title>
        <link rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css" />
        <link rel="stylesheet" href="https://cdn.datatables.net/2.0.1/css/dataTables.bootstrap5.css" />
        <script defer src="https://code.jquery.com/jquery-3.7.1.js"></script>
        <script defer src="dataTable.js"></script>
        <script defer src="https://cdn.datatables.net/2.0.1/js/dataTables.bootstrap5.js"></script>

        <?php include("tailwind.html") ?>
    </head>

    <body>
        <?php include("header.php"); ?>
        <main class="px-10">
            <div class="bg-sky-100 mt-4 p-4 rounded-md shadow-md shadow-sky-200">
                <h1 class="text-xl font-semibold text-sky-500">
                    <?php echo $greeting ?><span class="font-bold uppercase text-pink-500">
                        <?php echo $user ?>
                    </span>
                </h1>
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
            <div class="my-4">
                <table id="example" class="table table-striped rounded-md" style="width:100%">
                    <thead class="bg-sky-200">
                        <tr>
                            <th class="">No</th>
                            <th class="">Task Name</th>
                            <th class="">Due Date</th>
                            <th class="">Created At</th>
                            <th class="">Completed</th>
                            <th class="">Action</th>
                        </tr>
                    </thead>
                    <tbody id="datas">
                        <?php

                        while ($row = mysqli_fetch_array($getTasks)) {
                            if ($row['completed'] == 0) {
                                $completed = "No";
                                $class = "text-red-500 font-semibold";
                            } else {
                                $completed = "Yes";
                                $class = "text-green-500 font-semibold";
                            }
                            ?>
                            <tr>
                                <td>
                                    <?php echo $count++ ?>
                                </td>
                                <td>
                                    <?php echo $row['taskName'] ?>
                                </td>
                                <td>
                                    <?php echo $row['dueDate'] ?>
                                </td>
                                <td>
                                    <?php echo $row['createdAt'] ?>
                                </td>
                                <td><span class="<?php echo $class ?>">
                                        <?php echo $completed ?>
                                    </span></td>
                                <td><a class="text-sky-500 hover:underline" href="#"><i class="fa-solid fa-ellipsis"></i></a></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </main>
    </body>
    <script defer src="script.js"></script>

    </html>
    <?php
} else {
    header("location:logIn.php");
}