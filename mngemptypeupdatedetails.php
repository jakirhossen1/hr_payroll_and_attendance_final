<?php 

    require 'connect.php';
    
    
    if(isset($_POST['update'])){
        
        $Id=$_POST['Id'];
        $employeeType=$_POST['employeeType'];
        
        $sql="UPDATE  employee_type SET employee_Type='$employeeType' WHERE employee_Type_id='$Id'";
        $query= mysqli_query($conn, $sql);
        header("Location:employeeTypeManage.php");
        
    }

?>

