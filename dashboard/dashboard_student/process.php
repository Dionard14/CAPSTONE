<?php
include "conn.php";
session_start();

if (isset($_POST['submit'])) {
    $process_title = $_POST['title'];
    // $process_author = $_POST['author'];
    // $process_genre = $_POST['genre'];
    // $process_review = $_POST['review'];
    $process_feedback = $_POST['feedback'];
    $process_recommendation = $_POST['recommendation'];
    $process_rating = $_POST['rating'];

            $insertUserStatement = "INSERT INTO `evaluation`
                                    (`titles`, 
                                    `feedbacks`, `recommendations`, `rating`)
                                    VALUES
                                    ('$process_title', 
                                    '$process_feedback',
                                    '$process_recommendation', '$process_rating')";
            $result = mysqli_query($conn, $insertUserStatement);
            if ($result == true) {
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
        }


        

?>
