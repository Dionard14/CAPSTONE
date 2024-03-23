<?php
// Include your database connection file
include('conn.php');

// Check if the updateBarcode and other necessary parameters are set in the POST request
if(isset($_POST['updateBarcode']) && isset($_POST['updateCallnumber1']) && isset($_POST['updateCallnumber2']) && isset($_POST['updateCopyright']) && isset($_POST['updateTitle']) && isset($_POST['updateAuthor']) && isset($_POST['updateLocation'])) {
    // Sanitize the input to prevent SQL injection
    $barcode = mysqli_real_escape_string($conn, $_POST['updateBarcode']);
    $callnumber1 = mysqli_real_escape_string($conn, $_POST['updateCallnumber1']);
    $callnumber2 = mysqli_real_escape_string($conn, $_POST['updateCallnumber2']);
    $copyright = mysqli_real_escape_string($conn, $_POST['updateCopyright']);
    $title = mysqli_real_escape_string($conn, $_POST['updateTitle']);
    $author = mysqli_real_escape_string($conn, $_POST['updateAuthor']);
    $location = mysqli_real_escape_string($conn, $_POST['updateLocation']);

    // Query to update book details based on Barcode
    $query = "UPDATE books SET barcode='$barcode', call_no1='$callnumber1', call_no2='$callnumber2', copyright='$copyright', title='$title', author='$author', location='$location' WHERE barcode='$barcode'";

    // Perform the update query
    $result = mysqli_query($conn, $query);

    // Check if the query was successful
    if($result) {
        // Output success message
        echo json_encode(array('success' => 'Book details updated successfully.'));
    } else {
        // Output error message
        echo json_encode(array('error' => 'Failed to update book details.'));
    }
} else {
    // Handle the case where required parameters are missing
    echo json_encode(array('error' => 'Required parameters are missing.'));
}
?>
