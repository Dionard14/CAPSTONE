<?php
// Include your database connection file
include('conn.php');

// Check if the id_number parameter is set in the POST request
if(isset($_POST['id_number'])) {
    // Sanitize the input to prevent SQL injection
    $id_number = mysqli_real_escape_string($conn, $_POST['id_number']);

    // Query to fetch student details based on id_number
    $query = "SELECT * FROM students WHERE id_number = '$id_number'";

    // Perform the query
    $result = mysqli_query($conn, $query);

    // Check if the query was successful and if any rows were returned
    if($result && mysqli_num_rows($result) > 0) {
        // Fetch the student details as an associative array
        $student = mysqli_fetch_assoc($result);
        // Output the student details as JSON
        echo json_encode($student);
    } else {
        // Output error message if no student found
        echo json_encode(array('error' => 'No student found with the provided ID number.'));
    }
} else {
    // Handle the case where id_number parameter is missing
    echo json_encode(array('error' => 'ID number parameter is missing.'));
}

?>
