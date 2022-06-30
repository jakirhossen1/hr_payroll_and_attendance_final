<?php 
    
    require 'connect.php';
    
    if(isset($_POST['update'])){
        $Id=$_POST['Id'];
        $employee_id=$_POST['employee_id'];
        $Salary_Year=$_POST['Salary_Year'];
        $salary_Month=$_POST['salary_Month'];
        $salary_Status=$_POST['salary_Status'];
        
        
        $sql="UPDATE payroll SET employee_id='$employee_id', Salary_Year='$Salary_Year', salary_Month='$salary_Month', salary_Status='$salary_Status' WHERE payroll_id ='$Id'";
        $query= mysqli_query($conn, $sql);
        
        header("location:payslipmanage.php ");
    }



?>