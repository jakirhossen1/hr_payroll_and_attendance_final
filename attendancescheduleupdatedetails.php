<?php 
    require 'connect.php';
    
    if(isset($_POST['update'])){
        $Id=$_POST['Id'];
        $signin=$_POST['signin'];
        $signout=$_POST['signout'];
        $latecount=$_POST['latecount'];
        $absent=$_POST['absent'];
        
        $sql="UPDATE attendance_schedule SET Signin_in_time_setup='$signin', Sign_out_time_setup='$signout', Late_Count_time='$latecount', Absent_time='$absent'  WHERE Schedule_id='$Id'";
        $query= mysqli_query($conn, $sql);
        
        
        header("location:attendanceschedulemanage.php");
    }
    





?>

