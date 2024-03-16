<?php

if (isset($_SESSION["userName"])) {
    
    ?>
    <header class="font-poppins bg-neutral-700 text-pink-50 flex justify-between py-3 shadow-md shadow-neutral-600 px-10 items-center w-full sticky top-0">
        <div>
            <h2 class="text-2xl font-semibold">TaskUp</h2>
        </div>
        <!-- main links on the logout page -->
        <ul class="flex gap-4 text-sm">
            <li><a class="" href="index.php">Dashboard</a></li>
            <li><a class="" href="addTask.php">Add Task</a></li>
            <li><a class="" href="calendar.php">Calendar</a></li>
            <li><a class="" href="#">Completed Tasks</a></li>
            <li><a class="" href="#">Profile</a></li>
        </ul>
        <a class="text-sm" href="logOut.php">Log Out<i class="ml-2 fa-solid fa-right-from-bracket"></i></a>
    </header>
    <?php
} else {

    ?>
    <header class="font-poppins bg-neutral-700 text-pink-50 flex justify-between py-3 shadow-md shadow-neutral-600 px-10 items-center fixed top-0 w-full">
        <div>
            <h2 class="text-2xl font-semibold">TaskUp</h2>
        </div>
        <!-- main links on the logout page -->
        <ul class="text-sm flex gap-4">
            <li><a class="" href="#">About Us</a></li>
            <li><a class="" href="#">Contact Us</a></li>
        </ul>
    </header>
    <?php
}
