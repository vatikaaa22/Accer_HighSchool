<?php
require_once '../../helper/connection.php';
session_start();
$error_message = "";

if (isset($_POST['submit'])) {
    $username = $_POST['name'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE name='$username' and password='$password' LIMIT 1";
    $result = mysqli_query($connection, $sql);

    $row = mysqli_fetch_assoc($result);
    if ($row) {
        $_SESSION['login'] = $row;
        header('Location: ../../index.php');
    } else {
        $error_message = "Invalid username or password";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>

    <!-- LINK TAILWINDCSS -->
    <link href="../main.css" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <div class="flex items-center h-[100vh] w-full justify-center bg-white">
        <form id="loginForm" class="grid w-1/4 px-10 py-5 rounded-box text-black shadow-xl border gap-5" action="" method="POST">
            <h1 class="text-center font-bold text-xl">Login</h1>

            <?php if ($error_message): ?>
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
                    <p class="block sm:inline"><?php echo $error_message; ?></p>
                </div>
            <?php endif; ?>

            <div class="grid gap-2">
                <label class="input input-bordered flex items-center gap-2 bg-white">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="w-4 h-4 opacity-70"><path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6ZM12.735 14c.618 0 1.093-.561.872-1.139a6.002 6.002 0 0 0-11.215 0c-.22.578.254 1.139.872 1.139h9.47Z" /></svg>
                    <input type="text" class="grow" placeholder="Username" name="name" id="username" />
                </label>
                <span id="usernameError" class="text-red-500 text-sm hidden">Please enter a username</span>

                <label class="input input-bordered flex items-center gap-2 bg-white">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" class="w-4 h-4 opacity-70"><path fill-rule="evenodd" d="M14 6a4 4 0 0 1-4.899 3.899l-1.955 1.955a.5.5 0 0 1-.353.146H5v1.5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5v-2.293a.5.5 0 0 1 .146-.353l3.955-3.955A4 4 0 1 1 14 6Zm-4-2a.75.75 0 0 0 0 1.5.5.5 0 0 1 .5.5.75.75 0 0 0 1.5 0 2 2 0 0 0-2-2Z" clip-rule="evenodd" /></svg>
                    <input type="password" class="grow" name="password" id="password" placeholder="Password" />
                </label>
                <span id="passwordError" class="text-red-500 text-sm hidden">Please enter a password</span>

                <div class="text-white flex items-center justify-center gap-2 w-full mt-5">
                    <a class="btn w-1/2 text-black" href="../landingPage/index.php">kembali</a>
                    <button class="btn w-1/2 text-white bg-black" type="submit" name="submit">login</button>
                </div>
            </div>
        </form>
    </div>

    <script>
        document.getElementById('loginForm').addEventListener('submit', function(e) {
            var username = document.getElementById('username');
            var password = document.getElementById('password');
            var usernameError = document.getElementById('usernameError');
            var passwordError = document.getElementById('passwordError');
            var isValid = true;

            if (username.value.trim() === '') {
                usernameError.classList.remove('hidden');
                isValid = false;
            } else {
                usernameError.classList.add('hidden');
            }

            if (password.value.trim() === '') {
                passwordError.classList.remove('hidden');
                isValid = false;
            } else {
                passwordError.classList.add('hidden');
            }

            if (!isValid) {
                e.preventDefault(); // Prevent form submission
            }
        });
    </script>
</body>
</html>