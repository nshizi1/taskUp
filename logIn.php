<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php include("tailwind.html"); ?>
</head>
<?php
session_start();
include("conn.php");
?>

<body class="font-poppins h-screen text-sm">
    <?php include("header.php"); ?>
    <main class="bg-gray-50 h-screen flex flex-col items-center justify-center gap-4">
        <form class="w-1/3 shadow-md shadow-stone-800 p-4 rounded-md flex flex-col gap-4" action="" method="post">
            <h2 class="text-center text-3xl font-semibold text-sky-700">Sign In</h2>
            <div class="flex flex-col gap-2">
                <label class="text-sky-700" for="userName">Username:</label>
                <input class="p-2 outline-none border rounded-md" type="text" name="userName" id="">
            </div>
            <div class="flex flex-col gap-2">
                <label class="text-sky-700" for="password">Password:</label>
                <input class="p-2 outline-none border rounded-md" type="password" name="password" id="">
            </div>
            <div class="flex justify-between">
                <div class="flex gap-2">
                    <input type="checkbox" name="remember" id="remember">
                    <label class="text-sky-600" for="remember">Remember me</label>
                </div>
                <a class="underline text-sky-600" href="#">Forgot password</a>
            </div>
            <div class="flex justify-center">
                <button name="submit"
                    class="bg-green-700 hover:bg-green-600 transition ease-in-out w-full py-3 rounded-md text-gray-50"
                    type="submit">LOG IN <i class="ml-2 fa-solid fa-right-to-bracket"></i></button>
            </div>
            <div>
                <p class="text-center">Don't have account? <a class="text-sky-700" href="register.php">Sign Up</a></p>
            </div>
        </form>
    </main>
</body>

</html>

<?php

if (isset($_POST["submit"])) {
    $userName = $_POST["userName"];
    $password = md5($_POST["password"]);
    $remember = $_POST["remember"];
    if (empty($userName) || empty($password)) {
        echo "<script>alert('Please fill all fields');
        window.location.href='logIn.php';</script>";
    } else {
        $userName = mysqli_real_escape_string($conn, $userName);
        $password = mysqli_real_escape_string($conn, $password);
        $query = "SELECT * FROM users WHERE userName = '$userName' AND password = '$password'";
        $result = mysqli_query($conn, $query);
        if (mysqli_num_rows($result)<1) {
            echo "<script>alert('No account found, try again!');
            window.location.href='logIn.php';</script>";
        } else {
            $_SESSION['userName'] = $userName;
            if ($remember) {
                setcookie("userName", $userName, time() + (86400 * 30), "/");
            }
            header("location: index.php");

        }
    }
}


?>