<?php 
    
    require 'connect.php';
    
    if(isset($_POST['update'])){
        $Id=$_POST['Id'];
        $employee_id=$_POST['employee_id'];
        $addition_code=$_POST['addition_code'];
        $description=$_POST['description'];
        $amount=$_POST['amount'];
        $month=$_POST['month'];
        $addition_year=$_POST['addition_year'];
        $addition_status=$_POST['addition_status'];
        
        
        $sql="UPDATE addition SET employee_id='$employee_id', addition_code='$addition_code', description='$description', amount='$amount',month='$month',addition_year='$addition_year',addition_status='$addition_status' WHERE addition_id='$Id'";
        $query= mysqli_query($conn, $sql);
        
        header("location:additionmanage.php");
    }



?>