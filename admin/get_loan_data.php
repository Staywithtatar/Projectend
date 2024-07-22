<?php
include 'includes/dbconect.php';


$loanId = $_GET['loan_id'];

// เชื่อมต่อฐานข้อมูล

// ดึงข้อมูลโดยใช้ $loanId

// ส่งข้อมูลกลับเป็น JSON
echo json_encode($loanData);
?>
