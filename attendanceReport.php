<?php include("Topbar.php");?>

            <div class="modal-content">
                <div class="forms-body">
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-12">
							
                                <h3 style="margin:10px;">Attendance Report</h3>
								
                            </div>
                        </div>
                        <hr>
                        
                        <div class="row">
                            <div class="col-md-3">
                                <?php
								
									$sql = "SELECT employee_name FROM employee";
									$query = mysqli_query($conn, $sql);
									$rowcount = mysqli_num_rows($query);
									
								?>
                                <select class="form-select" name="select_employee" id="emptype">
                                    <option value="">Select Employee</option>
                                    <option value="AllEmp"> All Employee</option>

                                    <?php
										for ($i = 1;$i <= $rowcount;$i++){
											
											$row = mysqli_fetch_array($query);
											
									?>
                                    <option value="<?php echo $row['employee_name']; ?>"><?php echo $row['employee_name']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
							
                            <div class="col-md-2" id="hiddenDiv">
                                <select class="form-select" name="statusp" id="">
									<option value="selected"> Select your status </option>
									<option value="AllStatus"> All </option>
                                    <option value="Present">Present</option>
                                    <option value="Absent">Absent</option>
                                    <option value="On Leave">Leave</option>
                                </select>
                            </div>
							
                            <div class="col-md-3">
							
                                <input class="form-control" type="date" name="startdate" id="" placeholder="Start date">
								
                            </div>
							
                            <div class="col-md-3">

                                <input class="form-control" type="date" name="enddate" id="" placeholder="End date">

                            </div>
							
                            <div class="col-md-1">
							
                                <input class="btn btn-primary bx-pull-right" type="submit" name="report" id="" value="show">
								
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <hr>

            <div class="modal-content">
                <div class="forms-body" id="printArea">
                    <div class="row">
                        <div class="col-md-12">
                            

                                <?php
								
									if (isset($_POST['report'])){
										
										$emp = $_POST['select_employee'];
										$start = $_POST['startdate'];
										$end = $_POST['enddate'];
										@$status=$_POST['statusp'];
										$days = date_diff(date_create($start) , date_create($end));
										
										if ($emp == 'AllEmp'){
											
											echo '<caption><center><h3>All Employee Attendance Report</h3></center></caption>';
											echo "<hr>";
											?>
											<table class="table table-bordered">
												<tr>
													<th>Name</th>
													<th>Date</th>
													<th>Days</th>
													<?php if($status == 'AllStatus'):?>
														<th>Present</th>
														<th>Absent</th>
														<th>Leave</th>
													<?php else: ?>
														<th><?=$status;?></th>
													<?php endif;?>
												</tr>
											<?php
											if($status == 'AllStatus') {
												$sqlls = "Select `employee_id`,
												(select count(ca.attendaneStatus) from attendance as ca where ca.attendaneStatus = 'Present' and ca.attendancedate Between '$start' AND  '$end' and ma.employee_id = ca.employee_id) as Present,
												(select count(ca.attendaneStatus) from attendance as ca where ca.attendaneStatus = 'Absent' and ca.attendancedate Between '$start' AND  '$end' and ma.employee_id = ca.employee_id) as Absent,
												(select count(ca.attendaneStatus) from attendance as ca where ca.attendaneStatus = 'On Leave' and ca.attendancedate Between '$start' AND  '$end' and ma.employee_id = ca.employee_id) as `Leave`
												from attendance as ma WHERE attendancedate Between '$start' AND  '$end' GROUP BY employee_id";
											} else {
												$sqlls = "Select `employee_id`,COUNT(attendaneStatus)as Absent from attendance WHERE attendaneStatus='$status' && attendancedate Between '$start' AND  '$end' GROUP BY employee_id";
											}

											$qurrs = mysqli_query($conn, $sqlls);
											while($rows = mysqli_fetch_array($qurrs)){ 
											

									?>
									<tr>
										<td><?php echo $rows['employee_id']; ?></td>
	                                    <td><?php echo $start . " " . "<strong>To</strong>" . " " . $end; ?></td>
	                                    <td><?php echo $days->format("%a"); ?></td>
	                                    <?php if($status == 'AllStatus'):?>
	                                    	<td><?php echo $rows['Present']; ?></td>
	                                    	<td><?php echo $rows['Absent']; ?></td>
	                                    	<td><?php echo $rows['Leave']; ?></td>
	                                	<?php else: ?>
											<td><?php echo $rows['Absent']; ?></td>
										<?php endif;?>
									</tr>
										<?php
										}  ?>
								<?php echo " </table>"?>
									
											
                                <?php
								
									}else{
										echo '<caption><center><h3> '.$emp.' Attendance Report</h3></center></caption>';
										echo "<hr>";
										?>
										<table class="table table-bordered">
											<tr>
												<th>Name</th>
												<th>Date</th>
												<?php if($status == 'AllStatus'):?>
													<th>Present</th>
													<th>Absent</th>
													<th>Leave</th>
												<?php else: ?>
													<th><?=$status;?></th>
												<?php endif;?>
											</tr>
											<?php
										$sqll = "Select * from attendance Where employee_id='$emp' && attendancedate Between '$start' AND '$end'";
										$qurr = mysqli_query($conn, $sqll);
										$row = mysqli_fetch_array($qurr);
										
										$sqlls = "Select `employee_id`,COUNT(attendaneStatus)as Present from attendance WHERE employee_id='$emp' && attendaneStatus='Present' && attendancedate Between '$start' AND  '$end'";
										$qurrs = mysqli_query($conn, $sqlls);
										$rows = mysqli_fetch_array($qurrs);
										
										$sqllss = "Select `employee_id`, COUNT(attendaneStatus)as Abst from attendance WHERE employee_id='$emp' && attendaneStatus='Absent' && attendancedate Between '$start' AND  '$end'";
										$qurrss = mysqli_query($conn, $sqllss);
										$rowss = mysqli_fetch_array($qurrss);
										
										$sqllsss = "Select `employee_id`, COUNT(attendaneStatus)as lev from attendance WHERE employee_id='$emp' && attendaneStatus='On Leave' && attendancedate Between '$start' AND '$end'";
										$qurrsss = mysqli_query($conn, $sqllsss);
										$rowsss = mysqli_fetch_array($qurrsss);
											

								?>
                                <tr>
                                    <td><?php echo $rows['employee_id']; ?></td>
                                    <td><?php echo $start . " " . "<strong>To</strong>" . " " . $end; ?></td>
                                    <?php if($status == 'AllStatus'):?>
	                                    <td><?php echo $rows['Present']; ?></td>
										<td><?php echo $rowss['Abst']; ?></td>
										<td><?php echo $rowsss['lev']; ?></td>
									<?php else: ?>
										<td><?php
											if ($status == 'Present') {
												echo $rows['Present'];
											} elseif ($status == 'Absent') {
												echo $rowss['Abst'];
											} elseif ($status == 'On Leave') {
												echo $rowsss['lev'];
											}
										?></td>
									<?php endif ?>
                                </tr>
                           
                                <?php } ?>
								<?php echo "</table>";?>
								
				
        
								<?php } ?>
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-12">
						<?php 
							if (isset($_POST['report'])){
								
								echo  '<button class="btn btn-primary bx-pull-right m-3" onclick=attenPrint()>Print Report</button>' ;
							}
                        ?>
                        
                    </div>
                </div>
            </div>


			<script>
			
				function attenPrint(){
					
					var body=document.getElementById('body').innerHTML;
					var printArea=document.getElementById('printArea').innerHTML;
					document.getElementById('body').innerHTML=printArea;
					window.print(printArea);
					document.getElementById('body').innerHTML=body;
					
				}
				
			</script>
			
			<script>
			
				$(document).ready(function(){
					$('#hiddenDiv').hide();
					$('#emptype').change(function(){
						var emptype=$('#emptype').val();
						
						if(emptype=='AllEmp'){
							
							$('#hiddenDiv').show();
							
						}else{
							
							$('#hiddenDiv').hide();
						   
						}
					});
				   
				   
				});
			</script>

<?php include("Footer.php");?>