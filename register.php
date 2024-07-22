<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
  <style>
    body {
      font-family: 'Montserrat', sans-serif;
      background: linear-gradient(45deg, #ff9a9e, #fad0c4);
      animation: gradient 15s ease infinite;
    }

    @keyframes gradient {
      0% {
        background-position: 0% 50%;
      }
      50% {
        background-position: 100% 50%;
      }
      100% {
        background-position: 0% 50%;
      }
    }
  </style>
</head>
<body class="flex justify-center items-center min-h-screen">
  <div class="container flex mx-auto max-w-4xl">
    <div class="flex-none w-2/3">
      <img src="img/sld5.jpg" alt="Office Image" class="h-full rounded-l-lg shadow-lg object-cover">
    </div>
    <div class="w-1/3 bg-white p-8 rounded-r-lg shadow-lg">
      <h2 class="text-center text-white text-3xl font-bold mb-6">Register</h2>
      <form action="register_process.php" method="post">
        <input type="text" name="fullname" placeholder="Full Name" required class="w-full border border-gray-300 rounded-md py-2 px-3 mb-3 focus:outline-none focus:border-orange-500 transition-colors">
        <input type="text" name="address" placeholder="Address" required class="w-full border border-gray-300 rounded-md py-2 px-3 mb-3 focus:outline-none focus:border-orange-500 transition-colors">
        <input type="tel" name="phone" placeholder="Phone Number" required class="w-full border border-gray-300 rounded-md py-2 px-3 mb-3 focus:outline-none focus:border-orange-500 transition-colors">
        <input type="email" name="email" placeholder="Email" required class="w-full border border-gray-300 rounded-md py-2 px-3 mb-3 focus:outline-none focus:border-orange-500 transition-colors">
        <input type="password" name="password" placeholder="Password" required class="w-full border border-gray-300 rounded-md py-2 px-3 mb-5 focus:outline-none focus:border-orange-500 transition-colors">
        <button type="submit" class="w-full bg-gradient-to-r from-orange-500 to-red-500 text-white rounded-md py-2 px-4 hover:from-red-500 hover:to-orange-500 transition-colors transform hover:scale-105">Register</button>
      </form>
    </div>
  </div>

  <script>
    document.querySelector("input[name='email']").addEventListener("change", function() {
      if (!this.value.includes("@gmail.com")) {
        this.value += "@gmail.com";
      }
    });
  </script>
</body>
</html>