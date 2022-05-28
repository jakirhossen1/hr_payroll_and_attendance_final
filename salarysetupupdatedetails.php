<?php
     require 'connect.php';
     
     if(isset($_POST['update'])){
        $Id=$_POST['id'];
        $EmpNam=$_POST['empNam'];
        $SalaryTyp=$_POST['salaryTyp'];
        $BasicSalary=$_POST['basicSalary'];
        $Medical=$_POST['medical'];
        $House=$_POST['house'];
        $Food=$_POST['food'];
        $Provi=$_POST['provi'];
        $sql="UPDATE  salary_setup SET employe_Name='$EmpNam', salary_types='$SalaryTyp', basic_salary='$BasicSalary', medical='$Medical', house_rent='$House', food='$Food', provident_fund='$Provi' WHERE salary_setup_id='$Id' ";
        $query= mysqli_query($conn, $sql);
        header("location:salarysetupmanage.php");
    }
     
?>

