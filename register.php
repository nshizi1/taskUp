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

<body class="h-screen">
    <?php include("header.php"); ?>
    <main class="bg-gray-50 h-screen flex flex-col items-center justify-center gap-4">
        <form class="w-1/3 shadow-md shadow-stone-800 p-4 rounded-md flex flex-col gap-4" action="" method="post">
            <h2 class="text-center text-3xl font-bold text-sky-700">Create Account</h2>
            <div class="grid grid-cols-2 gap-4">
                <div class="flex flex-col gap-2">
                    <label class="text-sky-700" for="names">Full names:</label>
                    <input class="w-full p-2 outline-none border rounded-md" type="text" name="names" id="">
                </div>
                <div class="flex flex-col gap-2">
                    <label class="text-sky-700" for="email">Email:</label>
                    <input class="p-2 outline-none border rounded-md" type="email" name="email" id="">
                </div>
            </div>

            <div class="flex flex-col gap-2">
                <label class="text-sky-700" for="userName">Username:</label>
                <input class="p-2 outline-none border rounded-md" type="text" name="userName" id="">
            </div>
            <div class="flex flex-col gap-2">
                <label class="text-sky-700" for="password">Password:</label>
                <input class="p-2 outline-none border rounded-md" type="password" name="password" id="">
            </div>
            <div class="flex justify-center">
                <button name="submit"
                    class="bg-green-700 hover:bg-green-600 transition ease-in-out w-full py-3 rounded-md text-gray-50"
                    type="submit">Sign Up</button>
            </div>
            <div>
                <p class="text-center">Already have account? <a class="text-sky-700" href="logIn.php">Sign In</a></p>
            </div>
        </form>
    </main>
</body>

</html>

<?php

if (isset($_POST["submit"])) {
    $names = $_POST["names"];
    $email = $_POST["email"];
    $userName = $_POST["userName"];
    $password = md5($_POST["password"]);

    // Check if fields are empty
    if (empty($names) || empty($email) || empty($userName) || empty($password)) {
        echo "<script>alert('Please fill in all fields');</script>";
    } else {
        // check if email is taken
        $sql = "SELECT * FROM users WHERE email = '$email'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_num_rows($result);

        if ($row > 0) {
            echo "<script>alert('Email already taken');</script>";
        } else {
            // check if username is taken
            $sql = "SELECT * FROM users WHERE userName = '$userName'";
            $result = mysqli_query($conn, $sql);
            $count = mysqli_num_rows($result);
            if ($count > 0) {
                echo "<script>alert('Username already taken');</script>";
            } else {
                // insert into database
                $sql = "INSERT INTO users (names, email, userName, password) VALUES ('$names', '$email', '$userName', '$password')";
                $result = mysqli_query($conn, $sql);
                if ($result) {
                    echo "<script>alert('Account created successfully');</script>";
                    echo "<script>window.location.href = 'logIn.php';</script>";
                } else {
                    echo "<script>alert('Account not created');</script>";
                }
            }
        }
    }
}
