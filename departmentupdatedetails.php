<?php 

    require "connect.php";
    
    
    if(isset($_POST['update'])){
        
        $Id=$_POST['Id'];
        $department=$_POST['department'];
        $sql="UPDATE  department SET department_Name='$department' WHERE department_Id='$Id'";
        $query= mysqli_query($conn,$sql);
        
        
        $id=$_POST['id'];
        $designation=$_POST['designation'];
        $sqls="UPDATE  designation SET designation='$designation' WHERE designation_Id='$id'";
        $querys= mysqli_query($conn,$sqls);
        
        header("location:departmentManage.php");
        
    }


?>
