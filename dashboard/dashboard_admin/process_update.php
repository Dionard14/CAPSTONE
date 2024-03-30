<?php
include('conn.php');

if(isset($_POST['updateBarcode']) && isset($_POST['updateCallnumber1']) && isset($_POST['updateCallnumber2']) && isset($_POST['updateCopyright']) && isset($_POST['updateTitle']) && isset($_POST['updateAuthor']) && isset($_POST['updateLocation'])) {
    $barcode = mysqli_real_escape_string($conn, $_POST['updateBarcode']);
    $callnumber1 = mysqli_real_escape_string($conn, $_POST['updateCallnumber1']);
    $callnumber2 = mysqli_real_escape_string($conn, $_POST['updateCallnumber2']);
    $copyright = mysqli_real_escape_string($conn, $_POST['updateCopyright']);
    $title = mysqli_real_escape_string($conn, $_POST['updateTitle']);
    $author = mysqli_real_escape_string($conn, $_POST['updateAuthor']);
    $location = mysqli_real_escape_string($conn, $_POST['updateLocation']);

    $query = "UPDATE books SET barcode='$barcode', call_no1='$callnumber1', call_no2='$callnumber2', copyright='$copyright', title='$title', author='$author', location='$location' WHERE barcode='$barcode'";

    $result = mysqli_query($conn, $query);

    if($result) {
        echo json_encode(array('success' => 'Book details updated successfully.'));
    } else {
        echo json_encode(array('error' => 'Failed to update book details.'));
    }
} else {
    echo json_encode(array('error' => 'Required parameters are missing.'));
}
?>
