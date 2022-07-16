<?php 
	
	require "connect.php";
	
	date_default_timezone_set("Asia/Dhaka");
	@session_start();
	
	if (!isset($_SESSION['userName'])){
		
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
	
		.forms-body {
			
			margin: 10px;
			
		}
		
	</style>
</head>

<body>


	<!--start wrapper-->
	<div class="wrapper">
		<!--start top header-->
		<header class="top-header">
		
			<?php echo include("headers.php"); ?>
			
		</header>
		<!--end top header-->

		<!--start sidebar -->
		<aside class="sidebar-wrapper" data-simplebar="true">
		
			<?php echo include("SidebarMenu.php"); ?>
			
		</aside>
		<!--end sidebar -->

		<!--start content-->
		<main class="page-content">
			<div class="modal-content">
				<div class="forms-body">
					<form action="" method="post" enctype="multipart/form-data">
						<div class="row">
							<div class="col-md-12">
							
								<h3 style="margin:10px;">Add Company</h3>
								
							</div>
						</div>
						<hr>
						
						
						<div class="row">
							<div class="col-md-3"></div>
							<div class="col-md-6">
								<div class="row">
									<div class="col-md-12">
										<input type="text" name="company_name" class="form-control mt-2" placeholder="Please enter your company name." required>
									</div>
								</div>
								
								<div class="row">
									<div class="col-md-12">
										<input type="text" name="company_address" class="form-control mt-2" placeholder="Please enter your company address." required>
									</div>
								</div>
								
								<div class="row">
									<div class="col-md-12">
										<input type="number" name="company_phone" class="form-control mt-2" placeholder="Please enter your phone number." required>
									</div>
								</div>
								
								<div class="row">
									<div class="col-md-12">
										<input type="email" name="company_email" class="form-control mt-2" placeholder="Please enter your company email address." required>
									</div>
								</div>
								
								<div class="row">
									<div class="col-md-12">
										<input type="file" name="company_logo" class="form-control mt-2" required>
									</div>
								</div>
								
								<div class="row">
									<div class="col-md-12">
										<input type="submit" name="submit" class="btn btn-primary bx-pull-right mt-2" value="Submit">
									</div>
								</div>
							</div>
							<div class="col-md-3"></div>
						</div>
					</form>
				</div>
			</div>


			<!--  php insert code-->>

			<?php

				if (isset($_POST['submit'])) {
					
					$company_name = $_POST['company_name'];
					$company_address = $_POST['company_address'];
					$company_phone = $_POST['company_phone'];
					$company_email = $_POST['company_email'];
					$dir='uploads/';
					$path=$dir.basename($_FILES['company_logo']['name']);
					$temp=$_FILES['company_logo']['tmp_name'];
					
					if(move_uploaded_file($temp,$path)){


					}

					$sql = "INSERT INTO company ( Name, Address, phone, email, logo) VALUES ('$company_name','$company_address','$company_phone', '$company_email', '$path')";
					$query = mysqli_query($conn, $sql);

					if ($query){
						echo 'Your company details added successfully';
					}else{
						
						echo 'Your company details is not added.';
						
					}
				}

			?>



		</main>
		<!--end page main-->

		<!--start overlay-->
		<div class="overlay nav-toggle-icon"></div>
		<!--end overlay-->

		<!--Start Back To Top Button-->
		<a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
		<!--End Back To Top Button-->

	</div>
	<!--end wrapper-->


	<!-- Bootstrap bundle JS -->
	<script src="assets/js/bootstrap.bundle.min.js"></script>
	<!--plugins-->
	<script src="assets/js/jquery.min.js"></script>
	<script src="assets/plugins/simplebar/js/simplebar.min.js"></script>
	<script src="assets/plugins/metismenu/js/metisMenu.min.js"></script>
	<script src="assets/plugins/easyPieChart/jquery.easypiechart.js"></script>
	<script src="assets/plugins/peity/jquery.peity.min.js"></script>
	<script src="assets/plugins/perfect-scrollbar/js/perfect-scrollbar.js"></script>
	<script src="assets/js/pace.min.js"></script>
	<script src="assets/plugins/vectormap/jquery-jvectormap-2.0.2.min.js"></script>
	<script src="assets/plugins/vectormap/jquery-jvectormap-world-mill-en.js"></script>
	<script src="assets/plugins/apexcharts-bundle/js/apexcharts.min.js"></script>
	<script src="assets/plugins/datatable/js/jquery.dataTables.min.js"></script>
	<script src="assets/plugins/datatable/js/dataTables.bootstrap5.min.js"></script>
	<!--app-->
	<script src="assets/js/app.js"></script>
	<script src="assets/js/index.js"></script>

	<script>
	
		new PerfectScrollbar(".best-product")
		new PerfectScrollbar(".top-sellers-list")
		
	</script>

</body>

</html>

