<?php

if (isset($_SESSION["userName"])) {
    $user = $_SESSION['userName'];
    ?>
    <header class="bg-stone-950 text-pink-50 flex justify-between p-4 items-center fixed top-0 w-full">
        <div>
            <h2 class="text-2xl font-semibold">TaskUp</h2>
        </div>
        <!-- main links on the logout page -->
        <ul class="flex gap-4">
            <li><a class="" href="#">Home</a></li>
            <li><a class="" href="#">My Tasks</a></li>
            <li><a class="" href="#">Profile</a></li>
            <li><a class="" href="#">Log Out</a></li>
        </ul>
    </header>
    <?php
} else {

    ?>
    <header class="bg-stone-950 text-pink-50 flex justify-between p-4 items-center fixed top-0 w-full">
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
