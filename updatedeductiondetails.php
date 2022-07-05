<?php 
    
    require 'connect.php';
    
    if(isset($_POST['update'])){
        $Id=$_POST['Id'];
        $employee_id=$_POST['employee_id'];
        $deduction_code=$_POST['deduction_code'];
        $description=$_POST['description'];
        $amount=$_POST['amount'];
        $month=$_POST['month'];
        $deduction_year=$_POST['deduction_year'];
        $deduction_status=$_POST['deduction_status'];
        
        
        $sql="UPDATE addition SET employee_id='$employee_id', deduction_code='$deduction_code', description='$description', amount='$amount',month='$month',deduction_year='$deduction_year',deduction_status='$deduction_status' WHERE deduction_id='$Id'";
        $query= mysqli_query($conn,$sql);
        
        header("location:managededuction.php");
    }



?>