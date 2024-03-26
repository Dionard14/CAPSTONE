<?php
// Include database connection
include "conn.php";
session_start();

// Check if evaluationID, action, student names, and id_number are set in the POST request
if(isset($_POST['evaluationID'], $_POST['action'], $_SESSION['student_fname'], $_SESSION['student_lname'], $_SESSION['id_number'])) {
    // Sanitize and retrieve evaluationID, action, student names, and id_number
    $evaluationID = mysqli_real_escape_string($conn, $_POST['evaluationID']);
    $action = mysqli_real_escape_string($conn, $_POST['action']);
    $student_fname = $_SESSION['student_fname'];
    $student_lname = $_SESSION['student_lname'];
    $id_number = $_SESSION['id_number']; // Retrieve id_number from session

    // Check if the user has already performed the same action for the evaluation
    $checkSql = "SELECT * FROM evaluation_likes WHERE evaluationID = '$evaluationID' AND id_number = '$id_number'";
    $checkResult = mysqli_query($conn, $checkSql);
    $rowCount = mysqli_num_rows($checkResult);

    if ($rowCount > 0) {
        // User has already performed the same action, update the action
        $updateSql = "UPDATE evaluation_likes SET action = '$action' WHERE evaluationID = '$evaluationID' AND id_number = '$id_number'";
        if (mysqli_query($conn, $updateSql)) {
            // Successfully updated, return like and dislike counts
            $likeCount = getLikeDislikeCount($evaluationID, 'like');
            $dislikeCount = getLikeDislikeCount($evaluationID, 'dislike');
            $response = array('likeCount' => $likeCount, 'dislikeCount' => $dislikeCount);
            echo json_encode($response);
        } else {
            // Update failed, return error message
            echo json_encode(array('error' => 'Failed to update action.'));
        }
    } else {
        // User has not performed the same action yet, insert the action
        $insertSql = "INSERT INTO evaluation_likes (evaluationID, action, student_fname, student_lname, id_number) VALUES ('$evaluationID', '$action', '$student_fname', '$student_lname', '$id_number')";
        if (mysqli_query($conn, $insertSql)) {
            // Successfully inserted, return like and dislike counts
            $likeCount = getLikeDislikeCount($evaluationID, 'like');
            $dislikeCount = getLikeDislikeCount($evaluationID, 'dislike');
            $response = array('likeCount' => $likeCount, 'dislikeCount' => $dislikeCount);
            echo json_encode($response);
        } else {
            // Insertion failed, return error message
            echo json_encode(array('error' => 'Failed to record action.'));
        }
    }
} else {
    // If evaluationID, action, student first name, student last name, or id_number is not set in the POST request, return an error message
    echo json_encode(array('error' => 'EvaluationID, action, student first name, student last name, and id_number must be provided.'));
}

// Function to get the count of likes and dislikes for an evaluation
function getLikeDislikeCount($evaluationID, $action)
{
    global $conn;
    $sql = "SELECT COUNT(*) AS count FROM evaluation_likes WHERE evaluationID = '$evaluationID' AND action = '$action'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
    return $row['count'];
}

