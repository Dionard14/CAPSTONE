<?php
    include "conn.php";

    $evaluationID = $_GET['id'];
    
    $delete = mysqli_query($conn, "DELETE FROM evaluation WHERE evaluationID='$evaluationID'");

    if($delete == true){
        ?>

        <script>
            alert("1 DATA IS DELETED!");
            window.location.href="checkin.php";
        
        
        </script>
        <?php
                }else {
                    ?>
                    <script>
                        alert("NO DATA IS DELETED!");
                        window.location.href="checkin.php";
                    
                    </script>
                    <?php
        
                } 


                // 

                $attendanceID = $_GET['id'];
    
                $delete = mysqli_query($conn, "DELETE FROM attendance WHERE id_number='$attendanceID'");
            
                if($delete == true){
                    ?>
            
                    <script>
                        alert("1 DATA IS DELETED!");
                        window.location.href="checkin.php";
                    
                    
                    </script>
                    <?php
                            }else {
                                ?>
                                <script>
                                    alert("NO DATA IS DELETED!");
                                    window.location.href="checkin.php";
                                
                                </script>
                                <?php
                    
                            }                 

//
                            $studentID = $_GET['id'];
    
                            $delete = mysqli_query($conn, "DELETE FROM students WHERE userID='$studentID'");
                        
                            if($delete == true){
                                ?>
                        
                                <script>
                                    alert("1 DATA IS DELETED!");
                                    window.location.href="checkin.php";
                                
                                
                                </script>
                                <?php
                                        }else {
                                            ?>
                                            <script>
                                                alert("NO DATA IS DELETED!");
                                                window.location.href="checkin.php";
                                            
                                            </script>
                                            <?php
                                
                                        }    


                                        $teacherID = $_GET['id'];
    
                                        $delete = mysqli_query($conn, "DELETE FROM teachers WHERE userID='$studentID'");
                                    
                                        if($delete == true){
                                            ?>
                                    
                                            <script>
                                                alert("1 DATA IS DELETED!");
                                                window.location.href="checkin.php";
                                            
                                            
                                            </script>
                                            <?php
                                                    }else {
                                                        ?>
                                                        <script>
                                                            alert("NO DATA IS DELETED!");
                                                            window.location.href="checkin.php";
                                                        
                                                        </script>
                                                        <?php
                                            
                                                    }    
            
?>