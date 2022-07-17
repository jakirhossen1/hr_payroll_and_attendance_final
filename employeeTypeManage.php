<?php include("Topbar.php");?>

			<div class="modal-content">
				<div class="forms-body">
					<div class="row">
						<div class="col-md-12">
						
							<h3 style="margin:10px;">Manage Employee Type</h3>
							
						</div>
					</div>
					<hr>
					<div class="row">
						<div class="col-md-12 col-sm-12">
							<a href="AddEmployeeType.php" class="btn btn-primary bx-pull-right mb-3">Add Employee Type</a>
							<table class="table table-striped">
								<tr>
									<th>SL</th>
									<th>Employee Type</th>
									<th>Action</th>
								</tr>
								<?php 
							  
									include 'connect.php';
									$n=1;
									$sql = "SELECT * FROM employee_type";
									$query=mysqli_query($conn,$sql);
								  
									while($row=mysqli_fetch_array($query)){
									  
								?>
								<tr>
									<td><?php echo $n++?></td>
									<td><?php echo $row[1]?></td>
									<td>
									  <a class="btn btn-danger" href="emptypemanagedelete.php?aid=<?php echo $row[0]?>">Delete</a>
									  <a class="btn btn-success" href="mngemptypeupdate.php?aid=<?php echo $row[0]?>">Update</a>
									</td>
								</tr>
								<?php } ?>
							</table>
						</div>
					</div>
				</div>
			</div>
            
<?php include("Footer.php");?>