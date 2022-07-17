<?php

	include ("connect.php");
	date_default_timezone_set("Asia/Dhaka");
	session_start();
	
	if(!isset($_SESSION['userName'])){
		
	  header("location:Login.php");  
	  
	}
	
?>

<!doctype html>
<html lang="en" class="light-theme">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="assets/images/favicon-32x32.png" type="image/png" />
	<!--plugins-->
	<link href="assets/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
	<link href="assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
	<link href="assets/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />
	<link href="assets/plugins/vectormap/jquery-jvectormap-2.0.2.css" rel="stylesheet" />
	<link href="assets/plugins/datatable/css/dataTables.bootstrap5.min.css" rel="stylesheet" />
	<!-- Bootstrap CSS -->
	<link href="assets/css/bootstrap.min.css" rel="stylesheet" />
	<link href="assets/css/bootstrap-extended.css" rel="stylesheet" />
	<link href="assets/css/style.css" rel="stylesheet" />
	<link href="assets/css/icons.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

	<!-- loader-->
	<link href="assets/css/pace.min.css" rel="stylesheet" />

	<!--Theme Styles-->
	<link href="assets/css/dark-theme.css" rel="stylesheet" />
	<link href="assets/css/light-theme.css" rel="stylesheet" />
	<link href="assets/css/semi-dark.css" rel="stylesheet" />
	<link href="assets/css/header-colors.css" rel="stylesheet" />

	<title>HR PAYROLL SOFTWARE</title>
	
	<style>
	
		.forms-body{
			
			margin: 10px;
			
		}
		
	</style>
	
</head>

<body>


	<!--start wrapper-->
	<div class="wrapper">
		<!--start top header-->
		<header class="top-header">  
		
			<?php include("headers.php");?>
			
		</header>
		<!--end top header-->

        <!--start sidebar -->
        <aside class="sidebar-wrapper" data-simplebar="true">
		
			<?php include("SidebarMenu.php");?>
			
		</aside>
		<!--end sidebar -->

		<!--start content-->
        <main class="page-content">