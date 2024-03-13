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
        <title>TaskUp | Dashboard |
            <?php echo $user ?>
        </title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.1/css/dataTables.bootstrap5.css" />
        <script defer src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script defer src="dataTable.js"></script>
    <script defer src="https://cdn.datatables.net/2.0.1/js/dataTables.bootstrap5.js" ></script>
    <script defer src="script.js"></script>
        
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
            <table id="example" class="table table-striped bg-sky-100 rounded-md" style="width:100%">
                <thead class="bg-blue-300">
                    <tr>
                        <th class="py-2">Name</th>
                        <th class="py-2">Position</th>
                        <th class="py-2">Office</th>
                        <th class="py-2">Age</th>
                        <th class="py-2">Start date</th>
                        <th class="py-2">Salary</th>
                    </tr>
                </thead>
                <tbody id="datas">
                    <tr>
                        <td>Tiger Nixon</td>
                        <td>System Architect</td>
                        <td>Edinburgh</td>
                        <td>61</td>
                        <td>2011/04/25</td>
                        <td>$320,800</td>
                    </tr>
                    <tr>
                        <td>name</td>
                        <td>Accountant</td>
                        <td>Tokyo</td>
                        <td>63</td>
                        <td>2011/07/25</td>
                        <td>$170,750</td>
                    </tr>
                    <tr>
                        <td>name</td>
                        <td>Junior Technical Author</td>
                        <td>San Francisco</td>
                        <td>66</td>
                        <td>2009/01/12</td>
                        <td>$86,000</td>
                    </tr>
                </tbody>
            </table>
        </main>
    </body>
    <script defer src="script.js"></script>
    </html>
    <?php
} else {
    header("location:logIn.php");
}