<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loan Plan</title>
    <!-- เพิ่มลิงก์ไปยังไฟล์ CSS สำหรับสไตล์หน้าเว็บ -->
    <link rel="stylesheet" href="style.css">
</head>
<body>

<table>
    <thead>
        <tr>
            <th>Loan Term</th>
            <th>Credit History</th>
            <th>Property Area</th>
            <th>Loan Status</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
        include 'includes/dbconect.php';
        // ดึงข้อมูลจากฐานข้อมูล
        $sql = "SELECT * FROM loan";
        $result = $conn->query($sql);

        function calculateMonths($days) {
            // ปรับเป็นตัวอย่างเช่น 30 วันต่อเดือน สามารถปรับตามความต้องการ
            $daysInMonth = 30;

            $months = floor($days / $daysInMonth);
            $remainingDays = $days % $daysInMonth;

            return $months . " months and " . $remainingDays . " days";
        }

        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            
            $loanTerm = $row["Loan_Amount_Term"];
            
            if (!empty($loanTerm)) {
                echo "<td class='term'>" . calculateMonths($loanTerm) . "</td>";
            } else {
                echo "<td class='term'>Invalid Loan Term</td>";
            }

            echo "<td class='history'>" . $row["Credit_History"] . "</td>";
            echo "<td class='area'>" . $row["Property_Area"] . "</td>";
            echo "<td class='status'>" . $row["Loan_Status"] . "</td>";
            echo "<td><button onclick='calculateLoanPlan(\"" . $row["Loan_ID"] . "\", \"" . $row["Loan_Status"] . "\", \"" . $row["LoanAmount"] . "\", \"" . $loanTerm . "\", \"" . $row["Credit_History"] . "\")'>Calculate Plan</button></td>";
            echo "</tr>";
        }

        $conn->close();
        ?>
    </tbody>
</table>

<!-- เพิ่มสคริปต์ JavaScript สำหรับคำนวณและแสดงแผนการผ่อนคงเหลือ -->
<script>
function calculateLoanPlan(loanId, loanStatus, loanAmount, loanTerm, creditHistory) {
    const loanTermInMonths = calculateMonths(loanTerm);
    
    // แสดงผลในรูปแบบที่ต้องการ (ในตัวอย่างนี้ให้แสดงเป็น alert)
    alert("Loan Plan for Loan_ID: " + loanId + 
          "\nLoan_Status: " + loanStatus + 
          "\nLoan_Amount: " + loanAmount + 
          "\nLoan_Term: " + loanTermInMonths + 
          "\nCredit_History: " + creditHistory);
}
</script>

</body>
</html>
