<?php 

	require "connect.php"; 
	
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
					<?php 

					$Id=$_GET['id'];
					$sql="SELECT * FROM leaves WHERE leave_id='$Id'";
					$query= mysqli_query($conn, $sql);

					$num= mysqli_fetch_array($query)


					?>   
					<form action="leavemanageupdatedetails.php" method="post" enctype="multipart/form-data">
						<div class="row">
							<div class="col-md-12">
								<h3 style="margin:10px;">Update Leave</h3>
							</div>
						</div>
						<hr>
						
						<div class="row">
							<div class="col-md-3"></div>
							<div class="col-md-6">
								<div class="form-group">
									<?php

										$sql = "SELECT employee_name FROM employee";
										$query = mysqli_query($conn, $sql);
										$rowcount = mysqli_num_rows($query);
										
									?>
									<select class="form-select" name="select_employee" >
										<option value="<?php echo $num['employee_id'];?>"><?php echo $num['employee_id'];?></option>
											<?php
												for ($i = 1; $i <= $rowcount; $i++){
													
												$row = mysqli_fetch_array($query);
												
											?>
										<option value="<?php echo $row['employee_name']; ?>"><?php echo $row['employee_name']; ?></option>
											<?php } ?>
									</select><br>
								</div>
								
								<div class="form-group">
									<?php

										$sql = "SELECT leave_type FROM leave_type";
										$query = mysqli_query($conn, $sql);
										$rowcount = mysqli_num_rows($query);
										
									?>
									<select class="form-select" name="leave_type" id="">
										<option value="<?php echo $num['leave_type_id'];?>"><?php echo $num['leave_type_id'];?></option>
											<?php
												for ($i = 1; $i <= $rowcount; $i++) {
													
													$row = mysqli_fetch_array($query);
													
											?>
										<option value="<?php echo $row['leave_type']; ?>"><?php echo $row['leave_type']; ?></option>
											<?php } ?>
									</select>
								</div>


								<div class="form-group">
									<input type="hidden" name="Id" value="<?php echo $num['0'];?>">
									Leave Start Date
									<input class="form-control mt-1 mb-1 " name="leave_start_date" type="date" value="<?php echo $num['leave_start_date'];?>">
								</div>
								
								<div class="form-group">
									Leave Ends Date
									<input class="form-control mt-1  " name="leave_ends_date"  type="date" value="<?php echo $num['leave_end_date'];?>">
								</div>
								
								<div class="form-group">
									<input class="form-control mt-3" name="description" value="<?php echo $num['leave_for'];?>"><br>
								</div>

								<div class="form-group">
									<?php

										$sql = "SELECT document_Name FROM employee_document";
										$query = mysqli_query($conn, $sql);
										$rowcount = mysqli_num_rows($query);
										
									?>
									<select class="form-select" name="support_document" id="">
										<option value="<?php echo $num['supported_document'];?>"><?php echo $num['supported_document'];?></option>
											<?php
											
												for ($i = 1; $i <= $rowcount; $i++){
													
													$row = mysqli_fetch_array($query);
													
											?>
										<option value="<?php echo $row['document_Name']; ?>"><?php echo $row['document_Name']; ?></option>
											<?php } ?>
									</select>
								</div>

								<div class="form-group">

									<?php 
									
										if($num['leave_status'] == "pending"):
										
									?>
									<select class="form-select mt-3" name="leave_status" >
										<option value="pending" <?php echo ($num['leave_status'] == "pending" ? "selected" : "");?>>Pending</option>

											<?php 
											
												if($_SESSION['role']['role_name'] == "Admin"): 
												
											?>
										<option value="aproved" <?php echo ($num['leave_status'] == "aproved" ? "selected" : "") ;?>>Aproved</option>
										<option value="declined" <?php echo ($num['leave_status'] == "declined" ? "selected" : "");?>>Declined</option>
											<?php endif ?>
									</select>
									<?php else: ?>
									<select class="form-select mt-3" name="leave_status" >
										<option ><?php echo ucfirst($num['leave_status'])?></option>
									</select>
									<?php endif?>
								</div>
								<div class="form-group">
									<input class="btn btn-primary bx-pull-right mt-3" type="submit" name="update" value="Update">
								</div>
							</div>
							<div class="col-md-3"></div>
						</div>
					</form>
				</div>
			</div>


	
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

