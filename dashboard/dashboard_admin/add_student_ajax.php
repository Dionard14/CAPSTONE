<?php
// Include your database connection file
include "conn.php";

// Check if the form is submitted via POST method
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Extract form data
    $idNumber = $_POST['studentIdNumber'];
    $firstName = $_POST['studentFirstName'];
    $lastName = $_POST['studentLastName'];
    $course = $_POST['studentCourse'];
    $yearLevel = $_POST['studentYearLevel'];
    $email = $_POST['studentEmail'];
    $password = $_POST['studentPassword'];

    // Encrypt the password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Prepare SQL statement to insert student data into the database
    $sql = "INSERT INTO students (id_number, fname, lname, course, year_level, email, password)
            VALUES ('$idNumber', '$firstName', '$lastName', '$course', '$yearLevel', '$email', '$hashedPassword')";

    // Execute SQL statement
    if (mysqli_query($conn, $sql)) {
        // If the record is inserted successfully, return success response
        header("Location: /capstone/dashboard/dashboard_admin/add_student.php");
    } else {
        // If an error occurred while inserting the record, return error response
        echo "Error: " . mysqli_error($conn);
    }
} else {
    // Redirect to an error page if accessed directly without form submission
    header("Location: error.php");
    exit();
}

// Close database connection
mysqli_close($conn);
?>
