<?php
include 'conn.php';

if (isset($_GET['id_number'])) {
    $id_number = $_GET['id_number'];

    // Perform a query to get the course associated with the ID number
    $query = "SELECT course FROM students WHERE id_number = '$id_number'";
    $result = mysqli_query($conn, $query);

    if ($row = mysqli_fetch_assoc($result)) {
        // Return the course associated with the ID number
        echo $row['course'];
    }
}
?>
