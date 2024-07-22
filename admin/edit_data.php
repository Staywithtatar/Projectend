<?php
// Include database connection code here

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get data from the form
    $loan_id = $_POST['loan_id'];
    $gender = $_POST['gender'];
    // Get other data fields here

    // Update data in the database using SQL UPDATE statement
    $sql = "UPDATE loan SET Gender='$gender' WHERE Loan_ID='$loan_id'";
    // Execute the query
    if ($conn->query($sql) === TRUE) {
        // Data updated successfully
        echo "Data updated successfully";
    } else {
        // Error updating data
        echo "Error updating data: " . $conn->error;
    }
}

// Close database connection
$conn->close();
?>
