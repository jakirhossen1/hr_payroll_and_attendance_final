<?php
    require "connect.php";
    
    $id=$_GET['aid'];
    $sql="delete from  salary_type where salary_Type_id='$id'";
    $query= mysqli_query($conn, $sql);
    header("location:salaryTypeManage.php");
?>
