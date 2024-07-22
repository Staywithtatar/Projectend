<?php 
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Loan Information</title>
<link rel="stylesheet" href="styles.css">
<style>
/* Additional CSS for styling */
body {
    font-family: Arial, sans-serif;
    background-color: #fff;
    margin: 0;
    padding: 0;
    display: flex; /* เพิ่ม display: flex; เพื่อให้สามารถใช้ flexbox ได้ */
    justify-content: space-between; /* จัดการตำแหน่งของคอนเทนเนอร์หลัก */
}

.container {
    max-width: 1200px;
    margin: 20px auto;
    padding: 20px;
    background-color: #f9f9f9;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    overflow-x: auto;
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

.btn-prev, .btn-next {
    margin-top: 20px;
    padding: 10px 20px;
    background-color: #FFA500;
    color: #fff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease;
    font-size: 14px; /* ปรับขนาดตัวอักษรของปุ่ม */
}

.btn-prev:hover, .btn-next:hover {
    background-color: #ff8c00;
}
.btn-edit, .btn-delete {
    padding: 5px 10px;
    background-color: #4CAF50;
    color: white;
    border: none;
    border-radius: 3px;
    cursor: pointer;
}

.btn-edit:hover, .btn-delete:hover {
    background-color: #45a049;
}
#editModal {
  display: none;
  position: fixed; /* ตั้งให้เป็นตำแหน่งตรงกลางของหน้าจอ */
  top: 50%; /* ตำแหน่งของ div ในแนวดิ่งที่ตรงกลาง */
  left: 50%; /* ตำแหน่งของ div ในแนวนอนที่ตรงกลาง */
  transform: translate(-50%, -50%); /* ย้ายตำแหน่งของ div ไปอยู่กลางจอ */
  z-index: 1000; /* ตั้งค่า z-index เพื่อให้แสดงหน้าหน้าจออื่นๆ */
}
.modal-content {
  width: 80%;
  margin: auto;
  max-width: 600px;
  background-color: #fefefe;
  padding: 20px;
  border-radius: 10px;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

.form-group {
  display: flex;
  flex-wrap: wrap;
  justify-content: space-between;
}

.form-group label {
  flex: 0 0 45%; /* ปรับขนาดของ label */
  margin-bottom: 10px; /* ช่องว่างระหว่าง label */
}

.form-group input[type="number"],
.form-group select {
  width: calc(50% - 10px);
  padding: 10px;
  margin-right: 20px;
  border: 1px solid #ccc;
  border-radius: 5px;
  box-sizing: border-box;
  flex: 0 0 45%; /* ปรับขนาดของ input/select */
  margin-bottom: 10px; /* ช่องว่างระหว่าง input/select */
}
select {
  appearance: none;
  -webkit-appearance: none;
  -moz-appearance: none;
  background-image: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path fill="%23aaa" d="M7.586 10l4.293-4.293a1 1 0 0 1 1.414 1.414l-5 5a1 1 0 0 1-1.414 0l-5-5A1 1 0 1 1 2.293 4.293L7.586 10z"/></svg>');
  background-repeat: no-repeat;
  background-position: right 10px top 50%;
  background-size: 15px;
}

/* สไตล์สำหรับ input[type="number"] และ select เมื่อได้รับโฟกัส */
input[type="number"]:focus,
select:focus {
  outline: none;
  border-color: #FFA500;
}
input[type="submit"] {
  padding: 10px 20px;
  background-color: #FFA500;
  color: #fff;
  border: none;
  border-radius: 5px;
  cursor: pointer;
  transition: background-color 0.3s ease;
  margin-top: 20px;
  width: 100%;
  
}

input[type="submit"]:hover {
  background-color: #ff8c00;
}

.form-group select {
  appearance: none;
  -webkit-appearance: none;
  -moz-appearance: none;
  background-image: url('data:image/svg+xml;utf8,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path fill="%23aaa" d="M7.586 10l4.293-4.293a1 1 0 0 1 1.414 1.414l-5 5a1 1 0 0 1-1.414 0l-5-5A1 1 0 1 1 2.293 4.293L7.586 10z"/></svg>');
  background-repeat: no-repeat;
  background-position: right 10px top 50%;
  background-size: 15px;
}

.form-group select:focus,
.form-group input[type="number"]:focus {
  outline: none;
  border-color: #FFA500;
}
aside {
    color: #fff;
    width: 250px;
    padding-left: 20px;
    height: 100vh;
    background-color: #FFCC66;
    border-top-right-radius: 80px;
}

aside a {
  font-size: 12px;
  color: #fff;
  display: block;
  padding: 12px;
  padding-left: 30px;
  text-decoration: none;
  -webkit-tap-highlight-color:transparent;
}

aside a:hover {
  color: #ffa500; /* เปลี่ยนสีข้อความเมื่อ hover */
  background: #fff;
  outline: none;
  position: relative;
  background-color: #fff;
  border-top-left-radius: 20px;
  border-bottom-left-radius: 20px;
}

aside a i {
  margin-right: 5px;
}

aside a:hover::after {
  content: "";
  position: absolute;
  background-color: transparent;
  bottom: 100%;
  right: 0;
  height: 35px;
  width: 35px;
  border-bottom-right-radius: 18px;
  box-shadow: 0 20px 0 0 #ffa500;
}

aside a:hover::before {
  content: "";
  position: absolute;
  background-color: transparent;
  top: 38px;
  right: 0;
  height: 35px;
  width: 35px;
  border-top-right-radius: 18px;
  box-shadow: 0 -20px 0 0 #ffa500;
}
aside p {
  margin: 0;
  padding: 40px 0;
}
.social {
  height: 0;  
}
.social i:before {
  width: 14px;
  height: 14px;
  font-size: 14px;
  position: fixed;
  color: #fff;
  background: #0077B5;
  padding: 10px;
  border-radius: 50%;
  top:5px;
  right:5px;
}
</style>
</head>
<body>
<aside>
  <p> เมนู </p>
  <a href="javascript:void(0)">
    <i class="fa fa-user-o" aria-hidden="true"></i>
    จัดการข้อมูลผู้ใช้
  </a>
  <a href="javascript:void(0)">
    <i class="fa fa-laptop" aria-hidden="true"></i>
    จัดการข้อมูลแอดมิน
  </a>
  <a href="javascript:void(0)">
    <i class="fa fa-clone" aria-hidden="true"></i>
    จัดการข้อมูลสำหรับการขอสินเชื่อ
  </a>
</aside>
  <div class="container">
  <h2>ข้อมูลสินเชื่อ</h2>
  <table>
    <thead>
      <tr>
        <th>รหัสสินเชื่อ</th>
        <th>เพศ</th>
        <th>สถานะการสมรส</th>
        <th>ผู้อยู่ในครอบครัว</th>
        <th>การศึกษา</th>
        <th>รับราชการเอง</th>
        <th>รายได้ของผู้สมัคร</th>
        <th>รายได้ของผู้สมัครร่วม</th>
        <th>จำนวนเงินกู้</th>
        <th>ระยะเวลากู้</th>
        <th>ประวัติเครดิต</th>
        <th>พื้นที่ทรัพย์สิน</th>
        <th>สถานะสินเชื่อ</th>
        <th>อีเมล</th>
        <th>ลบ</th>
        <th>แก้ไข</th>

      </tr>
    </thead>
    <tbody>
      <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "loan";
        
        $conn = new mysqli($servername, $username, $password, $dbname);
        
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

       // Fetch loan data from database
$page = isset($_GET['page']) ? intval($_GET['page']) : 1;
$offset = ($page - 1) * 25;
$sql = "SELECT * FROM loan LIMIT $offset, 25";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    echo "<tr>";
    echo "<td>".$row['Loan_ID']."</td>";
    echo "<td>".$row['Gender']."</td>";
    echo "<td>".$row['Married']."</td>";
    echo "<td>".$row['Dependents']."</td>";
    echo "<td>".$row['Education']."</td>";
    echo "<td>".$row['Self_Employed']."</td>";
    echo "<td>".$row['ApplicantIncome']."</td>";
    echo "<td>".$row['CoapplicantIncome']."</td>";
    echo "<td>".$row['LoanAmount']."</td>";
    echo "<td>".$row['Loan_Amount_Term']."</td>";
    echo "<td>".$row['Credit_History']."</td>";
    echo "<td>".$row['Property_Area']."</td>";
    echo "<td>".$row['Loan_Status']."</td>";
    echo "<td>".$row['email']."</td>";
    echo "<td>";
    echo "<button class='btn-edit' onclick=\"openEditModal('".$row['Loan_ID']."')\">Edit</button>";
    echo "</td>";
    echo "<td>";
    echo " <button class='btn-delete'>Delete</button>";
    echo "</td>";
    echo "</tr>";
  }
  echo '<tr>';
  if ($page > 1) {
    echo '<td colspan="14"><button class="btn-prev" onclick="window.location.href=\'?page='.($page - 1).'\'">Previous Page</button></td>';
  } else {
    echo '<td></td>';
  }
  echo '<td colspan="14"><button class="btn-next" onclick="window.location.href=\'?page='.($page + 1).'\'">Next Page</button></td>';
  echo '</tr>';
} else {
  echo "<tr><td colspan='14'>No loan data found</td></tr>";
}

        $conn->close();
      ?>
    </tbody>
  </table>
</div>
<div id="editModal" class="modal" style="display: none;">
  <div class="modal-content">
    <span class="close" onclick="closeEditModal()">&times;</span>
    <h2>Edit Loan Data</h2>
    <form id="editForm" action="edit_data.php" method="post">
  <!-- Form fields for editing loan data -->
  <input type="hidden" id="editLoanId" name="loan_id">
  
  <div class="form-group">
    <label for="editGender">Gender:</label>
    <select id="editGender" name="gender" required>
      <option value="Male">Male</option>
      <option value="Female">Female</option>
    </select>
    <label for="editMarried">Married:</label>
    <select id="editMarried" name="married" required>
      <option value="Yes">Yes</option>
      <option value="No">No</option>
    </select>
  </div>

  

  <div class="form-group">
    <label for="editDependents">Dependents:</label>
    <input type="number" id="editDependents" name="dependents" required>
    <label for="editEducation">Education:</label>
    <select id="editEducation" name="education" required>
      <option value="Graduate">Graduate</option>
      <option value="Not Graduate">Not Graduate</option>
    </select>
  </div>

  

  <div class="form-group">
    <label for="editSelfEmployed">Self Employed:</label>
    <select id="editSelfEmployed" name="self_employed" required>
      <option value="Yes">Yes</option>
      <option value="No">No</option>
    </select>
    <label for="editApplicantIncome">Applicant Income:</label>
    <input type="number" id="editApplicantIncome" name="applicant_income" required>
  </div>

 

  <div class="form-group">
    <label for="editCoapplicantIncome">Coapplicant Income:</label>
    <input type="number" id="editCoapplicantIncome" name="coapplicant_income" required>
    <label for="editLoanAmount">Loan Amount:</label>
    <input type="number" id="editLoanAmount" name="loan_amount" required>
  </div>

 

  <div class="form-group">
    <label for="editLoanAmountTerm">Loan Amount Term:</label>
    <input type="number" id="editLoanAmountTerm" name="loan_amount_term" required>
    <label for="editCreditHistory">Credit History:</label>
    <select id="editCreditHistory" name="credit_history" required>
      <option value="1">1</option>
      <option value="0">0</option>
    </select>
  </div>

  

  <div class="form-group">
    <label for="editPropertyArea">Property Area:</label>
    <select id="editPropertyArea" name="property_area" required>
      <option value="Urban">Urban</option>
      <option value="Semiurban">Semiurban</option>
      <option value="Rural">Rural</option>
    </select>
    <label for="editLoanStatus">Loan Status:</label>
    <select id="editLoanStatus" name="loan_status" required>
      <option value="Approved">Approved</option>
      <option value="Rejected">Rejected</option>
    </select>
  </div>

  

  <!-- Add more form fields for other data here -->

  <input type="submit" value="Save Changes">
</form>

  </div>
</div>



<script>
function openEditModal(loanId) {
  // Fetch loan data based on loanId using AJAX
  // Populate the form fields with fetched data
  // Example:
  // document.getElementById('editGender').value = fetchedData.gender;
  // document.getElementById('editMarried').value = fetchedData.married;
  // Set the loanId value in a hidden input field
  document.getElementById('editLoanId').value = loanId;
  // Show the modal
  document.getElementById('editModal').style.display = 'block';
  // Hide the add data form if it's visible
  document.getElementById("addFormContainer").style.display = "none";
}

function closeEditModal() {
  document.getElementById('editModal').style.display = 'none';
}
</script>


</body>
</html>
