<?php
include "conn.php";

// Check if the request method is POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the id_number parameter is set
    if (isset($_POST['id_number'])) {
        // Sanitize the id_number value
        $id_number = mysqli_real_escape_string($conn, $_POST['id_number']);

        // Perform deletion from students table
        $delete_query = "DELETE FROM students WHERE id_number = '$id_number'";
        $result = mysqli_query($conn, $delete_query);

        // Check if deletion from students table was successful
        if ($result) {
            // Provide feedback to the user upon successful deletion
            echo "Record deleted successfully from students table. ";
        } else {
            // Handle error more gracefully
            echo "Error deleting record from students table: " . mysqli_error($conn);
        }
    } else {
        // Handle missing parameter more explicitly
        http_response_code(400); // Bad Request status code
        echo "ID Number parameter is missing.";
    }
} else {
    // Request method is not POST
    http_response_code(405); // Method Not Allowed status code
    echo "Only POST requests are allowed.";
}
?>
