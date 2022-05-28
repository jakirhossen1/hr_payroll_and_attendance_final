<?php 
require 'connect.php';
$s=$_GET['aid'];
$sql="delete from leave_type where leave_type_id='$s'";
$query=mysqli_query($conn,$sql);
header("location:leaveTypeManage.php")


?>