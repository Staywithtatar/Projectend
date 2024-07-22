<?php
include 'includes/dbconect.php';

$usernames = $_POST['usernames'];
$password = $_POST['password'];

$sql = "SELECT * FROM admins WHERE usernames='$usernames' AND password='$password'";
$result = $conn->query($sql);

if ($result->num_rows == 1) {
    $_SESSION['usernames'] = $usernames;
    header("Location: admin/index.php"); // ทำการ redirect ไปยังหน้า index.php
    exit(); // จบการทำงานของสคริปต์
} else {
    echo "Login failed";
}

$conn->close();
?>
