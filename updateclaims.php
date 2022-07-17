<?php include("Topbar.php");?>

			<div class="modal-content">
				<div class="forms-body">
					<?php 

					$Id=$_GET['id'];
					$sql="SELECT * FROM  claims WHERE claims_id='$Id'";
					$query= mysqli_query($conn, $sql);

					$num= mysqli_fetch_array($query)


					?>   
					<form action="updateclaimsdetails.php" method="post" enctype="multipart/form-data">
						<div class="row">
							<div class="col-md-12">
								<h3 style="margin:10px;">Update Claims</h3>
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
									<input class="form-control mt-1 mb-1" type="text" name="claims_date" id="claims_date" value="<?php echo $num['claims_date'];?>"readonly ></br>
								</div>
								
								<div class="form-group">
									<input class="form-control mt-1 mb-1" type="text" name="type_of_expense" id="type_of_expense" value="<?php echo $num['type_of_expense'];?>" readonly></br>
								</div>
								
								<div class="form-group">
									<input class="form-control mt-1 mb-1" type="text" name="total_amount" id="total_amount" value="<?php echo $num['total_amount'];?>" readonly></br>
								</div>
								
								<div class="form-group">
									<input class="form-control mt-1 mb-1" type="file" name="documents" id="documents" value="<?php echo $num['documents'];?>" readonly></br>
								</div>

								<div class="form-group">
									<?php 
									
										if($num['claims_status'] == "Pending"):
										
									?>
									<select class="form-select mt-3" name="claims_status" >
										<option value="Pending" <?php echo ($num['claims_status'] == "Pending" ? "selected" : "");?>>Pending</option>

											<?php 
											
												if($_SESSION['role']['role_name'] == "Admin"): 
												
											?>
										<option value="Paid" <?php echo ($num['claims_status'] == "Paid" ? "selected" : "") ;?>>Paid</option>
										<option value="declined" <?php echo ($num['claims_status'] == "declined" ? "selected" : "");?>>Declined</option>
											<?php endif ?>
									</select>
									<?php else: ?>
									<select class="form-select mt-3" name="claims_status" >
										<option ><?php echo ucfirst($num['claims_status'])?></option>
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

