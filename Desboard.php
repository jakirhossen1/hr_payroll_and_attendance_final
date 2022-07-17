<?php include("Topbar.php");?>

            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-2 row-cols-xl-4">
                <?php if ($_SESSION['role_id'] == 1 || $_SESSION['role_id'] == 2)  : ?>
                <div class="col">
                    <div class="card radius-10">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div>
                                    <?php 
									
										$sql="SELECT COUNT(employee_name) as Total From employee";
										$query=mysqli_query($conn,$sql);
										$num=mysqli_fetch_array($query);
                              
									?>
                                    <p class="mb-0 text-secondary">Total Employees</p>
                                    <h4 class="my-1"><?php echo $num['Total'];?></h4>

                                </div>
                                <div class="widget-icon-large bg-gradient-purple text-white ms-auto"><i class="bi bi-person-square"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            
                <div class="col">
                    <div class="card radius-10">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div>
                                    <?php 
									
										@$present="Present";
										$today=date("Y-m-d");
										$sql="SELECT COUNT(attendaneStatus) as presnt From attendance WHERE attendaneStatus='$present' && attendancedate='$today'";
										$query=mysqli_query($conn,$sql);
										$num=mysqli_fetch_array($query);
                              
									?>
                                    <p class="mb-0 text-secondary">Present Today</p>
                                    <h4 class="my-1"><?php echo $num['presnt'];?></h4>

                                </div>
                                <div class="widget-icon-large bg-gradient-success text-white ms-auto"><i class="bi bi-person-check-fill"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            
                <div class="col">
                    <div class="card radius-10">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div>
                                    <?php
									
										@$absent="Absent";
										$today=date("Y-m-d");
										$sql="SELECT COUNT(attendaneStatus) as abse From attendance WHERE attendaneStatus='$absent' && attendancedate='$today'";
										$query=mysqli_query($conn,$sql);
										$num=mysqli_fetch_array($query);
									  
									?>
                                    <p class="mb-0 text-secondary">Total Absent</p>
                                    <h4 class="my-1"><?php echo $num['abse'];?></h4>

                                </div>
                                <div class="widget-icon-large bg-gradient-danger text-white ms-auto"><i class="bi bi-people-fill"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            
                <div class="col">
                    <div class="card radius-10">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div>
                                    <?php 
									
										$today=date("Y-m-d");
										$sqls="SELECT COUNT(leave_start_date) as leav From leaves WHERE leave_start_date='$today'";
										$querys=mysqli_query($conn,$sqls);
										$nums=mysqli_fetch_array($querys);
                              
									?>
                                    <p class="mb-0 text-secondary">Onleave Today</p>
                                    <h4 class="my-1"><?php echo $nums['leav'];?></h4>

                                </div>
                                <div class="widget-icon-large bg-gradient-info text-white ms-auto"><i class="bi bi-bar-chart-line-fill"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            
                <div class="col">
                    <div class="card radius-10">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div>
                                    <?php
									
										$today=date("Y-m-d");
										$s="SELECT COUNT(employee_name) as jnt From employee WHERE joining_date='$today'";
										$q=mysqli_query($conn,$s);
										$n=mysqli_fetch_array($q);
									  
									?>
                                    <p class="mb-0 text-secondary">Employee Added Today</p>
                                    <h4 class="my-1"><?php echo $n['jnt'];?></h4>

                                </div>
                                <div class="widget-icon-large bg-gradient-info text-white ms-auto"><i class="bi bi-person-plus-fill"></i></div>
                            </div>
                        </div>
                    </div>
                </div>
            
                <div class="col">
                    <div class="card radius-10">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div>
                                    <?php
									
                                        $today=date("Y-m-d");
                                        $sqls="SELECT SUM(total_amount) as amount From claims WHERE claims_date='$today'";
                                        $querys=mysqli_query($conn,$sqls);
                                        $nums=mysqli_fetch_array($querys);
                                      
                                    ?>
                                    <p class="mb-0 text-secondary">Total Claim</p>
                                    <h4 class="my-1"><?php echo $nums['amount'];?></h4>

                                </div>
                                <div class="widget-icon-large bg-gradient-danger text-white ms-auto"><i class="bi bi-bell-slash"></i></div>
                            </div>
                        </div>
                    </div>
                </div>
            
                <div class="col">
                    <div class="card radius-10">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div>
									<?php 
									
										$month=date("F");
										$sqls="SELECT MONTHNAME(`salary_date`)as mnname,SUM(`gross_salary`) as amts FROM salary GROUP BY Month(`salary_date`)HAVING mnname='$month'";
										$querys=mysqli_query($conn,$sqls);
										$nums=mysqli_fetch_array($querys);
									  
									?>
                                    <p class="mb-0 text-secondary">Salary Cost</p>
                                    <h4 class="my-1"><?php if($nums != null)echo $nums['amts']; else echo 0;?></h4>

                                </div>
                                 <div class="widget-icon-large bg-gradient-purple text-white ms-auto"><i class="bi bi-basket2-fill"></i></div>
                            </div>
                        </div>
                    </div>
                </div>
            
                <div class="col">
                    <div class="card radius-10">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div>
                                    <?php 
									
										$month= date("F");
										$sqls="SELECT MONTHNAME(`expense_date`)as mname,
										SUM(amount) as amt FROM expense_list GROUP BY Month(`expense_date`)HAVING mname='$month'";
										$querys=mysqli_query($conn,$sqls);
										$nums=mysqli_fetch_array($querys);
									  
									?>
                                    <p class="mb-0 text-secondary">Total Expenses</p>
                                    <h4 class="my-1"><?php if($nums!= null)echo $nums['amt']; else echo 0; ?></h4>

                                </div>
                                <div class="widget-icon-large bg-gradient-success text-white ms-auto"><i class="bi bi-cash"></i></div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php elseif($_SESSION['role_id'] == 4) : ?>
				<div class="modal-content">
					<div class="forms-body">
						<table class="table table-bordered" align="center">
							<tr>
								<td colspan="8">
									<div class="profile-avatar text-center">
										<?php

											$user=$_SESSION['userName'];
											$sql="SELECT * from employee Where email='$user'";
											$query=mysqli_query($conn,$sql);
											while($row=mysqli_fetch_array($query)){
												
										?>
										<img src="<?php echo $row['picture'];?>" class="rounded-circle shadow" width="120" height="120" alt="">
								
									</div>
				
									<div class="d-flex align-items-center justify-content-around mt-5 gap-3"></div>
									<div class="text-center mt-4">
							   
										<h4 class="mb-1">Name: <?php echo $row['employee_name'];?></h4>
										
										<h6 class="mb-0 text-secondary">Address: <?php echo $row['district'].", ".$row['Countries'];?></h6>
										<div class="mt-4"></div>
										<h6 class="mb-1">Department: <?php echo $row['department_id'];?> </h6>
										<h6 class="mb-1">Designation: <?php echo $row['designation_id'];?> </h6>
										<h6 class="mb-1">Employee Id: <?php echo $row['employee_code'];?> </h6>
										<p class="mb-0 text-secondary">
											<h6>Role:
												<?php 

													if($_SESSION['role_id'] == 1){ 
															echo "Super Admin";
														}
													elseif($_SESSION['role_id'] == 2){ 
														echo "Admin";
													}
													elseif($_SESSION['role_id'] == 3){ 
															echo "HR";
														}
													elseif($_SESSION['role_id'] == 4){ 
															echo "Employee";
														}
												?>
											</h6>
											
										</p>

									</div>

										 <?php }?>
								</td>
							</tr>
							<tr>
								<th>Total Present</th>
								<th>Total Leave</th>
								<th>Total Absent</th>
								<th>Basic Salary</th>
								<th>Medical Allorance</th>
								<th>House Rent</th>
								<th>Food Allowrance</th>
								<th>Provident Fund</th><!-- 
								<th>Gross Salary</th>
								<th>Net Salary</th> -->
							</tr>
							<tr>
								<?php 
									
									$ql="SELECT * FROM payroll";
									$qy=mysqli_query($conn,$ql);
									$nm=mysqli_fetch_array($qy)

								?>
								<th><?php echo $nm['total_Attendance'];?></th>
								<th><?php echo $nm['total_Leave'];?></th>
								<th><?php echo $nm['total_Absent'];?></th>
								
								<?php 
									
									$qls="SELECT * FROM salary";
									$qys=mysqli_query($conn,$qls);
									$nms=mysqli_fetch_array($qys)

								?>
								<th><?php echo $nms['basic_salary'];?></th>
								<th><?php echo $nms['medical'];?></th>
								<th><?php echo $nms['house_rent'];?></th>
								<th><?php echo $nms['food'];?></th>
								<th><?php echo $nms['provident_fund'];?></th>
								<!-- <th><?php //echo $nms['gross_salary'];?></th>
								<th><?php //echo $nms['net_salary'];?></th> -->
							</tr>

						</table>

						<?php endif ?>
					</div>
				</div>
                     
           
           
            <!--end row-->

<?php include("Footer.php");?>