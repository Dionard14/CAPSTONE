<?php
include "conn.php";


// Check if the request method is POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['barcode'])) {
        $barcode = $_POST['barcode'];

        $delete_query = "DELETE FROM books WHERE barcode = '$barcode'";
        $result = mysqli_query($conn, $delete_query);

        if ($result) {
            echo "Record deleted successfully from books table. ";
        } else {
            echo "Error deleting record from books table: " . mysqli_error($conn);
        }
    } else {
        echo "Barcode parameter is missing.";
    }
} else {
    echo "Only POST requests are allowed.";
}











?>