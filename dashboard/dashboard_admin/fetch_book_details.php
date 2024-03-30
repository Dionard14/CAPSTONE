<?php
include('conn.php');

if(isset($_POST['barcode'])) {
    $barcode = mysqli_real_escape_string($conn, $_POST['barcode']);

    $query = "SELECT * FROM books WHERE barcode = '$barcode'";
    $result = mysqli_query($conn, $query);

    if($result) {
        $book = mysqli_fetch_assoc($result);
        echo json_encode($book);
    } else {
        echo json_encode(array('error' => 'Failed to fetch book details.'));
    }
} else {
    echo json_encode(array('error' => 'Barcode parameter is missing.'));
}
?>
