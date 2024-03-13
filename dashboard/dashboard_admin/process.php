<?php
include "conn.php";
session_start();

if (isset($_POST['update'])) {

    $ref_id = $_GET['id'];

    $fname = $_POST['update_fname'];
    $lname = $_POST['update_lname'];
    $age = $_POST['update_age'];
    $address = $_POST['update_address'];
    $bday = $_POST['update_bday'];
    $phone = $_POST['update_phone'];
    $email = $_POST['update_email'];
    $user1 = $_POST['update_user1'];
    $pass1 = $_POST['update_pass1'];

    $update = mysqli_query($conn, "UPDATE user SET fname='$fname', lname='$lname', age='$age', address='$address', bday='$bday', phone='$phone', email='$email', user1='$user1', pass1='$pass1' WHERE id='$ref_id'");

    if ($update == true) {
        ?>
        <script>
            alert("Your UPDATE is Succesful!");
            window.location.href = "records.php";

        </script>
        <?php

    } else {
        ?>
        <script>
            alert("Error UPDATE\nTry Again!");
            window.location.href = "update.php";

        </script>
        <?php
    }
}

if (isset($_POST['regformstudent'])) {
    $process_id = $_POST['regform_id'];
    $process_fname = $_POST['regform_fname'];
    $process_lname = $_POST['regform_lname'];
    $process_course = $_POST['regform_course'];
    $process_yearlevel = implode(",", $_POST['regform_yearlevel']);
    $process_email = $_POST['regform_email'];
    $process_password = $_POST['regform_password'];
    $process_password2 = $_POST['regform_password2'];
    $tableName = "students";
} elseif (isset($_POST['regformteacher'])) {
    $process_id = $_POST['regform_id'];
    $process_fname = $_POST['regform_fname'];
    $process_lname = $_POST['regform_lname'];
    $process_email = $_POST['regform_email'];
    $process_password = $_POST['regform_password'];
    $process_password2 = $_POST['regform_password2'];
    $tableName = "teachers";
}

if (isset($tableName)) {
    $checkEmailStatement = "SELECT * FROM $tableName WHERE `email`='$process_email'";
    $checkIdNumberStatement = "SELECT * FROM $tableName WHERE `id_number`='$process_id'";

    $checkEmailQuery = mysqli_query($conn, $checkEmailStatement);
    $checkIdNumberQuery = mysqli_query($conn, $checkIdNumberStatement);
    $countEmail = mysqli_num_rows($checkEmailQuery);
    $countIdNumber = mysqli_num_rows($checkIdNumberQuery);

    if ($countEmail == 0 && $countIdNumber == 0) {
        if ($process_password == $process_password2) {
            // Hash the password before storing it in the database for security
            // $hashed_password = password_hash($process_password, PASSWORD_DEFAULT);

            // Insert user information into the appropriate table
            if ($tableName === "students") {
                $insertStatement = "INSERT INTO students
                (`id_number`, `fname`, `lname`, `course`, `year_level`, `email`, `password`)
                VALUES
                ('$process_id', '$process_fname', '$process_lname', '$process_course', '$process_yearlevel', '$process_email', '$process_password')";
            } elseif ($tableName === "teachers") {
                $insertStatement = "INSERT INTO teachers
                (`id_number`, `fname`, `lname`, `email`, `password`)
                VALUES
                ('$process_id', '$process_fname', '$process_lname', '$process_email', '$process_password')";
            }

            $result = mysqli_query($conn, $insertStatement);

            if ($result) {
                ?>
                <script>
                    alert("Registration is successful!");
                    window.location.href = "studentmanagement.php"; 
                </script>
                <?php
                exit; 
            } else {
                ?>
                <script>
                    alert("Error in registration!\nTry again.");
                    window.location.href = "studentmanagement.php"; 
                </script>
                <?php
            }
        } else {
            ?>
            <script>
                alert("Passwords do not match!\nTry again.");
                window.location.href = "studentmanagement.php"; 
            </script>
            <?php
        }
    } else {
        ?>
        <script>
            alert("User with this ID number or email already exists!\nTry again.");
            window.location.href = "studentmanagement.php"; 
        </script>
        <?php
    }
}






// pie graph
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$attendanceSql = "SELECT course, COUNT(*) as per_day FROM attendance GROUP BY course";
$attendanceResult = $conn->query($attendanceSql);

$studentSql = "SELECT course, COUNT(*) as count FROM students GROUP BY course";
$studentResult = $conn->query($studentSql);

if ($attendanceResult->num_rows > 0) {
    $attendanceData = [['Course', 'per Day']];
    while ($attendanceRow = $attendanceResult->fetch_assoc()) {
        $attendanceData[] = [$attendanceRow['course'], (int) $attendanceRow['per_day']];
    }
} else {
    $attendanceData = [['Course', 'per Day']];
}

if ($studentResult->num_rows > 0) {
    $studentData = [['Course', 'Count']];
    while ($studentRow = $studentResult->fetch_assoc()) {
        $studentData[] = [$studentRow['course'], (int) $studentRow['count']];
    }
} else {
    $studentData = [['Course', 'Count']];
}

// Output the JSON encoded data for both attendance and students
echo json_encode(['attendance' => $attendanceData, 'students' => $studentData]);

// Close the connection
$conn->close();




?>