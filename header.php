<?php

if (isset($_SESSION["userName"])) {
    
    ?>
    <header class="bg-stone-950 text-pink-50 flex justify-between py-4 px-10 items-center w-full">
        <div>
            <h2 class="text-2xl font-semibold">TaskUp</h2>
        </div>
        <!-- main links on the logout page -->
        <ul class="flex gap-4">
            <li><a class="" href="index.php">Dashboard</a></li>
            <li><a class="" href="#">Add Task</a></li>
            <li><a class="" href="#">Calendar</a></li>
            <li><a class="" href="#">Completed Tasks</a></li>
            <li><a class="" href="#">Profile</a></li>
        </ul>
        <a class="" href="logOut.php">Log Out</a>
    </header>
    <?php
} else {

    ?>
    <header class="bg-stone-950 text-pink-50 flex justify-between py-4 px-10 items-center fixed top-0 w-full">
        <div>
            <h2 class="text-2xl font-semibold">TaskUp</h2>
        </div>
        <!-- main links on the logout page -->
        <ul class="flex gap-4">
            <li><a class="" href="#">About Us</a></li>
            <li><a class="" href="#">Contact Us</a></li>
        </ul>
    </header>
    <?php
}
