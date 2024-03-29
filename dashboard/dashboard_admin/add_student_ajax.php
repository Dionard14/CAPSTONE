<?php
include "conn.php";

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $id_number = $_POST['id_number'];
    $fname = $_POST['fname']; 
    $lname = $_POST['lname'];
    $course = $_POST['course'];
    $year_level = $_POST['year_level'];
    $email = $_POST['email'];

    // Validate form data (you may add more validation as needed)
    if (empty($id_number)) {
        echo "ID Number is required.";
        exit; // Stop further execution
    }

    // Insert data into database
    $insertQuery = "INSERT INTO students (id_number, fname, lname, course,  year_level, email)
                    VALUES ('$id_number', '$fname', '$lname', '$course', '$year_level', '$email', '$location')";
    
    if (mysqli_query($conn, $insertQuery)) {
        echo "Student added successfully.";
    } else {
        echo "Error: " . $insertQuery . "<br>" . mysqli_error($conn);
    }

    mysqli_close($conn);
} else {
    // If the form is not submitted via POST method, show an error message
    echo "Error: Form not submitted.";
}
?>
