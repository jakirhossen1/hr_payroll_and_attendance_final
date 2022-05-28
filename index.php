<?php 
	if(! isset($_SESSION['userName'])){
	  header("location:Login.php");  
	}else {
		header("location:Dashboard.php");  
	}

?>