<?php

    echo include("connect.php");

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
					<div class="row">
						<div class="col-md-12">
						
							<h3 style="margin:10px;">Pay Slip Manage</h3>
							
						</div>
					</div>
					<hr>

					<div class="">
						<div class="row">
						
							<div class="col-offset-md-2"><a href="createPaySlip.php" class="btn btn-primary bx-pull-right mb-3">Create PaySlip</a></div>

						</div>
						
						<div class="row">
							<div class="col-md-12 col-sm-12">                
								<ul class="nav nav-tabs" id="myTab" role="tablist">
									<li class="nav-item" role="presentation">
									
										<button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Pending</button>
									
									</li>
									
									<li class="nav-item" role="presentation">
									
										<button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Approved</button>
									
									</li>
									
									<li class="nav-item" role="presentation">
									
										<button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#declined" type="button" role="tab" aria-controls="profile" aria-selected="false">Declined</button>
									
									</li>
								</ul>
								
								<div class="tab-content" id="myTabContent">
									<div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
										<table class="table table-bordered">
											<tr>
												<th>SL</th>
												<th>Employee Name</th>
												<th>Salary Year</th>
												<th>Salary Month</th>
												<th>Salary Satus</th>
												<th>Action</th>
											</tr>
											<?php
											
												echo include("connect.php");
												$n=1;
												$sql=" SELECT * FROM payroll where salary_Status = 'pending' ";
												$querry= mysqli_query($conn, $sql);
												while ($row= mysqli_fetch_array($querry)){
													
											?>
											<tr>
												<td><?php echo $n++ ?></td>
												<td><?php echo $row['employee_id'] ?></td>

												<td><?php echo $row['Salary_Year'] ?></td>


												<td> <?php echo $row['salary_Month'] ?></td>
												<td>
													<?php
													
														$status = "<span class=' btn-primary'> Pending </span>";
														
														if($row['salary_Status'] == "Paid") {
															
															$status = "<span class=' btn-success'> Paid </span>";
														
														}else if($row['salary_Status'] == "declined") {
															
															$status = "<span class=' btn-danger'> Declined </span>";
														
														}

														echo $status;
													?>
												</td>
												<td>
													<?php if($_SESSION['role']['role_name'] == "Admin"): ?>
													<a class="btn btn-danger" href="deletepayslip.php?aid=<?php echo $row[0];?>">Delete</a>
													<a class="btn btn-success" href="updatepayslip.php?id=<?php echo $row[0];?>">Update</a>

													<?php endif ?>
												</td>
											</tr>
											<?php }
											
												$num = mysqli_num_rows($querry);
												if(! $num):
												
											?>

											<tr>
											
												<td colspan="8"><center>Data not found</center></td>
												
											</tr>

											<?php endif ?>
										</table>
									</div>
									
									
									<div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
										<table class="table table-bordered">
											<tr>
												<th>SL</th>
												<th>Employee Name</th>
												<th>Salary Year</th>
												<th>Salary Month</th>
												<th>Salary Satus</th>
												<th>Action</th>
											</tr>
											<?php
											
												echo include("connect.php");
											
												$n=1;
												$sql =" SELECT * FROM payroll where salary_Status = 'Paid' ";
												$querry= mysqli_query($conn, $sql);
												
												while ($row= mysqli_fetch_array($querry)){
													
											?>
											<tr>
												<td><?php echo $n++ ?></td>
												<td><?php echo $row['employee_id'] ?></td>
												<td><?php echo $row['Salary_Year'] ?></td>
												<td> <?php echo $row['salary_Month'] ?></td>
												<td>
													<?php
														$status = "<span class=' btn-primary'> Pending </span>";
														
														if($row['salary_Status'] == "Paid"){
															
															$status = "<span class=' btn-success'> Paid </span>";
														
														}else if($row['salary_Status'] == "declined"){
															
															$status = "<span class=' btn-danger'> Declined </span>";
														
														}
														echo $status;
													?>
												</td>
												<td>
													<?php 
													
														if($_SESSION['role']['role_name'] == "Admin"): 
														if($row['salary_Status'] != "Paid"):
														
													?>

													<a class="btn btn-danger" href="deletepayslip.php?aid=<?php echo $row[0];?>">Delete</a>

													<?php endif?>
													<a class="btn btn-success" href="updatepayslip.php?id=<?php echo $row[0];?>">Update</a>

													<?php endif ?>
												</td>
											</tr>
											<?php }
											
												$num = mysqli_num_rows($querry);
												if(! $num):
												
											?>

											<tr>
											
												<td colspan="8"><center>Data not found</center></td>
												
											</tr>

											<?php endif ?>
										</table>
									</div>
									
									
									<div class="tab-pane fade" id="declined" role="tabpanel" aria-labelledby="profile-tab">
										<table class="table table-bordered">
											<tr>
												<th>SL</th>
												<th>Employee Name</th>
												<th>Salary Year</th>
												<th>Salary Month</th>
												<th>Salary Satus</th>
												<th>Action</th>
											</tr>
											<?php
											
												echo include("connect.php");
												
												$n=1;
												$sql =" SELECT * FROM payroll where salary_Status = 'declined' ";
												$querry= mysqli_query($conn, $sql);
												
												while ($row= mysqli_fetch_array($querry)){
													
											?>
											<tr>
											<td><?php echo $n++ ?></td>
											<td><?php echo $row['employee_id'] ?></td>

											<td><?php echo $row['Salary_Year'] ?></td>


											<td> <?php echo $row['salary_Month'] ?></td>
											<td>
												<?php
												
													$status = "<span class=' btn-primary'> Pending </span>";
													
													if($row['salary_Status'] == "Paid") {
														
														$status = "<span class=' btn-success'> Paid </span>";
													
													}else if($row['salary_Status'] == "declined") {
														
														$status = "<span class=' btn-danger'> Declined </span>";
													
													}
													echo $status;
												?>
											</td>
											<td>
												<?php 
												
													if($_SESSION['role']['role_name'] == "Admin"): 
													if($row['salary_Status'] != "Paid"):
													
												?>

												<a class="btn btn-danger" href="deletepayslip.php?aid=<?php echo $row[0]; ?>">Delete</a>

												<?php endif?>
												<a class="btn btn-success" href="updatepayslip.php?id=<?php echo $row[0];?>">Update</a>

												<?php endif ?>
											</td>
											</tr>
											<?php }
											
												$num = mysqli_num_rows($querry);
												if(! $num):
												
											?>

											<tr>
											
												<td colspan="8"><center>Data not found</center></td>
											
											</tr>

											<?php endif ?>
										</table>
									</div>
								</div>   
							</div>
						</div>
					</div>        
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