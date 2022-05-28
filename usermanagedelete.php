<?php
    require "connect.php";
    
    $Id=$_GET['aid'];
    $sql="delete from  user_table where user_id='$Id'";
    $query= mysqli_query($conn, $sql);
    header("location:userManage.php");
?>

