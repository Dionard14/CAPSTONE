<?php
// Include your database connection file here
include 'conn.php';

if (isset($_GET['input'])) {
    $input = $_GET['input'];

    // Perform a query to get barcode and title suggestions based on the input
    $query = "SELECT DISTINCT barcode, title FROM books WHERE barcode LIKE '%$input%'";
    $result = mysqli_query($conn, $query);

    while ($row = mysqli_fetch_assoc($result)) {
        // Modify the response to return the barcode and title
        echo '<div data-title="' . $row['title'] . '">' . $row['barcode'] . '</div>';
    }
}


?>