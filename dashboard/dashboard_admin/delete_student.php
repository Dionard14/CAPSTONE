<?php
include "conn.php";

// Check if the request method is POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['id_number'])) {
        $id_number = mysqli_real_escape_string($conn, $_POST['id_number']);

        $delete_query = "DELETE FROM students WHERE id_number = '$id_number'";
        $result = mysqli_query($conn, $delete_query);

        if ($result) {
            echo "Record deleted successfully from students table. ";
        } else {
            echo "Error deleting record from students table: " . mysqli_error($conn);
        }
    } else {
        http_response_code(400); 
        echo "ID Number parameter is missing.";
    }
} else {
    http_response_code(405); 
    echo "Only POST requests are allowed.";
}
?>
