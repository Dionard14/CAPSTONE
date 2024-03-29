<?php
include "conn.php";
session_start();

if (isset($_POST['regformstudent']) || isset($_POST['regformteacher'])) {
    $process_id = $_POST['regform_id'];
    $process_fname = $_POST['regform_fname'];
    $process_lname = $_POST['regform_lname'];
    $process_email = $_POST['regform_email'];
    $process_password = $_POST['regform_password'];
    $process_password2 = $_POST['regform_password2'];
    $tableName = isset($_POST['regformstudent']) ? "students" : "teachers";
    $uploadDir = 'uploads/'; // Directory where images will be stored

    // Check if passwords match
    if ($process_password == $process_password2) {
        // Hash the password
        $hashed_password = password_hash($process_password, PASSWORD_DEFAULT);

        // Check if email and ID number are unique
        $checkEmailStatement = "SELECT * FROM $tableName WHERE `email`='$process_email'";
        $checkIdNumberStatement = "SELECT * FROM $tableName WHERE `id_number`='$process_id'";

        $checkEmailQuery = mysqli_query($conn, $checkEmailStatement);
        $checkIdNumberQuery = mysqli_query($conn, $checkIdNumberStatement);
        $countEmail = mysqli_num_rows($checkEmailQuery);
        $countIdNumber = mysqli_num_rows($checkIdNumberQuery);

        if ($countEmail == 0 && $countIdNumber == 0) {
            // Handle ID picture upload (if needed)
            if (isset($_FILES['reg_idfront']) && isset($_FILES['reg_idback'])) {
                // Handle ID picture upload for teachers
                $FrontuploadFile = $uploadDir . basename($_FILES['reg_idfront']['name']);
                if (move_uploaded_file($_FILES['reg_idfront']['tmp_name'], $FrontuploadFile)) {
                    // File uploaded successfully
                } else {
                    // Error handling if file upload fails
                    echo "Error uploading file.";
                    exit;
                }
                $BackuploadFile = $uploadDir . basename($_FILES['reg_idback']['name']);
                if (move_uploaded_file($_FILES['reg_idback']['tmp_name'], $BackuploadFile)) {
                    // File uploaded successfully
                } else {
                    // Error handling if file upload fails
                    echo "Error uploading file.";
                    exit;
                }
            } else {
                // Set default values if ID images are not uploaded
                $FrontuploadFile = ''; // Set default empty string
                $BackuploadFile = ''; // Set default empty string
            }

            // Insert user information into the appropriate table
            if ($tableName === "students") {
                // For students
                $process_course = $_POST['regform_course'];
                $process_yearlevel = implode(",", $_POST['regform_yearlevel']);

                $insertStatement = "INSERT INTO approval_lists
                    (`id_number`, `fname`, `lname`, `course`, `year_level`, `email`, `password`, `id_front`, `id_back`)
                    VALUES
                    ('$process_id', '$process_fname', '$process_lname', '$process_course', '$process_yearlevel', '$process_email', '$hashed_password', '$FrontuploadFile', '$BackuploadFile')";
            } else {
                // For teachers
                $insertStatement = "INSERT INTO approval_lists
                    (`id_number`, `fname`, `lname`, `email`, `password`, `id_front`, `id_back`)
                    VALUES
                    ('$process_id', '$process_fname', '$process_lname', '$process_email', '$hashed_password', '$FrontuploadFile', '$BackuploadFile')";
            }

            $result = mysqli_query($conn, $insertStatement);

            if ($result) {
                ?>
                <script>
                    alert("Registration is successful!");
                    window.location.href = "index.php"; 
                </script>
                <?php
                exit;
            } else {
                ?>
                <script>
                    alert("Error in registration!\nTry again.");
                    window.location.href = "index.php"; 
                </script>
                <?php
            }
        } else {
            ?>
            <script>
                alert("User with this ID number or email already exists!\nTry again.");
                window.location.href = "index.php"; 
            </script>
            <?php
        }
    } else {
        ?>
        <script>
            alert("Passwords do not match!\nTry again.");
            window.location.href = "index.php"; 
        </script>
        <?php
    }
}





// Admin Login
if (isset($_POST['login_admin'])) {
    $process_email = $_POST['log_email'];
    $process_password = $_POST['log_password'];

    $checkAccountStatement = "SELECT * FROM `admin` WHERE `email`='$process_email'";
    $checkAccountQuery = mysqli_query($conn, $checkAccountStatement);
    $countAccount = mysqli_num_rows($checkAccountQuery);

    if ($countAccount == 1) {
        $rowData = mysqli_fetch_assoc($checkAccountQuery);
        $databasePassword = $rowData['password'];

        // Verify the password
        if (password_verify($process_password, $databasePassword)) {
            // Password is correct, proceed with login
            $fname = $rowData['fname'];
            $lname = $rowData['lname'];

            $_SESSION['admin_logged_in'] = true;
            $_SESSION['admin_fname'] = $fname;
            $_SESSION['admin_lname'] = $lname;

            header("Location: /capstone/dashboard/dashboard_admin/index.php");
            exit;
        } else {
            // Password is incorrect
            ?>
            <script>
                alert("Incorrect Password. Please try again.");
                window.location.href = "index.php"; 
            </script>
            <?php
        }
    } else {
        // User not found
        ?>
        <script>
            alert("No account found. Please create an account.");
            window.location.href = "index.php"; 
        </script>
        <?php
    }
}


//STUDENT

// Student Login
if (isset($_POST['login_student'])) {
    $process_email = $_POST['log_email'];
    $process_password = $_POST['log_password'];

    $checkAccountStatement = "SELECT * FROM `students` WHERE `email`='$process_email'";
    $checkAccountQuery = mysqli_query($conn, $checkAccountStatement);
    $countAccount = mysqli_num_rows($checkAccountQuery);

    if ($countAccount == 1) {
        $rowData = mysqli_fetch_assoc($checkAccountQuery);
        $databasePassword = $rowData['password'];
        $fname = $rowData['fname'];
        $lname = $rowData['lname'];
        $id_number = $rowData['id_number']; // Retrieve id_number from database
        $course = $rowData['course'];

        // Verify the password
        if (password_verify($process_password, $databasePassword)) {
            // Password is correct, proceed with login
            $_SESSION['student_logged_in'] = true;
            $_SESSION['student_fname'] = $fname;
            $_SESSION['student_lname'] = $lname;
            $_SESSION['id_number'] = $id_number; // Store id_number in session
            $_SESSION['course'] = $course; 

            header("Location: /capstone/dashboard/dashboard_student/index.php");
            exit;
        } else {
            // Password is incorrect
            ?>
            <script>
                alert("Incorrect Password. Please try again.");
                window.location.href = "index.php"; 
            </script>
            <?php
        }
    } else {
        // User not found
        ?>
        <script>
            alert("No account found. Please create an account.");
            window.location.href = "index.php"; 
        </script>
        <?php
    }
}



// Teacher Login
if (isset($_POST['login_teacher'])) {
    $process_email = $_POST['log_email'];
    $process_password = $_POST['log_password'];

    $checkAccountStatement = "SELECT * FROM `teachers` WHERE `email`='$process_email'";
    $checkAccountQuery = mysqli_query($conn, $checkAccountStatement);
    $countAccount = mysqli_num_rows($checkAccountQuery);

    if ($countAccount == 1) {
        $rowData = mysqli_fetch_assoc($checkAccountQuery);
        $databasePassword = $rowData['password'];
        $fname = $rowData['fname'];
        $lname = $rowData['lname'];

        // Verify the password
        if (password_verify($process_password, $databasePassword)) {
            // Password is correct, proceed with login
            $_SESSION['teacher_logged_in'] = true;
            $_SESSION['teacher_fname'] = $fname;
            $_SESSION['teacher_lname'] = $lname;

            header("Location: /capstone/dashboard/dashboard_teacher/index.php");
            exit;
        } else {
            // Password is incorrect
            ?>
            <script>
                alert("Incorrect Password. Please try again.");
                window.location.href = "index.php"; 
            </script>
            <?php
            exit;
        }
    } else {
        // User not found
        ?>
        <script>
            alert("No account found. Please create an account.");
            window.location.href = "index.php"; 
        </script>
        <?php
    }
}

?>