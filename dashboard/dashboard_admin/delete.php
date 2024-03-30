<?php
include "conn.php";

// Check if the evaluationID parameter is set for evaluation table deletion
if (isset($_GET['evaluationID'])) {
    $evaluationID = $_GET['evaluationID'];
    $deleteEvaluation = mysqli_query($conn, "DELETE FROM evaluation WHERE evaluationID='$evaluationID'");
    if ($deleteEvaluation) {
        echo "Record deleted successfully from evaluation table. ";
        header("Location: {$_SERVER['HTTP_REFERER']}");
        exit();
    } else {
        echo "Error deleting record from evaluation table: " . mysqli_error($conn);
    }
}

// Check if the attendanceID parameter is set for attendance table deletion
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $deleteAttendance = mysqli_query($conn, "DELETE FROM attendance WHERE id='$id'");
    if ($deleteAttendance) {
        echo "Record deleted successfully from attendance table. ";
        header("Location: {$_SERVER['HTTP_REFERER']}");
        exit();
    } else {
        echo "Error deleting record from attendance table: " . mysqli_error($conn);
    }
}

// Check if the id_number parameter is set for other table deletions
if (isset($_GET['id_number'])) {
    $id_number = $_GET['id_number'];

    // Delete from students table
    $deleteStudents = mysqli_query($conn, "DELETE FROM students WHERE id_number='$id_number'");
    if ($deleteStudents) {
        echo "Record deleted successfully from students table. ";
    } else {
        echo "Error deleting record from students table: " . mysqli_error($conn);
    }

    // Delete from teachers table
    $deleteTeachers = mysqli_query($conn, "DELETE FROM teachers WHERE id_number='$id_number'");
    if ($deleteTeachers) {
        echo "Record deleted successfully from teachers table. ";
    } else {
        echo "Error deleting record from teachers table: " . mysqli_error($conn);
    }

    header("Location: {$_SERVER['HTTP_REFERER']}");
    exit();
}
?>
