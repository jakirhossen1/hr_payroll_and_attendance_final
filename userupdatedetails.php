<?php 
    require 'connect.php';
    
    if(isset($_POST['update'])){
        $Id=$_POST['Id'];
        $username=$_POST['username'];
        $roleId=$_POST['roleId'];
        $fullname=$_POST['fullname'];
        $phone=$_POST['phone'];
        $email=$_POST['email'];
        $password=$_POST['password'];
        $date=$_POST['date'];
        $status=$_POST['status'];
        
        $sql="UPDATE  user_table SET user_name='$username', role_id='$roleId', full_name='$fullname', phone='$phone', email='$email', password='$password', account_creation_date='$date', status='$status'  WHERE user_id='$Id' ";
        $query= mysqli_query($conn, $sql);
        header("location:userManage.php");
    }



?>

