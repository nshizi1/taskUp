<?php

include ("conn.php");
session_start();
if ($_SESSION["userName"]) {
    $user = $_SESSION['userName'];
    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Task Calendar |
            <?php echo $user ?>
        </title>
        <link rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css" />
        <link rel="stylesheet" href="https://cdn.datatables.net/2.0.1/css/dataTables.bootstrap5.css" />
        <script defer src="https://code.jquery.com/jquery-3.7.1.js"></script>
        <script defer src="dataTable.js"></script>
        <script defer src="https://cdn.datatables.net/2.0.1/js/dataTables.bootstrap5.js"></script>
        <script defer src="script.js"></script>
        <?php include ("tailwind.html") ?>
    </head>

    <body class="font-poppins">
        <?php include_once ("header.php") ?>
        <main class="px-10 mt-4">
            <div class="text-sm flex justify-between items-center">
                <p>Records found: <span>4</span></p>
                <form class=" flex gap-2 items-center" action="" method="POST" autocomplete="off">
                    <input class="outline-none border border-gray-700 px-3 rounded-md py-2" required type="date"
                        name="fDate" id="">
                    <input class="outline-none border border-gray-700 px-3 rounded-md py-2" required type="date"
                        name="lDate">
                    <button
                        class="py-2 px-6 rounded-md transition ease-in-out hover:bg-blue-500 text-gray-50 bg-blue-600 w-fit"
                        type="submit">Filter Date</button>
                </form>
            </div>
            <div class="mt-4">
                <table id="example" class="table table-striped rounded-md" style="width:100%">
                    <thead>
                        <tr>
                            <th>Lorem</th>
                            <th>ipsum</th>
                            <th>Dor sit</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>fnskjdf</td>
                            <td>fnskjdf</td>
                            <td>fnskjdf</td>
                        </tr>
                        <tr>
                            <td>fnskjdf</td>
                            <td>fnskjdf</td>
                            <td>fnskjdf</td>
                        </tr>
                        <tr>
                            <td>fnskjdf</td>
                            <td>fnskjdf</td>
                            <td>fnskjdf</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </main>
    </body>

    </html>
    <?php
} else {
    header("location: logIn.php");
}