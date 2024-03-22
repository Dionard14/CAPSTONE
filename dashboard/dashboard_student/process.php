<?php
include "conn.php";
session_start();

if (isset($_POST['submit'])) {
    $process_barcode = $_POST['barcode'];
    $process_title = $_POST['title'];
    $process_course = $_POST['course'];
    $process_feedback = $_POST['feedback'];
    $process_recommendation = $_POST['recommendation'];
    $process_rating = $_POST['rating'];

    // Check if id_number is set in the session
    if (isset($_SESSION['student_logged_in'])) {
        $id_number = $_SESSION['id_number'];

        // Insert data into the evaluation table
        $insertEvaluationQuery = "INSERT INTO `evaluation`
                                (`barcode`, `titles`, `course`, `feedbacks`, `recommendations`, `rating`, `student_id`)
                                VALUES
                                ('$process_barcode', '$process_title', '$process_course', '$process_feedback',
                                '$process_recommendation', '$process_rating', '$id_number')";
        $result = mysqli_query($conn, $insertEvaluationQuery);
        if ($result) {
            ?>
            <script>
                alert("Your Submission is Successful!");
                window.location.href = "index.php";
            </script>
            <?php
        } else {
            ?>
            <script>
                alert("Error Submission!\nTry Again!");
                window.location.href = "index.php";
            </script>
            <?php
        }
    } else {
        ?>
        <script>
            alert("Session not set!\nTry logging in again!");
            window.location.href = "index.php";
        </script>
        <?php
    }
}
?>
