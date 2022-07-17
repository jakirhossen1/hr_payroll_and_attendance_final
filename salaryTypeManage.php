<?php include("Topbar.php");?>

			<div class="modal-content">
				<div class="forms-body">
					<div class="row">
						<div class="col-md-12">
						
							<h3 style="margin:10px;">Manage Salary Type</h3>
							
						</div>
					</div>
					<hr>

					<div class="row">
						<div class="col-md-12 col-sm-12">
							<a href="addSalaryType.php" class="btn btn-primary bx-pull-right mb-3">Add Salary Type</a>
							<table class="table table-striped" >
								<tr>
									<th>SL</th>
									<th>Salary Type</th>
									<th>Action</th>
								</tr>
								<?php 
								
									include("connect.php");
									
									$n=1;
									$sql="SELECT * FROM salary_type";
									$qurey=mysqli_query($conn,$sql);
									
									while($row= mysqli_fetch_array($qurey)){
										
								?>
								
								<tr>
									<td><?php echo $n++?></td>
									<td><?php echo $row[1]?></td>
									<td>
										<a class="btn btn-danger" href="salarymanagedelete.php?aid=<?php echo $row[0]?>">Delete</a>
										<a class="btn btn-success" href="addsalaryupdate.php?aid=<?php echo $row[0]?>">Update</a>
									</td>
								</tr>
								<?php }?>
							</table>
						</div>
					</div>
				</div>
			</div>
			
<?php include("Footer.php");?>