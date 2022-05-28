<?php
    require "connect.php";
    
    $Id=$_GET['aid'];
    $sql="delete from  leaves where leave_id='$Id'";
    $query= mysqli_query($conn, $sql);
    header("location:leaveManage.php");
?>

