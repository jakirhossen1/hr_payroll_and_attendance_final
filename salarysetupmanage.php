<?php include("Topbar.php");?>

			<div class="modal-content">
				<div class="forms-body">
				
					<div class="row">
						<div class="col-md-12">
							<h3 style="margin:10px;">Salary Setup Manage</h3>
						</div>
					</div>
					<hr>

					<div class="row">
						<div class="col-md-12">
							<a href="addSalary.php" class="btn btn-primary bx-pull-right mb-3">Add Salary Setup</a>
							<table class="table table-striped">
								<tr>
									<th>Sl</th>
									<th>Employee Name</th>
									<th>Salary Type</th>
									<th>Basic Salary</th>
									<th>Medical</th>
									<th>House Rent</th>
									<th>Food</th>
									<th>Provident Fund</th>
									<th>Acton</th>
								</tr> 
								<?php
								 
									include 'connect.php';
									
									$n=1;
									$sql = "SELECT * FROM salary_setup";
									$query=mysqli_query($conn,$sql);
									
									while($row=mysqli_fetch_array($query)){
										
								?>
								<tr>
									<td><?php echo $n++ ?></td>
									<td><?php echo $row['employe_Name'];?></td>
									<td><?php echo $row['salary_types'];?></td>
									<td><?php echo $row['basic_salary'];?></td>
									<td><?php echo $row['medical'];?></td>
									<td><?php echo $row['house_rent'];?></td>
									<td><?php echo $row['food'];?></td>
									<td><?php echo $row['provident_fund'];?></td>
									<td>                       
										<a class="btn btn-success" href="salarysetupupdate.php?aid=<?php echo $row[0]?>">Update</a>
									</td>
								</tr>
								<?php }?>
							</table>
						</div>
					</div>
				</div>
			</div>
            
<?php include("Footer.php");?>