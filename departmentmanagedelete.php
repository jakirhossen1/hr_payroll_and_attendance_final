<?php
    require "connect.php";
    
    $Id=$_GET['aid'];
    $sql="delete from  department where department_Id='$Id'";
    $query= mysqli_query($conn, $sql);
    header("location:departmentManage.php");
?>
