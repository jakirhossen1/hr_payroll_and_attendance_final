<?php 
    
    require 'connect.php';
    
    if(isset($_POST['update'])){
        $Id=$_POST['Id'];
        $employee_id=$_POST['employee_id'];
        $claims_date=$_POST['claims_date'];
        $type_of_expense=$_POST['type_of_expense'];
        $total_amount=$_POST['total_amount'];
        $documents=$_POST['documents'];
        $claims_status=$_POST['claims_status'];
        
        
        $sql="UPDATE claims SET employee_id='$employee_id', claims_date='$claims_date', type_of_expense='$type_of_expense', total_amount='$total_amount',documents='$documents', claims_status='$claims_status' WHERE claims_id='$Id'";
        $query= mysqli_query($conn, $sql);
        
        header("location:manageclaims.php ");
    }



?>