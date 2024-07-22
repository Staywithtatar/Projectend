<?php
include 'includes/dbconect.php';

// Check if data is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the required keys exist in $_POST
    $loan_id = isset($_POST['loan_id']) ? $_POST['loan_id'] : '';
    $gender = isset($_POST['gender']) ? $_POST['gender'] : '';
    $married = isset($_POST['married']) ? $_POST['married'] : '';
    $dependents = isset($_POST['dependents']) ? $_POST['dependents'] : '';
    $education = isset($_POST['education']) ? $_POST['education'] : '';
    $self_employed = isset($_POST['self_employed']) ? $_POST['self_employed'] : '';
    $applicant_income = isset($_POST['applicant_income']) ? $_POST['applicant_income'] : '';
    $coapplicant_income = isset($_POST['coapplicant_income']) ? $_POST['coapplicant_income'] : '';
    $loan_amount = isset($_POST['loan_amount']) ? $_POST['loan_amount'] : '';
    $loan_amount_term = isset($_POST['loan_amount_term']) ? $_POST['loan_amount_term'] : '';
    $credit_history = isset($_POST['credit_history']) ? $_POST['credit_history'] : '';
    $property_area = isset($_POST['property_area']) ? $_POST['property_area'] : '';

    // Retrieve the email of the logged-in user
    $email = $_SESSION['email'];

    // Calculate Loan_Status
    $loan_status = calculateLoanStatus($credit_history, $applicant_income, $coapplicant_income, $loan_amount, $loan_amount_term);

    // SQL query to insert data into 'loan' table with the user's email
    $sql_insert = "INSERT INTO loan (Email, Gender, Married, Dependents, Education, Self_Employed, ApplicantIncome, CoapplicantIncome, LoanAmount, Loan_Amount_Term, Credit_History, Property_Area, Loan_Status) 
                    VALUES ('$email', '$gender', '$married', '$dependents', '$education', '$self_employed', '$applicant_income', '$coapplicant_income', '$loan_amount', '$loan_amount_term', '$credit_history', '$property_area', '$loan_status')";
    
    // Execute the query
    if ($conn->query($sql_insert) === TRUE) {
        // Data insertion successful
        echo "<script>alert('บันทึกข้อมูลสำเร็จ');</script>";
        // Redirect to index.php
        echo "<script>window.location.href = 'index.php';</script>";
    } else {
        // Data insertion failed
        echo "<script>alert('บันทึกข้อมูลไม่สำเร็จ: " . $conn->error . "');</script>";
    }
}

// Function to calculate Loan_Status
function calculateLoanStatus($credit_history, $applicant_income, $coapplicant_income, $loan_amount, $loan_amount_term) {
    // Sample conditions for Loan_Status calculation
    // You need to adjust these according to the requirements of your project

    if ($credit_history == 1 && $applicant_income + $coapplicant_income >= $loan_amount && $loan_amount_term == 360) {
        return 'Y'; // Approved
    } else {
        return 'N'; // Not Approved
    }
}

$conn->close();
?>
