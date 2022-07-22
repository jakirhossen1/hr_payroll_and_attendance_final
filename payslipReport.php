<?php include("Topbar.php");?>

            <div class="modal-content">
                <div class="forms-body">
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-md-12">
							
                                <h3 style="margin:10px;">PaySlip Report</h3>
								
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
                                	<option value="Selected">Select any Status</option>
                                    <option value="All">All</option>
                                    <option value="Paid">Paid</option>
                                    <option value="Pending">Pending</option>
                                    <option value="declined">Declined</option>
                                </select>
                            </div>
							
                            <div class="col-md-3">
							
                                <input class="form-control" type="date" name="startdate" id="" placeholder="Start date">
								
                            </div>
							
                            <div class="col-md-3">

                                <input class="form-control" type="date" name="enddate" id="" placeholder="End date">

                            </div>
							
                            <div class="col-md-1">
							
                                <input class="btn btn-primary bx-pull-right" type="submit" name="report" id="" value="Show">
								
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
								if (isset($_POST['report']))
								{
									$emp = $_POST['select_employee'];
									$start = $_POST['startdate'];
									$end = $_POST['enddate'];
									@$status=$_POST['statusp'];
									$days = date_diff(date_create($start) , date_create($end));
									
									if($emp == 'AllEmp' && $status =='Paid'||$emp == 'AllEmp' && $status =='Pending'||$emp == 'AllEmp' && $status =='declined'){
										echo '<caption><center><h3> '.$status. ' Payslip Report</h3></center></caption>';
										echo "<hr>";
										echo '<table class="table table-bordered">
												<tr>
													<th>Name</th>
													<th>Year</th>
													<th>Month</th>
													<th>Salary Date</th>
													<th>Status</th>
												</tr>';
										$sqll = "Select * from payroll Where salary_Status='$status' &&  salary_date Between '$start' AND '$end'";
										$qurr = mysqli_query($conn, $sqll);
										
										while ($row = mysqli_fetch_array($qurr)){ 

							?>
                            <tr>
                                <td><?php echo $row['employee_id']; ?></td>
                                <td><?php echo $row['Salary_Year']; ?></td>
                                <td><?php echo $row['salary_Month']; ?></td>
                                <td><?php echo $row['salary_Date']; ?></td>
                                <td><?php echo $row['salary_Status']; ?></td>
                            </tr>
							<button class="btn btn-primary bx-pull-right m-3" onclick=attenPrint()>Print Report</button>
                            <?php 	
										return false; 
									}
								}
							?>
                           
                            <?php echo "</table>";?>
                           
    
							 <?php
								
								if ($emp == 'AllEmp' && $status =='All' ){
									echo '<caption><center><h3> '.$emp. ' Payslip Report</h3></center></caption>';
									echo "<hr>";
									echo '<table class="table table-bordered">
											<tr>
												<th>Name</th>
												<th>Year</th>
												<th>Month</th>
												<th>Salary Date</th>
												<th>Status</th>
											</tr>';
									$sqll = "Select * from payroll Where  salary_date Between '$start' AND '$end'";
									$qurr = mysqli_query($conn, $sqll);
									while ($row = mysqli_fetch_array($qurr)){

							?>
                            <tr>
                                <td><?php echo $row['employee_id']; ?></td>
                                <td><?php echo $row['Salary_Year']; ?></td>
                                <td><?php echo $row['salary_Month']; ?></td>
                                <td><?php echo $row['salary_Date']; ?></td>
                                <td><?php echo $row['salary_Status']; ?></td>
                            </tr>

                            <?php } ?>
                            <?php echo "</table>";?>
							
                            <?php
							
								}else{
									echo '<caption><center><h3> '.$emp. ' Payslip Report</h3></center></caption>';
									echo "<hr>";
									echo '<table class="table table-bordered">
											<tr>
												<th>Name</th>
												<th>Year</th>
												<th>Month</th>
												<th>Salary Date</th>
												<th>Status</th>
											</tr>';
									$sqll = "Select * from payroll Where employee_id='$emp' && salary_date Between '$start' AND '$end'";
									$qurr = mysqli_query($conn, $sqll);
									
									while ($row = mysqli_fetch_array($qurr)){

							?>
                            <tr>
                                <td><?php echo $row['employee_id']; ?></td>
                                <td><?php echo $row['Salary_Year']; ?></td>
                                <td><?php echo $row['salary_Month']; ?></td>
                                <td><?php echo $row['salary_Date']; ?></td>
                                <td><?php echo $row['salary_Status']; ?></td>
                            </tr>

                            <?php } ?>
                            <?php echo "</table>";?>

                            <?php
							
									}
								} 
								
							?>
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
				function attenPrint() {
					
					var body = document.getElementById('body').innerHTML;
					var printArea = document.getElementById('printArea').innerHTML;
					document.getElementById('body').innerHTML = printArea;
					window.print(printArea);
					document.getElementById('body').innerHTML = body;

				}

			</script>
			
			<script>
			
				$(document).ready(function(){
					
					$('#hiddenDiv').hide();
					$('#emptype').change(function(){
						
						var emptype = $('#emptype').val();
						
						if (emptype == 'AllEmp'){
							
							$('#hiddenDiv').show();
							
						} else {
							
							$('#hiddenDiv').hide();
							
						}
					});


				});

			</script>
	
<?php include("Footer.php");?>
