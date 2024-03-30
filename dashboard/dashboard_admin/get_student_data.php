<?php
header('Content-Type: application/json');

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT * FROM students WHERE id_number = '$id'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
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
