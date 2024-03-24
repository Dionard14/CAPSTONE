<?php
include "conn.php";

// Function to delete from evaluation table
function deleteFromEvaluation($conn, $evaluationID) {
    $delete = mysqli_query($conn, "DELETE FROM evaluation WHERE evaluationID='$evaluationID'");
    return $delete;
}

// Function to delete from attendance table
function deleteFromAttendance($conn, $id_number) {
    $delete = mysqli_query($conn, "DELETE FROM attendance WHERE id_number='$id_number'");
    return $delete;
}

// Function to delete from students table
function deleteFromStudents($conn, $id_number) {
    $delete = mysqli_query($conn, "DELETE FROM students WHERE id_number='$id_number'");
    return $delete;
}

// Function to delete from teachers table
function deleteFromTeachers($conn, $id_number) {
    $delete = mysqli_query($conn, "DELETE FROM teachers WHERE id_number='$id_number'");
    return $delete;
}

// Check if the request method is POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the barcode parameter is set
    if (isset($_POST['barcode'])) {
        // Sanitize the barcode value
        $barcode = $_POST['barcode'];

        // Perform deletion from books table
        $delete_query = "DELETE FROM books WHERE barcode = '$barcode'";
        $result = mysqli_query($conn, $delete_query);

        // Check if deletion from books table was successful
        if ($result) {
            echo "Record deleted successfully from books table. ";
        } else {
            echo "Error deleting record from books table: " . mysqli_error($conn);
        }
    } else {
        // Barcode parameter is not set
        echo "Barcode parameter is missing.";
    }
} else {
    // Request method is not POST
    echo "Only POST requests are allowed.";
}

// Check if the evaluationID parameter is set for evaluation table deletion
if (isset($_GET['evaluationID'])) {
    $evaluationID = $_GET['evaluationID'];
    $deleteEvaluation = deleteFromEvaluation($conn, $evaluationID);
    if ($deleteEvaluation) {
        echo "Record deleted successfully from evaluation table. ";
    } else {
        echo "Error deleting record from evaluation table: " . mysqli_error($conn);
    }
}

// Check if the id_number parameter is set for other table deletions
if (isset($_GET['id_number'])) {
    $id_number = $_GET['id_number'];
    // Delete from attendance table
    $deleteAttendance = deleteFromAttendance($conn, $id_number);
    if ($deleteAttendance) {
        echo "Record deleted successfully from attendance table. ";
    } else {
        echo "Error deleting record from attendance table: " . mysqli_error($conn);
    }

    // Delete from students table
    $deleteStudents = deleteFromStudents($conn, $id_number);
    if ($deleteStudents) {
        echo "Record deleted successfully from students table. ";
    } else {
        echo "Error deleting record from students table: " . mysqli_error($conn);
    }

    // Delete from teachers table
    $deleteTeachers = deleteFromTeachers($conn, $id_number);
    if ($deleteTeachers) {
        echo "Record deleted successfully from teachers table. ";
    } else {
        echo "Error deleting record from teachers table: " . mysqli_error($conn);
    }
}

?>
