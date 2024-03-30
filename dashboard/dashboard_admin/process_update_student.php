<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Include your database connection file
    include "conn.php";

    // Check if all required fields are set
    if (isset($_POST['updateStudentId']) && isset($_POST['updateStudentIdNumber']) && isset($_POST['updateStudentFirstName']) && isset($_POST['updateStudentLastName']) && isset($_POST['updateStudentCourse']) && isset($_POST['updateStudentYearLevel']) && isset($_POST['updateStudentEmail'])) {

        // Sanitize input data to prevent SQL injection
        $studentId = mysqli_real_escape_string($conn, $_POST['updateStudentId']);
        $id_number = mysqli_real_escape_string($conn, $_POST['updateStudentIdNumber']);
        $firstName = mysqli_real_escape_string($conn, $_POST['updateStudentFirstName']);
        $lastName = mysqli_real_escape_string($conn, $_POST['updateStudentLastName']);
        $course = mysqli_real_escape_string($conn, $_POST['updateStudentCourse']);
        $yearLevel = mysqli_real_escape_string($conn, $_POST['updateStudentYearLevel']);
        $email = mysqli_real_escape_string($conn, $_POST['updateStudentEmail']);

        // Update student details in the database
        $sql = "UPDATE students SET id_number='$id_number', fname='$firstName', lname='$lastName', course='$course', year_level='$yearLevel', email='$email' WHERE id='$studentId'";

        if (mysqli_query($conn, $sql)) {
            // Student details updated successfully
            echo "Student details updated successfully!";
        } else {
            // Error updating student details
            echo "Error updating student details: " . mysqli_error($conn);
        }
    } else {
        // Required fields not set
        echo "All required fields are not set!";
    }

    // Close database connection
    mysqli_close($conn);
} else {
    // Redirect to an error page if accessed directly without form submission
    header("Location: error.php");
    exit();
}
?>
