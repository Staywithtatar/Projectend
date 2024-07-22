<?php
include 'includes/dbconect.php';

$fullname = $_POST['fullname'];
$address = $_POST['address'];
$phone = $_POST['phone'];
$email = $_POST['email'];
$password = $_POST['password'];

$sql = "INSERT INTO user (fullname, address, phone, email, password) VALUES ('$fullname', '$address', '$phone', '$email', '$password')";

if ($conn->query($sql) === TRUE) {
    echo "Registration successful";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
