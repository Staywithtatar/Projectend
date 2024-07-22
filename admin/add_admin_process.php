<?php
include 'includes/dbconect.php';

// รับข้อมูลจากฟอร์ม
$username = $_POST['username'];
$password = $_POST['password'];

// เตรียมคำสั่ง SQL เพื่อเพิ่มข้อมูล admin
$sql = "INSERT INTO admin (username, password) VALUES ('$username', '$password')";

if ($conn->query($sql) === TRUE) {
    echo "เพิ่มข้อมูล admin เรียบร้อยแล้ว";
} else {
    echo "เกิดข้อผิดพลาดในการเพิ่มข้อมูล: " . $conn->error;
}

// ปิดการเชื่อมต่อฐานข้อมูล
$conn->close();
?>
