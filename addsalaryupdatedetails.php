<?php 
require 'connect.php';

    if(isset($_POST['update'])){
        $Id=$_POST['Id'];
        $salaryType=$_POST['salaryType'];
        
        $sql="UPDATE salary_type SET salary_Type='$salaryType' WHERE  salary_Type_id='$Id' ";
        $query= mysqli_query($conn, $sql);
        header("location:salaryTypeManage.php");
    }


?>

