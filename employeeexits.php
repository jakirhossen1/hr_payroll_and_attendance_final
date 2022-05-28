<?php
require "connect.php";

if(isset($_POST['email'])){
    $UserEmail=$_POST['email'];
    
    $sql="SELECT * FROM employee WHERE email='$UserEmail'";
    $query= mysqli_query($conn, $sql);
    if(mysqli_affected_rows($conn)){
        echo 1;
    }
    else{
        echo 0;
    }
}


?>
