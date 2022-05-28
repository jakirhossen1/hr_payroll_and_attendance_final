<?php 
    
    require 'connect.php';
    
    if(isset($_POST['update'])){
        $Id=$_POST['Id'];
        $select_employee=$_POST['select_employee'];
        $leave_type=$_POST['leave_type'];
        $leave_start_date=$_POST['leave_start_date'];
        $leave_ends_date=$_POST['leave_ends_date'];
        $description=$_POST['description'];
        $support_document=$_POST['support_document'];
        $leave_status=$_POST['leave_status'];
        
        $sql="UPDATE leaves SET employee_id='$select_employee', leave_type_id='$leave_type', leave_start_date='$leave_start_date', leave_end_date='$leave_ends_date', leave_for='$description', supported_document='$support_document', leave_status='$leave_status' WHERE leave_id='$Id'";
        $query= mysqli_query($conn, $sql);
        
        header("location:leaveManage.php ");
    }



?>

