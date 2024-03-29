<?php
include "conn.php";
session_start();
// Admin Login
// Admin Login without Hashing
if (isset($_POST['admin_login'])) {
    $process_email = $_POST['log_email'];
    $process_password = $_POST['log_password'];

    $checkAccountStatement = "SELECT * FROM `admin` WHERE `email`='$process_email'";
    $checkAccountQuery = mysqli_query($conn, $checkAccountStatement);
    $countAccount = mysqli_num_rows($checkAccountQuery);

    if ($countAccount == 1) {
        $rowData = mysqli_fetch_assoc($checkAccountQuery);
        $databasePassword = $rowData['password'];

        // Compare the passwords without hashing
        if ($process_password === $databasePassword) {
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
                window.location.href = "ui-admin.php"; 
            </script>
            <?php
        }
    } else {
        // User not found
        ?>
        <script>
            alert("No account found. Please create an account.");
            window.location.href = "ui-admin.php"; 
        </script>
        <?php
    }
}


if (isset($_POST['admin_register'])) {
    $adminID = $_POST['adminID'];
    $admin_fname = $_POST['admin_fname'];
    $admin_lname = $_POST['admin_lname'];
    $admin_email = $_POST['admin_email'];
    $admin_password = $_POST['admin_password'];

    $insertQuery = "INSERT INTO `admin` (`adminID`, `fname`, `lname`, `email`, `password`) VALUES ('$adminID', '$admin_fname', '$admin_lname', '$admin_email', '$admin_password')";
    $result = mysqli_query($conn, $insertQuery);

    if ($result) {
        // Registration successful
        echo "<script>alert('Registration successful. You can now login.');</script>";
        // Redirect to login page
        echo "<script>window.location.href = 'ui-admin.php';</script>";
        exit;
    } else {
        // Registration failed
        echo "<script>alert('Registration failed. Please try again.');</script>";
        // Redirect back to registration page
        echo "<script>window.location.href = 'ui-admin-register.php';</script>";
        exit;
    }
}
?>