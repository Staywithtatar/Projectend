<?php
include 'includes/dbconect.php';

$email = $_POST['email'];
$password = $_POST['password'];

$sql = "SELECT * FROM user WHERE email='$email' AND password='$password'";
$result = $conn->query($sql);

if ($result->num_rows == 1) {
    $_SESSION['email'] = $email;
    header("Location: index.php"); // ทำการ redirect ไปยังหน้า index.php
    exit(); // จบการทำงานของสคริปต์
} else {
    echo "Login failed";
}

$conn->close();
?>
