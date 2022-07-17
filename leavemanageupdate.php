<?php include("Topbar.php");?>

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

<?php include("Footer.php");?>