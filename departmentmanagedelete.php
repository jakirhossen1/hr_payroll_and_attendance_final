<?php

    require "connect.php";
    
    $Id=$_GET['aid'];
    $sql="delete from  department where department_Id='$Id'";
    $query= mysqli_query($conn, $sql);


    $id=$_GET['aid'];
    $sqls="delete from  designation where designation_Id='$id'";
    $querys= mysqli_query($conn, $sqls);

    header("location:departmentManage.php");
	
?>
