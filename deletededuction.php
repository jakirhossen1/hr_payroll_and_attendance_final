<?php
    require "connect.php";
    
    $Id=$_GET['aid'];
    $sql="delete from deduction where deduction_id='$Id'";
    $query= mysqli_query($conn, $sql);
    header("location:managededuction.php");
?>