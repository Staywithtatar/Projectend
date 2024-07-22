<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>User Information</title>
<style>
body {
    font-family: Arial, sans-serif;
    background-color: #fff;
    margin: 0;
    padding: 0;
}

.container {
    max-width: 1200px;
    margin: 20px auto;
    padding: 20px;
    background-color: #f9f9f9;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    overflow-x: auto; /* เพิ่มการเลื่อนแนวนอนเมื่อเนื้อหามากเกินไป */
}

h2 {
    color: #FFA500;
}

table {
    width: 100%;
    border-collapse: collapse;
}

table th, table td {
    padding: 12px; /* เพิ่ม padding เพื่อทำให้เนื้อหาภายในเซลล์ดูสมดุลขึ้น */
    border-bottom: 1px solid #ddd;
    white-space: nowrap; /* ไม่ให้ข้อความขึ้นบรรทัดใหม่ในเซลล์ของตาราง */
}

table th {
    background-color: #FFA500;
    color: #fff;
    text-align: left;
}

tbody tr:hover {
    background-color: #f0f0f0;
}
.btn-edit, .btn-delete {
    padding: 5px 10px;
    background-color: #4CAF50;
    color: white;
    border: none;
    border-radius: 3px;
    cursor: pointer;
}
</style>
</head>
<body>

<div class="container">
  <h2>User Information</h2>
<?php
include 'includes/dbconect.php';

// สร้างคำสั่ง SQL เพื่อดึงข้อมูล
$sql = "SELECT user_id, fullname, address, phone, email FROM user";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // แสดงข้อมูลในรูปแบบตาราง
    echo "<table border='1'>
            <tr>
                <th>User ID</th>
                <th>Fullname</th>
                <th>Address</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>";
    // วนลูปเพื่อแสดงข้อมูลทั้งหมด
    while($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>".$row["user_id"]."</td>
                <td>".$row["fullname"]."</td>
                <td>".$row["address"]."</td>
                <td>".$row["phone"]."</td>
                <td>".$row["email"]."</td>
                <td>
                    <button class='btn-edit' )\">Edit</button>
                    
                </td>
                <td>
                
                <button class='btn-delete' )\">Delete</button>
            </td>
            </tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}

// ปิดการเชื่อมต่อฐานข้อมูล
$conn->close();
?>
