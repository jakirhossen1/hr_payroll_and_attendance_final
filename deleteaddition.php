<?php
    require "connect.php";
    
    $Id=$_GET['aid'];
    $sql="delete from  addition where addition_id='$Id'";
    $query= mysqli_query($conn, $sql);
    header("location:additionmanage.php");
?>