<?php
header('Content-Type: application/json');

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Fetch the student record with the given ID from the database
    $sql = "SELECT * FROM students WHERE id_number = '$id'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Return the fetched data as JSON
        $row = $result->fetch_assoc();
        echo json_encode($row);
    } else {
        echo json_encode(['error' => 'Student not found']);
    }
} else {
    echo json_encode(['error' => 'Invalid request']);
}

$conn->close();
?>
