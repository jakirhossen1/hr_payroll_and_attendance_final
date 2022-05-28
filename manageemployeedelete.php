<?php
    
    require 'connect.php';
    
    $Id=$_GET['aid'];
    $sql="Delete from employee where employee_id='$Id'";
    $query= mysqli_query($conn, $sql);
    header("location:employeeManage.php");


?>
