<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Admin Login</title>
<style>
body {
    font-family: Arial, sans-serif;
    background-color: #f9f9f9;
    margin: 0;
    padding: 0;
}

.container {
    max-width: 400px;
    margin: 100px auto;
    padding: 20px;
    background-color: #fff;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

h2 {
    color: #FFA500;
}

input[type="text"],
input[type="password"],
input[type="submit"] {
    width: 100%;
    padding: 10px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

input[type="submit"] {
    background-color: #FFA500;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    width: 100%;
}

input[type="submit"]:hover {
    background-color: #ff8c00;
}

.error {
    color: red;
    font-size: 14px;
    margin-bottom: 10px;
}
</style>
</head>
<body>

<div class="container">
  <h2>Admin Login</h2>
  <form action="admin_login_process.php" method="post">
    <label for="usernames">Username</label>
    <input type="usernames" name="usernames" required>
    <label for="password">Password</label>
    <input type="password" name="password" required>
    <input type="submit" value="Login">
    
  </form>
</div>

</body>
</html>
