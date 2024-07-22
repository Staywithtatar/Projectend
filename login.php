<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        body {
            background-image: url('https://source.unsplash.com/1600x900/?nature');
            background-size: cover;
            background-position: center;
        }

        .login-form {
            animation: slide-in 0.5s ease-out;
        }

        @keyframes slide-in {
            0% {
                transform: translateY(-100%);
                opacity: 0;
            }
            100% {
                transform: translateY(0);
                opacity: 1;
            }
        }
    </style>
</head>
<body class="flex justify-center items-center h-screen">
    <div class="container mx-auto max-w-md p-6 bg-white rounded-lg shadow-md login-form">
        <h2 class="text-2xl font-semibold mb-6 text-center">Login</h2>
        <form action="login_process.php" method="post">
            <input type="email" name="email" placeholder="Email" required class="w-full px-4 py-2 mb-4 border border-gray-300 rounded-lg">
            <input type="password" name="password" placeholder="Password" required class="w-full px-4 py-2 mb-4 border border-gray-300 rounded-lg">
            <button type="submit" class="w-full px-4 py-2 bg-gradient-to-r from-purple-500 to-pink-500 text-white rounded-lg cursor-pointer hover:bg-gradient-to-l hover:from-pink-500 hover:to-purple-500 transition-colors duration-300">Login</button>
        </form>
    </div>
</body>
</html>