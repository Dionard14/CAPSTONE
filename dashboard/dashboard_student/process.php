<?php
include "conn.php";
session_start();

if (isset($_POST['submit'], $_SESSION['student_fname'], $_SESSION['student_lname'], $_SESSION['id_number'], $_SESSION['course'])) {

    $student_fname = $_SESSION['student_fname'];
    $student_lname = $_SESSION['student_lname']; 
    $id_number = $_SESSION['id_number'];
    $course = $_SESSION['course'];


    $process_title = mysqli_real_escape_string($conn, $_POST['title']);
    $process_feedback = mysqli_real_escape_string($conn, $_POST['feedback']);
    $process_recommendation = mysqli_real_escape_string($conn, $_POST['recommendation']);
    $process_rating = mysqli_real_escape_string($conn, $_POST['rating']);

    $insertUserStatement = "INSERT INTO `evaluation`
                            (`student_fname`, `student_lname`, `id_number`, `titles`, `course`,
                            `feedbacks`, `recommendations`, `rating`)
                            VALUES
                            ('$student_fname', '$student_lname', '$id_number',
                            '$process_title', '$course', 
                            '$process_feedback', '$process_recommendation', '$process_rating')";
    $result = mysqli_query($conn, $insertUserStatement);
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
}
