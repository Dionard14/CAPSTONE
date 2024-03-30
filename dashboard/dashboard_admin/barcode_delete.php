<?php
include "conn.php";


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











?>