<?php include("Topbar.php");?>

			<div class="modal-content">
				<div class="forms-body">
				
					<div class="row">
						<div class="col-md-12">
						
							<h3 style="margin:10px;">Manage Leave Type</h3>
							
						</div>
					</div>
					<hr>

					<div class="row">
					  <div class="col-md-12">
						<a href="addLeaveType.php" class="btn btn-primary bx-pull-right mb-3">Add Leave Type</a>
						<table class="table table-striped">
							<tr>
								<th>Sl</th>
								<th>Leave Type</th>
								<th>Action</th>
							</tr> 
							 <?php 
							 
								include("connect.php");
								
								$n=1;
								$sql = "SELECT * FROM leave_type";
								$query=mysqli_query($conn,$sql);
								
								while($row=mysqli_fetch_array($query)){
									
								?>
								<tr>
									<td><?php echo $n++ ?></td>
									<td><?php echo $row[1] ?></td>
									<td>
										<a class="btn btn-danger" href="manageleavedelete.php?aid=<?php echo $row[0]?>">Delete</a>
										<a class="btn btn-success" href="addleavetypeupdate.php?aid=<?php echo $row[0]?>">Update</a>
									</td>
								</tr>
								<?php }?> 
							  
						</table>
					  </div>
					</div>
				</div>
			</div>

<?php include("Footer.php");?>