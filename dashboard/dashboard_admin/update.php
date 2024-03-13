<?php

include "conn.php";
session_start();

    if(isset($_POST['updatedata']))
    {   
        $id_number = $_POST['id_number'];       
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $course = $_POST['course'];
        $year_level = $_POST['year_level'];
        $email = $_POST['email'];

        $query = "UPDATE students SET id_number='$id_number', fname='$fname', lname='$lname', course='$course', year_level=' $year_level', email='$email' WHERE id_number='$id_number'  ";
        $query_run = mysqli_query($conn, $query);

        if($query_run)
        {
            echo '<script> alert("Data Updated"); </script>';
            header("Location:index.php");
        }
        else
        {
            echo '<script> alert("Data Not Updated"); </script>';
        }
    }
?>