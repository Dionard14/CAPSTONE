<?php
// Include your database connection file
include('conn.php');

// Check if the barcode parameter is set in the POST request
if(isset($_POST['barcode'])) {
    // Sanitize the input to prevent SQL injection
    $barcode = mysqli_real_escape_string($conn, $_POST['barcode']);

    // Query to fetch book details based on barcode
    $query = "SELECT * FROM books WHERE barcode = '$barcode'";

    // Perform the query
    $result = mysqli_query($conn, $query);

    // Check if the query was successful
    if($result) {
        // Fetch the book details as an associative array
        $book = mysqli_fetch_assoc($result);

        // Convert the book details to JSON format  
        echo json_encode($book);
    } else {
        // Handle the case where the query fails
        echo json_encode(array('error' => 'Failed to fetch book details.'));
    }
} else {
    // Handle the case where the barcode parameter is not set
    echo json_encode(array('error' => 'Barcode parameter is missing.'));
}
?>
