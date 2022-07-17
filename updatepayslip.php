<?php include("Topbar.php");?>

			<div class="modal-content">
				<div class="forms-body">
					<?php 

						$Id=$_GET['id'];
						$sql="SELECT * FROM  payroll WHERE payroll_id='$Id'";
						$query= mysqli_query($conn, $sql);

						$num= mysqli_fetch_array($query)


					?>   
					<form action="updatepayslipdetails.php" method="post" enctype="multipart/form-data">
						<div class="row">
							<div class="col-md-12">
								<h3 style="margin:10px;">Update PaySlip</h3>
							</div>
						</div>
						<hr>
						
						<div class="row">
							<div class="col-md-3"></div>
							<div class="col-md-6">
								<div class="form-group">
									<input type="hidden" name="Id" value="<?php echo $num['0'];?>">
									<input class="form-control mt-1 mb-1" type="text" name="employee_id" id="employee_id" value="<?php echo $num['employee_id'];?>" readonly ></br>
								</div>
								
								<div class="form-group">
									<input class="form-control mt-1 mb-1" type="text" name="Salary_Year" id="Salary_Year" value="<?php echo $num['Salary_Year'];?>"readonly ></br>
								</div>
								
								<div class="form-group">
									<input class="form-control mt-1 mb-1" type="text" name="salary_Month" id="salary_Month" value="<?php echo $num['salary_Month'];?>" readonly></br>
								</div>

								<div class="form-group">
									<?php 
									
										if($num['salary_Status'] == "Pending"):
									?>
									
									<select class="form-select mt-3" name="salary_Status" >
										<option value="Pending" <?php echo ($num['salary_Status'] == "Pending" ? "selected" : "");?>>Pending</option>
											<?php 
											
												if($_SESSION['role']['role_name'] == "Admin"): 
												
											?>
										<option value="Paid" <?php echo ($num['salary_Status'] == "Paid" ? "selected" : "") ;?>>Paid</option>
										<option value="declined" <?php echo ($num['salary_Status'] == "declined" ? "selected" : "");?>>Declined</option>
											<?php endif ?>
									</select>
									<?php else: ?>
									
									<select class="form-select mt-3" name="salary_Status" >
										<option ><?php echo ucfirst($num['salary_Status'])?></option>
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

<?php include("Footer.php");?>

