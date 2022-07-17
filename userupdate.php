<?php include("Topbar.php");?>

			<div class="modal-content">
				<div class="forms-body">

					<?php 

						require 'connect.php';

						$Id=$_GET['aid'];
						$sql=" SELECT * FROM user_table WHERE user_id='$Id'";
						$query= mysqli_query($conn, $sql);
						$num= mysqli_fetch_array($query)


					?>
					<form action="userupdatedetails.php " method="post" enctype="multipart/form-data">      
						<div class="row">
							<div class="col-md-12">
								<h3 style="margin:10px;">Update User Profile Details</h3>
							</div>
						</div><hr>

						<div class="row">
							<div class="col-md-3"></div>
							<div class="col-md-6">
								<div class="row">
									<div class="col-md-12">
										<input type="hidden" name="Id" value="<?php echo $num['user_id'];?>">
										<input type="text" name="username" class="form-control mt-3" value="<?php echo $num['user_name'];?>" > <br>
									</div>
								</div>

								<div class="row">
									<div class="col-md-12">
										<?php 

											$sql="SELECT role_name FROM user_role";
											$query=mysqli_query($conn,$sql);
											$rowcount=mysqli_num_rows($query);
											
										?>
										<select class="form-select" name="roleId" >
											<option value="<?php echo $num['role_id'];?>"><?php echo $num['role_id'];?></option>
												<?php 
												
													for($i=1;$i<=$rowcount;$i++){
														
														$row=mysqli_fetch_array($query);
														
												?>
											<option value="<?php echo $row['role_name'];?>"><?php echo $row['role_name'];?></option>
												<?php } ?>
										</select>
									</div>
								</div>

								<div class="row">
									<div class="col-md-12">
										<input type="text" name="fullname" class="form-control mt-3" value="<?php echo $num['full_name'];?>"> 
									</div>
								</div>

								<div class="row">
									<div class="col-md-12">
										<input type="number" name="phone" class="form-control mt-3" value="<?php echo $num['phone'];?>"> 
									</div>
								</div>
								
								<div class="row">
									<div class="col-md-12">
										<input type="email" name="email" class="form-control mt-3" value="<?php echo $num['email'];?>"> 
									</div>
								</div>
								
								<div class="row">
									<div class="col-md-12">
										<input type="password" class="form-control mt-3" name="password" value="<?php echo $num['password'];?>"> 
									</div>
								</div>
								
								<div class="row">
									<div class="col-md-12">
										<input type="date" class="form-control mt-3" name="date" value="<?php echo $num['account_creation_date'];?>"> 
									</div>
								</div>
								
								<div class="row">
									<div class="col-md-12">
										<select name="status" class="form-select mt-3" value="<?php echo $num['status'];?>">
											<option value="<?php echo $num['status'];?>"><?php echo $num['status'];?></option>
											<option value="active" selected>Active</option>
											<option value="inactive">Inactive</option>
										</select>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12">
										<input class="btn btn-primary mt-3 bx-pull-right" type="submit" name="update"  value="Update">
									</div>
								</div>
							</div>
							<div class="col-md-3"></div>
						</div>	
					</form>

				</div>
			</div>

            
<?php include("Footer.php");?>
