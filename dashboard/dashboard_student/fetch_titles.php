<?php
include 'conn.php';

if (isset($_GET['input'])) {
    $input = $_GET['input'];

    $query = "SELECT DISTINCT barcode, title FROM books WHERE barcode LIKE '%$input%'";
    $result = mysqli_query($conn, $query);

    while ($row = mysqli_fetch_assoc($result)) {
        echo '<div data-title="' . $row['title'] . '">' . $row['barcode'] . '</div>';
    }
}


?>