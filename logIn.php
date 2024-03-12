<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php include("tailwind.html"); ?>
</head>

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
    <main class="bg-gray-50 h-screen flex flex-col items-center justify-center">
        <h2>Sign In</h2>
        <form action="#" method="post">
            <div>
                <label for="userName">Username</label>
                <input type="text" name="" required id="">
            </div>
            <div>
                <label for="userName">Password</label>
                <input type="password" name="" required id="">
            </div>
            <div>
                <div>
                    <input type="checkbox" name="" id="remember">
                    <label for="remember">Remember me</label>
                </div>
                <a href="#">Forgot password</a>
            </div>
            <div>
                <button type="submit">Log In</button>
            </div>
            <div>
                <p>Don't have account? <a href="#">Sign Up</a></p>
            </div>
        </form>
    </main>
</body>

</html>