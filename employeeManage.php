<?php include("Topbar.php");?>

            <div class="modal-content">
                <div class="forms-body">
                    <div class="row">
                        <div class="col-md-12">
						
                            <h3 style="margin:10px;">Manage Employee</h3>
							
                        </div>
                    </div>
                    <hr>
					
                    <div class="row">
                        <div class="col-md-12">
                            <a href="addEmployee.php" class="btn btn-primary bx-pull-right mb-3">Add Employee</a>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12 col-sm-12">


                            <div class="table-responsive">

                                <table id="example" class="table table-striped table-bordered">

                                    <thead>
                                        <tr>
                                            <th>SL</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Department</th>
                                            <th>Designation</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
										
											$sl=1;
											$sql="SELECT * From employee";
											$query=mysqli_query($conn,$sql);
											
											while($row=mysqli_fetch_array($query)){
										  

										?>

                                        <tr>
                                            <td><?php echo $sl++;?></td>
                                            <td><?php echo $row['employee_name'];?></td>
                                            <td><?php echo $row['email'];?></td>
                                            <td><?php echo $row['department_id'];?></td>
                                            <td><?php echo $row['designation_id'];?></td>

                                            <td style="color:green;"><?php echo $row['employee_status']?></td>
                                            <td>
                                                <a class="btn btn-success" href="empmngupdate.php?aid=<?php echo $row['employee_id']; ?>">Update</a>
                                                <a class="btn btn-info" href="view.php?email=<?php echo $row['email'];?>">View</a>
                                            </td>

                                        </tr>

                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

<?php include("Footer.php");?>
