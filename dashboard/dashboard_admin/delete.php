<?php
    include "conn.php";

    $evaluationID = $_GET['id'];
    
    $delete = mysqli_query($conn, "DELETE FROM evaluation WHERE evaluationID='$evaluationID'");

    if($delete == true){
        ?>

        <script>
            alert("1 DATA IS DELETED!");
            window.location.href="index.php";
        
        
        </script>
        <?php
                }else {
                    ?>
                    <script>
                        alert("NO DATA IS DELETED!");
                        window.location.href="index.php";
                    
                    </script>
                    <?php
        
                } 


                // 

                $id_number = $_GET['id'];
    
                $delete = mysqli_query($conn, "DELETE FROM attendance WHERE id_number='$id_number'");
            
                if($delete == true){
                    ?>
            
                    <script>
                        alert("1 DATA IS DELETED!");
                        window.location.href="index.php";
                    
                    
                    </script>
                    <?php
                            }else {
                                ?>
                                <script>
                                    alert("NO DATA IS DELETED!");
                                    window.location.href="index.php";
                                
                                </script>
                                <?php
                    
                            }                 

//
                            $id_number = $_GET['id'];
    
                            $delete = mysqli_query($conn, "DELETE FROM students WHERE id_number='$id_number'");
                        
                            if($delete == true){
                                ?>
                        
                                <script>
                                    alert("1 DATA IS DELETED!");
                                    window.location.href="index.php";
                                
                                
                                </script>
                                <?php
                                        }else {
                                            ?>
                                            <script>
                                                alert("NO DATA IS DELETED!");
                                                window.location.href="index.php";
                                            
                                            </script>
                                            <?php
                                
                                        }    


                                        $id_number = $_GET['id'];
    
                                        $delete = mysqli_query($conn, "DELETE FROM teachers WHERE id_number='$id_number'");
                                    
                                        if($delete == true){
                                            ?>
                                    
                                            <script>
                                                alert("1 DATA IS DELETED!");
                                                window.location.href="index.php";
                                            
                                            
                                            </script>
                                            <?php
                                                    }else {
                                                        ?>
                                                        <script>
                                                            alert("NO DATA IS DELETED!");
                                                            window.location.href="index.php";
                                                        
                                                        </script>
                                                        <?php
                                            
                                                    }    
            
?>