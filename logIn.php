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
$message = $_GET["incorrect"] ?? '';
?>

<body class="h-screen">
    <header class="bg-stone-950 text-pink-50 flex justify-between p-4 items-center fixed top-0 w-full">
        <div>
            <h2 class="text-2xl font-semibold">TaskUp</h2>
        </div>
        <!-- main links on the logout page -->
        <ul class="flex gap-4">
            <li><a class="text-xl" href="#">About Us</a></li>
            <li><a class="text-xl" href="#">Contact Us</a></li>
        </ul>
    </header>
    <main class="bg-gray-50 h-screen flex flex-col items-center justify-center gap-4">
        <form class="w-1/3 shadow-md shadow-stone-800 p-4 rounded-md flex flex-col gap-4" action="#" method="post">
            <h2 class="text-center text-3xl font-bold text-sky-700">Sign In</h2>
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
            <div>
                <p class="text-center text-red-500">
                    <?php echo $message ?>
                </p>
            </div>
            <div class="flex justify-center">
                <button name="submit"
                    class="bg-green-700 hover:bg-green-600 transition ease-in-out w-full py-3 rounded-md text-gray-50"
                    type="submit">Log In</button>
            </div>
            <div>
                <p class="text-center">Don't have account? <a class="text-sky-700" href="#">Sign Up</a></p>
            </div>
        </form>
    </main>
</body>

</html>

<?php

if (isset($_POST["submit"])) {
    $userName = $_POST["userName"];
    $password = $_POST["password"];
    $remember = $_POST["remember"];
    if (empty($userName) || empty($password)) {
        $message = "Please fill in all fields";
        header("location: logIn.php?incorrect=$message");
    } else {
        $userName = mysqli_real_escape_string($conn, $userName);
        $password = mysqli_real_escape_string($conn, $password);
        $query = "SELECT * FROM users WHERE userName = '$userName' AND password = '$password'";
        $result = mysqli_query($conn, $query);
        $row = mysqli_fetch_assoc($result);
        if (!$row) {
            $_SESSION['message'] = "Invalid username or password";
            header("location: logIn.php?incorrect=$message");
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