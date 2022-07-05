
<?php

    require 'connect.php';
    
    if(isset($_POST['update'])){
        
        $Id=$_POST['Id'];
        $employee_name=$_POST['employee_name'];
        $gender=$_POST['gender'];
        $maritial_Status=$_POST['maritial_Status'];
        $date_of_birth=$_POST['date_of_birth'];
        $religion=$_POST['religion'];
        $district=$_POST['district'];
        $Countries=$_POST['Countries'];
        $phone=$_POST['phone'];
        $postal_code=$_POST['postal_code'];
        $nationality=$_POST['nationality'];
        $present_address=$_POST['present_address'];
        $permanent_address=$_POST['permanent_address'];
        $Passport_or_NID=$_POST['Passport_or_NID'];
        $employee_status=$_POST['employee_status'];
        $employee_type_id=$_POST['employee_type_id'];
        $department_id=$_POST['department_id'];
        $designation_id=$_POST['designation_id'];
        $appointment_date=$_POST['appointment_date'];
        $joining_date=$_POST['joining_date'];
        $employee_code=$_POST['employee_code'];
        $created_by=$_POST['created_by'];
        
        
        $sql="UPDATE `employee` SET `employee_type_id`='$employee_type_id',`department_id`='$department_id',`designation_id`='$designation_id',`employee_name`='$employee_name',`appointment_date`='$appointment_date',`date_of_birth`='$date_of_birth',`employee_code`='$employee_code',`joining_date`='$joining_date',`employee_status`='$employee_status',`religion`='$religion',`nationality`='$nationality',`district`='$district',`Countries`='$Countries',`postal_code`='$postal_code',`Passport_or_NID`='$Passport_or_NID',`gender`='$gender',`maritial_Status`='$maritial_Status',`present_address`='$present_address',`permanent_address`='$permanent_address',`created_by`='$created_by',`phone`='$phone' WHERE `employee_id` ='$Id'";

        // $sql="UPDATE `employee` SET `employee_name`='$employee_name',`gender`='$gender',`maritial_Status`='$maritial_Status',`date_of_birth`='$date_of_birth',`religion`='$religion',`district`='$district',`Countries`='$Countries',`phone`='$phone',`postal_code`='$postal_code',`present_address`='$present_address',`permanent_address`='$permanent_address',`Passport_or_NID`='$Passport_or_NID',`employee_status`='$employee_status',`employee_type_id`='$employee_type_id',`department_id`='$department_id',`designation_id`='$designation_id',`appointment_date`='$appointment_date',`joining_date`='$joining_date',`employee_code`='$employee_code',`created_by`='$created_by' WHERE `employee_id` ='$Id'";
        
        $query= mysqli_query($conn, $sql);
        header("Location:employeeManage.php");
        
    }


?>