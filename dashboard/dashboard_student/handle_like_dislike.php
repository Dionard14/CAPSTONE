<?php
// Include database connection
include "conn.php";

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Get evaluation ID and action from POST data
$evaluationID = $_POST['evaluationID'];
$action = $_POST['action'];

// Insert like/dislike into database
$sql = "INSERT INTO evaluation_likes (evaluationID, action) VALUES ('$evaluationID', '$action')";
if (mysqli_query($conn, $sql)) {
    // Get updated like/dislike count
    $likeCount = getLikeDislikeCount($evaluationID, 'like');
    $dislikeCount = getLikeDislikeCount($evaluationID, 'dislike');
    // Return JSON response with updated counts
    echo json_encode(['likeCount' => $likeCount, 'dislikeCount' => $dislikeCount]);
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

// Close the database connection
mysqli_close($conn);
?>
