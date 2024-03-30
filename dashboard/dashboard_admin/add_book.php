<?php
include "conn.php";

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $barcode = $_POST['barcode'];
    $call_no1 = $_POST['call_no1']; 
    $call_no2 = $_POST['call_no2'];
    $copyright = $_POST['copyright'];
    $title = $_POST['title'];
    $author = $_POST['author'];
    $location = $_POST['location'];

    // Validate form data
    if (empty($barcode) || empty($title)) {
        echo "Barcode and Title are required.";
        exit; 
    }

    $insertQuery = "INSERT INTO books (barcode, call_no1, call_no2, copyright, title, author, location)
                    VALUES ('$barcode', '$call_no1', '$call_no2', '$copyright', '$title', '$author', '$location')";
    
    if (mysqli_query($conn, $insertQuery)) {
        echo "Book added successfully.";
    } else {
        echo "Error: " . $insertQuery . "<br>" . mysqli_error($conn);
    }

    mysqli_close($conn);
} else {
    echo "Error: Form not submitted.";
}
?>
