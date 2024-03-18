<?php
// Include database connection
include "conn.php";

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Get evaluation ID and action from POST data (sanitize input)
$evaluationID = mysqli_real_escape_string($conn, $_POST['evaluationID']);
$action = mysqli_real_escape_string($conn, $_POST['action']);

// Prepare and bind the SQL statement
$sql = "INSERT INTO evaluation_likes (evaluationID, action) VALUES (?, ?)";
$stmt = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($stmt, "ss", $evaluationID, $action);

// Execute the statement
if (mysqli_stmt_execute($stmt)) {
    // Get updated like/dislike count
    $likeCount = getLikeDislikeCount($evaluationID, 'like');
    $dislikeCount = getLikeDislikeCount($evaluationID, 'dislike');
    // Return JSON response with updated counts
    echo json_encode(['likeCount' => $likeCount, 'dislikeCount' => $dislikeCount]);
} else {
    echo "Error: " . mysqli_error($conn);
}

// Close statement and database connection
mysqli_stmt_close($stmt);
mysqli_close($conn);
?>
