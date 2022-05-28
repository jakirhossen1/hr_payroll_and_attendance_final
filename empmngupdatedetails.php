
<?php

    require 'connect.php';
    
    if(isset($_POST['update'])){
        
        $Id=$_POST['Id'];
        $employ_name=$_POST['employ_name'];
        $employ_email=$_POST['employ_email'];
        $gen=$_POST['gen'];
        $marital_status=$_POST['marital_status'];
        $employ_date_of_birth=$_POST['employ_date_of_birth'];
        $employmet_picture=$_POST['employmet_picture'];
        $employ_religion=$_POST['employ_religion'];
        $employ_district=$_POST['employ_district'];
        $employ_countris=$_POST['employ_countris'];
        $phone=$_POST['phone'];
        $employ_postal_code=$_POST['employ_postal_code'];
        $employ_nationality=$_POST['employ_nationality'];
        $present_address=$_POST['present_address'];
        $permanent_address=$_POST['permanent_address'];
        $employ_nid=$_POST['employ_nid'];
        $employment_status=$_POST['employment_status'];
        $appointment_date=$_POST['appointment_date'];
        $joining_date=$_POST['joining_date'];
        $employee_code=$_POST['employee_code'];
        $employee_status=$_POST['employee_status'];
        
        $sql="UPDATE   employee SET employee_name='$employ_name', email='$employeeemail', gender='$gen', maritial_Status='marital_status', date_of_birth='employ_date_of_birth', picture='$employmet_picture', religion='$employ_religion', district='$employ_district',  Countries='$employ_countris', phone='$phone', postal_code='$employ_postal_code', nationality='$employ_nationality', present_address='$present_address', permanent_address='$permanent_address', Passport_or_NID='$employ_nid', employement_status='$employment_status', appointment_date='$appointment_date', joining_date='$joining_date', employee_code='$employee_code', employee_status='$employee_status'    WHERE employee_id ='$Id'";
        $query= mysqli_query($conn, $sql);
        
        $id=$_POST['id'];
        $employeeemail=$_POST['employeeemail'];
        $employeepass=$_POST['employeepass'];
        $sqls="UPDATE   user_table SET email='$employeeemail', password='$employeepass' WHERE user_id='$id'";
        $querys= mysqli_query($conn, $sqls);
        header("Location:employeeManage.php");
        
    }


?>