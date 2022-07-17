<?php include("Topbar.php");?>
              
			<div class="modal-content">
				<div class="forms-body">
					<div class="row">
						<div class="col-md-12">
						
							<h3 style="margin:10px;">Attendance Schedule Manage</h3>
							
						</div>
					</div>
					<hr>
					
					<div class="row">
						<div class="col-md-12 col-sm-12">
						
							<a href="attendanceSchedule.php" class="btn btn-primary bx-pull-right mb-3">Add Attendance Schedule</a>
							
							<table class="table table-striped table-bordered mydataTable" style="text-align:center;" >
								<tr>
									<th>SL</th>
									<th>Sign_In_Time</th>
									<th>Sign_Out_Time</th>
									<th>Late_Count_Time</th>
									<th>Absent_Time</th>
									<th>Action</th>
								</tr>

								<?php 
								
									$sl=1;
									$sql="SELECT * From attendance_schedule";
									$query=mysqli_query($conn,$sql);
									
									while($row=mysqli_fetch_array($query)){


								?>
								<tr>
									<td><?php echo $sl++;?></td>
									<td><?php echo $row['Signin_in_time_setup'];?></td>
									<td><?php echo $row['Sign_out_time_setup'];?></td> 
									<td><?php echo $row['Late_Count_time'];?></td> 
									<td><?php echo $row['Absent_time'];?></td>
									<td> 
										<a class="btn btn-danger" href="?aid=<?php echo $row['Schedule_id']; ?>">Delete</a>
										<a class="btn btn-success" href="attendancescheduleupdate.php?aid=<?php echo $row['Schedule_id']; ?>">Update</a>
									</td>

								</tr>
								<?php }?>
							
							</table>
						</div>
					</div>
				</div>
			</div>

<?php include("Footer.php");?>

