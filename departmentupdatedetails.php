<?php 

    require "connect.php";
    
    
    if(isset($_POST['update'])){
        
        $Id=$_POST['Id'];
        $department=$_POST['department'];
        $sql="UPDATE  department SET department_Name='$department' WHERE department_Id='$Id'";
        $query= mysqli_query($conn,$sql);
        
        
        $id=$_POST['id'];
        $department=$_POST['department'];
        $sqls="UPDATE  designation SET designation='$degination' WHERE designation_Id='$Ids'";
        $querys= mysqli_query($conn,$sqls);
        
        header("location:departmentManage.php");
        
    }


?>
