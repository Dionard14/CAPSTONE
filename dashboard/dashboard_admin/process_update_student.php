<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include "conn.php";

    if (isset($_POST['updateStudentId']) && isset($_POST['updateStudentIdNumber']) && isset($_POST['updateStudentFirstName']) && isset($_POST['updateStudentLastName']) && isset($_POST['updateStudentCourse']) && isset($_POST['updateStudentYearLevel']) && isset($_POST['updateStudentEmail'])) {

        // input data to prevent SQL injection
        $studentId = mysqli_real_escape_string($conn, $_POST['updateStudentId']);
        $id_number = mysqli_real_escape_string($conn, $_POST['updateStudentIdNumber']);
        $firstName = mysqli_real_escape_string($conn, $_POST['updateStudentFirstName']);
        $lastName = mysqli_real_escape_string($conn, $_POST['updateStudentLastName']);
        $course = mysqli_real_escape_string($conn, $_POST['updateStudentCourse']);
        $yearLevel = mysqli_real_escape_string($conn, $_POST['updateStudentYearLevel']);
        $email = mysqli_real_escape_string($conn, $_POST['updateStudentEmail']);

        $sql = "UPDATE students SET id_number='$id_number', fname='$firstName', lname='$lastName', course='$course', year_level='$yearLevel', email='$email' WHERE id='$studentId'";

        if (mysqli_query($conn, $sql)) {
            echo "Student details updated successfully!";
        } else {
            echo "Error updating student details: " . mysqli_error($conn);
        }
    } else {
        echo "All required fields are not set!";
    }

    mysqli_close($conn);
} else {
    header("Location: error.php");
    exit();
}
?>
