<?php
    require "connect.php";
    
    $id=$_GET['aid'];
    $sql="delete from  employee_type where employee_Type_id='$id'";
    $query= mysqli_query($conn, $sql);
    header("location:employeeTypeManage.php");
?>

