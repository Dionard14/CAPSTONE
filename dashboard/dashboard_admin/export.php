<?php  
// export.php
$connect = mysqli_connect("localhost", "root", "", "ui_library"); // Update your_database_name with the actual name of your database
$output = '';

if(isset($_POST["export"]))
{
    $query = "SELECT * FROM attendance"; // Update table name if needed
    $result = mysqli_query($connect, $query);

    if(mysqli_num_rows($result) > 0)
    {
        $output .= '
            <table class="table" bordered="1">  
                <tr>  
                    <th>ID NUMBER</th>  
                    <th>FIRST NAME</th>  
                    <th>LAST NAME</th>  
                    <th>COURSE</th>  
                    <th>YEAR LEVEL</th>
                    <th>TIME IN TIME</th>
                    <th>TIME OUT TIME</th>
                </tr>
        ';

        while($row = mysqli_fetch_array($result))
        {
            $output .= '
                <tr>  
                    <td>'.$row["id_number"].'</td>  
                    <td>'.$row["fname"].'</td>  
                    <td>'.$row["lname"].'</td>  
                    <td>'.$row["course"].'</td>  
                    <td>'.$row["year_level"].'</td>
                    <td>'.$row["checkin_time"].'</td>
                    <td>'.$row["checkout_time"].'</td>
                </tr>
            ';
        }

        $output .= '</table>';
        header('Content-Type: application/xls');
        header('Content-Disposition: attachment; filename=attendance_export.xls');
        echo $output;
    }
}
?>