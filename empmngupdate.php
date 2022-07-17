<?php include("Topbar.php");?>

			<div class="forms-body">
				<?php

					$Id=$_GET['aid'];
					$sql="SELECT * FROM employee WHERE employee_id='$Id';";
					$query= mysqli_query($conn,$sql);
					$num= mysqli_fetch_array($query)


				?>
				<form action="empmngupdatedetails.php" method="post" enctype="multipart/form-data" id="myform">

					<div class="row">
						<div class="col-md-12">
							<h3 style="margin:10px;">Update Employee</h3>
						</div>
					</div>
					<hr>
					
					<div class="row">
						<!-- personal information Start -->
						<div class="col-md-6">
							<div class="modal-content">
								<div class="modal-header">
									<h4 class="modal-title text-info">Personal information</h4>
								</div>

								<div class="modal-body">
									<input type="hidden" name="Id" value="<?php echo $num['0'];?>" >
									<input class="form-control" type="text" name="employee_name" id="employee_name" value="<?php echo $num['employee_name'];?>"  >
									<br>

									<select class="form-select" name="gender" id="gender" >
										<option value="<?php echo $num['gender'];?>"><?php echo $num['gender'];?></option>
										<option value="Male">Male</option>
										<option value="Female">Female</option>
									</select><br>


									<label class="form-control" for="maritial_Status">Marital Status: 
									<select name="maritial_Status" id="maritial_Status" class="form-select"  >
										<option value="<?php echo $num['maritial_Status'];?>"><?php echo $num['maritial_Status'];?></option>
										<option value="married">Married</option>
										<option value="unmarried">Unmarried</option>
									</select> </label>
									<br>

									<label class="form-control" for="date_of_birth">Birth Date: 
									<input autocomplete="off" class="form-control datepickers" type="date" name="date_of_birth" id="date_of_birth" value="<?php echo $num['date_of_birth'];?>"  ></label><br>


									<input class="form-control" type="text" name="religion" id="religion" value="<?php echo $num['religion'];?>"     ><br>

									<input class="form-control" type="text" name="employ_district" id="employ_district" autocomplete="off" value="<?php echo $num['district'];?>"    ><br>

									<input class="form-control coun" type="text" name="Countries" id="Countries" value="<?php echo $num['Countries'];?>"   
									><br>

									<input class="form-control" type="text" name="phone" id="phone" value="<?php echo $num['phone'];?>"   >  <br>

									<input class="form-control" type="text" name="postal_code" id="postal_code" value="<?php echo $num['postal_code'];?>"   ><br>

									<input class="form-control coun" type="text" name="nationality" id="nationality" value="<?php echo $num['nationality'];?>"   ><br>

									<input class="form-control" name="present_address" id="present_address"  value="<?php echo $num['present_address'];?>"   ><br>

									<input class="form-control" name="permanent_address" id="permanent_address"   value="<?php echo $num['permanent_address'];?>"  ><br>

									<input class="form-control" type="text" name="Passport_or_NID" id="Passport_or_NID" value="<?php echo $num['Passport_or_NID'];?>"   > <br>

									<select name="employee_status" id="employee_status" class="form-select"  >
										<option value="<?php echo $num['employee_status'];?>"><?php echo $num['employee_status'];?></option>
										<option value="Active">Active</option>
										<option value="Inactive">Inactive</option>
									</select>
								</div>
							</div>
						</div>
						<!-- personal information End -->


						<div class="col-md-6">
							<div class="modal-content">
								<div class="modal-header">
									<h4 class="modal-title text-info">Company Details</h4>
								</div>
								<div class="modal-body">
									<input class="form-control mt-3" name="employee_type_id" id="employee_type_id" value="<?php echo $num['employee_type_id'];?>"   ><br>

									<input class="form-control mt-3" name="department_id" id="department_id" value="<?php echo $num['department_id'];?>"   ><br>

									<input class="form-control mt-3" name="designation_id" id="designation_id" value="<?php echo $num['designation_id'];?>"   > <br>


									<label for="">Appointment Date:</label>
									<input class="form-control datepickers" type="date" name="appointment_date" id="appointment_date" autocomplete="off" value="<?php echo $num['appointment_date'];?>"   ><br>

									<label for="">Joining Date: </label>
									<input class="form-control datepickers" type="date" name="joining_date" id="joining_date" autocomplete="off" value="<?php echo $num['joining_date'];?>"   ><br>

									<input class="form-control" type="hidden" name="employee_id" id="employee_id" value="<?php echo $num['employee_id'];?>"   >

									<label>Employee Id:</label>
									<input class="form-control" type="text" name="employee_code" id="employee_code" value="<?php echo $num['employee_code'];?>"    readonly><br>
									<label>Created By:</label>

									<input class="form-control" type="text" name="created_by" id="created_by" value="<?php echo $num['created_by'];?>"   readonly ><br>
								</div>
								<div class="modal-footer">
									<input class="btn btn-primary" type="submit" name="update"  value="Update">
								</div>
							</div>
						<!-- Company information End -->
						</div>
					</div>

				</form>
			</div>
			
<?php include("Footer.php");?>