<?php

    require "connect.php";
    
    $Id=$_GET['aid'];
    $sql="delete from  claims where claims_id='$Id'";
    $query= mysqli_query($conn, $sql);
	
    header("location:manageclaims.php");
	
?>