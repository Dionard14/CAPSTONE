<?php

include 'conn.php';

if (isset($_GET['input'])) {
    $input = $_GET['input'];

    // Perform a query to get ID number suggestions based on the input
    $query = "SELECT DISTINCT id_number FROM students WHERE id_number LIKE '%$input%'";
    $result = mysqli_query($conn, $query);

    while ($row = mysqli_fetch_assoc($result)) {
        // Return the ID number suggestion
        echo '<div>' . $row['id_number'] . '</div>';
    }
}



?>