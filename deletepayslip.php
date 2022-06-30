<?php
    require "connect.php";
    
    $Id=$_GET['aid'];
    $sql="delete from  payroll where payroll_id='$Id'";
    $query= mysqli_query($conn, $sql);
    header("location:payslipmanage.php");
?>