<?php
include "conn.php";
session_start();

if (isset($_POST['submit'])) {
    $process_barcode = $_POST['barcode'];
    $process_title = $_POST['title'];
    $process_idnumber = $_POST['id_number'];
    $process_course = $_POST['course'];
    $process_feedback = $_POST['feedback'];
    $process_recommendation = $_POST['recommendation'];
    $process_rating = $_POST['rating'];


        // Insert data into the evaluation table
        $insertEvaluationQuery = "INSERT INTO `evaluation`
                                (`barcode`, `titles`,`id_number`, `course`, `feedbacks`, `recommendations`, `rating`)
                                VALUES
                                ('$process_barcode', '$process_title', '$process_idnumber','$process_course', '$process_feedback',
                                '$process_recommendation', '$process_rating')";
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

?>
