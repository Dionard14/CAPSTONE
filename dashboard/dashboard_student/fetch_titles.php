<?php
// Include your database connection file here
include 'conn.php';

if (isset($_GET['input'])) {
    $input = $_GET['input'];

    // Perform a query to get title suggestions based on the input
    $query = "SELECT DISTINCT title FROM books WHERE title LIKE '%$input%'";
    $result = mysqli_query($conn, $query);

    while ($row = mysqli_fetch_assoc($result)) {
        echo '<div>' . $row['title'] . '</div>';
    }
}
?>
