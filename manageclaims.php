<?php include("Topbar.php");?>

			<div class="modal-content">
				<div class="forms-body">

					<div class="row">
						<div class="col-md-12">
							<h3 style="margin:10px;">Claims Manage</h3>
						</div>
					</div>
					<hr>

					<div class="">
						<div class="row">
							<div class="col-offset-md-2"><a href="claims.php" class="btn btn-primary bx-pull-right mb-3">Apply Claims</a></div>
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
												<th>Date</th>
												<th>Claims Type</th>
												<th>Amount</th>
												<th>Claims Document</th>
												<th>Claims Status</th>
												<th>Action</th>
											</tr>
											<?php
											
												require "connect.php";
												$n=1;
												$sql=" SELECT * FROM claims where claims_status = 'pending' ";
												$querry= mysqli_query($conn, $sql);
												while ($row= mysqli_fetch_array($querry)){
													
											?>
											<tr>
												<td><?php echo $n++ ?></td>
												<td><?php echo $row['employee_id'] ?></td>
												<td><?php echo $row['claims_date'] ?></td>
												<td> <?php echo $row['type_of_expense'] ?></td>
												<td> <?php echo $row['total_amount'] ?></td>
												<td><img src="<?php echo $row['documents'];?>"  width="50" height="50" alt="Image is not found!"> </td>
												<td>
													<?php
														$status = "<span class=' btn-primary'> Pending </span>";
														
														if($row['claims_status'] == "Paid") {
															
															$status = "<span class=' btn-success'> Paid </span>";
															
														}else if($row['claims_status'] == "declined"){
															
															$status = "<span class=' btn-danger'> Declined </span>";
															
														}
														echo $status;
													?>
												</td>
												<td>
													<?php 
													
														if($_SESSION['role']['role_name'] == "Admin"): 
														
													?>
													<a class="btn btn-danger" href="claimsdelete.php?aid=<?php echo $row[0];?>">Delete</a>
													<a class="btn btn-success" href="updateclaims.php?id=<?php echo $row[0];?>">Update</a>

													<?php endif ?>
												</td>
											</tr>
											<?php 
											
												}
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
												<th>Date</th>
												<th>Claims Type</th>
												<th>Amount</th>
												<th>Claims Document</th>
												<th>Claims Status</th>
												<th>Action</th>
											</tr>
											<?php
											
												require "connect.php";
												
												$n=1;
												$sql =" SELECT * FROM claims where claims_status = 'Paid' ";
												$querry= mysqli_query($conn, $sql);
												
												while ($row= mysqli_fetch_array($querry)){
													
											?>
											<tr>
												<td><?php echo $n++ ?></td>
												<td><?php echo $row['employee_id'] ?></td>
												<td><?php echo $row['claims_date'] ?></td>
												<td> <?php echo $row['type_of_expense'] ?></td>
												<td> <?php echo $row['total_amount'] ?></td>
												<td><img src="<?php echo $row['documents'];?>"  width="50" height="50" alt="Image is not found!"> </td>
												<td>
													<?php
													
														$status = "<span class=' btn-primary'> Pending </span>";
														
														if($row['claims_status'] == "Paid"){
															
															$status = "<span class=' btn-success'> Paid </span>";
														
														}else if($row['claims_status'] == "declined"){
															
															$status = "<span class=' btn-danger'> Declined </span>";
														
														}
														echo $status;
													?>
												</td>
												<td>
													<?php 
													
														if($_SESSION['role']['role_name'] == "Admin"): 
														if($row['claims_status'] != "Paid"):
														
													?>

													<a class="btn btn-danger" href="claimsdelete.php?aid=<?php echo $row[0];?>">Delete</a>
													<?php endif?>
													<a class="btn btn-success" href="updateclaims.php?id=<?php echo $row[0];?>">Update</a>
													<?php endif ?>
												</td>
											</tr>
											<?php 
											
												}
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
												<th>Date</th>
												<th>Claims Type</th>
												<th>Amount</th>
												<th>Claims Document</th>
												<th>Claims Status</th>
												<th>Action</th>
											</tr>
											<?php
											
												require "connect.php";
												
												$n=1;
												$sql =" SELECT * FROM claims where claims_status = 'declined' ";
												$querry= mysqli_query($conn, $sql);
												
												while ($row= mysqli_fetch_array($querry)){
													
											?>
											<tr>
												<td><?php echo $n++ ?></td>
												<td><?php echo $row['employee_id'] ?></td>
												<td><?php echo $row['claims_date'] ?></td>
												<td> <?php echo $row['type_of_expense'] ?></td>
												<td> <?php echo $row['total_amount'] ?></td>
												<td><img src="<?php echo $row['documents'];?>"  width="50" height="50" alt="Image is not found!"> </td>
												<td>
												<?php
												
													$status = "<span class=' btn-primary'> Pending </span>";
													
													if($row['claims_status'] == "Paid"){
														
														$status = "<span class=' btn-success'> Paid </span>";
													
													}else if($row['claims_status'] == "declined"){
														
														$status = "<span class=' btn-danger'> Declined </span>";
													
													}

													echo $status;
												
												?>
												</td>
												<td>
												<?php 
												
													if($_SESSION['role']['role_name'] == "Admin"): 
													if($row['claims_status'] != "Paid"):
													
												?>

												<a class="btn btn-danger" href="claimsdelete.php?aid=<?php echo $row[0]; ?>">Delete</a>
												<?php endif?>
												<a class="btn btn-success" href="updateclaims.php?id=<?php echo $row[0];?>">Update</a>
												<?php endif ?>
												</td>
											</tr>
											<?php 
											
												}
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
            
<?php include("Footer.php");?>