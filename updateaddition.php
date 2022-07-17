<?php include("Topbar.php");?>

			<div class="modal-content">
				<div class="forms-body">
					<?php 

						$Id=$_GET['id'];
						$sql="SELECT * FROM addition WHERE addition_id='$Id'";
						$query= mysqli_query($conn, $sql);

						$num= mysqli_fetch_array($query)


					?>   
					<form action="updateadditiondetails.php" method="post" enctype="multipart/form-data">
						<div class="row">
							<div class="col-md-12">
							
								<h3 style="margin:10px;">Update Addition</h3>
								
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
								
									<input class="form-control mt-1 mb-1" type="text" name="addition_code" id="addition_code" value="<?php echo $num['addition_code'];?>"readonly ></br>

								</div>
								
								
								<div class="form-group">
								
									<input class="form-control mt-1 mb-1" type="text" name="description" id="description" value="<?php echo $num['description'];?>" readonly></br>
									
								</div>
								
								
								<div class="form-group">
								
									<input class="form-control mt-1 mb-1" type="text" name="amount" id="amount" value="<?php echo $num['amount'];?>" readonly></br>
									
								</div>
								
								
								<div class="form-group">
								
									<input class="form-control mt-1 mb-1" type="text" name="month" id="month" value="<?php echo $num['month'];?>" readonly></br>
									
								</div>
								
								
								<div class="form-group">
								
									<input class="form-control mt-1 mb-1" type="text" name="addition_year" id="addition_year" value="<?php echo $num['addition_year'];?>" readonly></br>
									
								</div>

								<div class="form-group">

									<?php 
										if($num['addition_status'] == "Pending"):
									?>
									<select class="form-select mt-3" name="addition_status" >
										<option value="Pending" <?php echo ($num['addition_status'] == "Pending" ? "selected" : "");?>>Pending</option>

											<?php 
												if($_SESSION['role']['role_name'] == "Admin"): 
											?>
										<option value="Approved" <?php echo ($num['addition_status'] == "Approved" ? "selected" : "") ;?>>Approved</option>
										<option value="declined" <?php echo ($num['addition_status'] == "declined" ? "selected" : "");?>>Declined</option>
											<?php endif ?>
									</select>
									<?php else: ?>
									<select class="form-select mt-3" name="addition_status" >
										<option ><?php echo ucfirst($num['addition_status'])?></option>
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
