<?php
include "conn.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $idNumber = $_POST['studentIdNumber'];
    $firstName = $_POST['studentFirstName'];
    $lastName = $_POST['studentLastName'];
    $course = $_POST['studentCourse'];
    $yearLevel = $_POST['studentYearLevel'];
    $email = $_POST['studentEmail'];
    $password = $_POST['studentPassword'];

    // Encrypt the password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO students (id_number, fname, lname, course, year_level, email, password)
            VALUES ('$idNumber', '$firstName', '$lastName', '$course', '$yearLevel', '$email', '$hashedPassword')";

    if (mysqli_query($conn, $sql)) {
        header("Location: /capstone/dashboard/dashboard_admin/add_student.php");
    } else {
        echo "Error: " . mysqli_error($conn);
    }
} else {
    header("Location: error.php");
    exit();
}

mysqli_close($conn);
?>
