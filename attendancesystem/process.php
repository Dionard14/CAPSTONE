<?php
include "conn.php";

date_default_timezone_set('Asia/Manila');

if (isset($_POST['checkin'])) {
    $id_number = mysqli_real_escape_string($conn, $_POST['id_number']);

    $checkStudentQuery = "SELECT * FROM students WHERE id_number = '$id_number'";
    $result = mysqli_query($conn, $checkStudentQuery);

    if (!$result) {
        echo "Error: " . mysqli_error($conn);
    } elseif (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $fname = $row['fname'];
        $lname = $row['lname'];
        $course = $row['course'];
        $year = $row['year'];

        $checkin_time = date('Y-m-d H:i:s');
        $insertQuery = "INSERT INTO attendance (id_number, fname, lname, course, year, checkin_time) VALUES ('$id_number', '$fname', '$lname', '$course', '$year', '$checkin_time')";

        if (mysqli_query($conn, $insertQuery)) {
            ?>
            <script>
                alert("Check-in is successful!");
                window.location.href = "checkin.php";
            </script>
            <?php
        } else {
            ?>
            <script>
                alert("Check-in failed: <?php echo mysqli_error($conn); ?>");
                window.location.href = "checkin.php";
            </script>
            <?php
        }
    } else {
        ?>
        <script>
            alert("Student with userID <?php echo $id_number; ?> not found.");
            window.location.href = "checkin.php";
        </script>
        <?php
    }
}







    // Redirect to "checkin.php" using a meta refresh tag
   // header("refresh:3;url=checkin.php"); // Redirect after 3 seconds

 /*
            ?>
            <script>
                alert("Check-in is successful!");
                window.location.href = "checkin.php"; /
            </script>
            <?php
        } else {
            ?>
            <script>
                alert('Error: Check-in failed. Please try again later.');
                window.location.href = 'checkin.php'; 
            </script>
            <?php
        }
    } else {
        ?>
        <script>
            alert('Error: Student with ID number <?php echo $id_number; ?> not found.');
            window.location.href = 'checkin.php';
        </script>
        <?php
    }
}*/    
?>

